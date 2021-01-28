@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md-4">

        <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Mon Bon
                </h4>

            </div>
            <div class="card-body px-0 py-1">
                <form class="form p-4">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Ref_Bon</label>
                                <select name="" class="form-control" id="bon">
                                    <option value=""></option>
                                    @foreach ($bons as $bon)
                                    <option value="{{ $bon->ref_Bon }}">{{ $bon->ref_Bon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="company-column">Client</label>
                                 <input type="text" id="client" class="form-control" name="contact" placeholder="Nom & Prenom Client">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="company-column">Date Du Bon</label>
                                 <input type="date" id="date" class="form-control" name="contact" placeholder="Quantité">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">N° Produit</label>
                                 <input type="number" id="nbrprod" class="form-control" name="contact" placeholder="N° du Produit">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Modifier</label>
                            <button type="submit" class="btn btn-primary mr-1 mb-1" style="width: 100%">Modifier</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Contenu Bon</h4>
                <div class="d-flex ">
                    {{-- <i title="imprimer le bon" class="fa fa-upload" style="cursor: pointer"></i> --}}
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ajouter Produit
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class='table mb-0' id="table2">
                        <thead>
                            <tr>
                                <th>Ref_Bon</th>
                                <th>Ref_Produit</th>
                                <th>Quantité</th>
                                <th>P.U</th>
                                <th>Total</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody id="ProdOfBon">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<input type="text" name="" id="total" class="form-control float-right mb-5" style="width: 20%" placeholder="--,--DH" disabled>

@endsection

@section('script')
    <script>
            $(document).ready(function(){
                $('#bon').change(function(e) {
                input = $(this).val();
                if (input == '') {


                } else {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('searchBonForEdit') }}",
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            input: input,
                        },
                        success: function(res) {
                            var row = '';
                            console.log(res.bon);
                        $('#ProdOfBon').html('');
                        $("#client").val(res.bon.client);
                        $("#date").val(res.bon.dateBon);
                        $("#nbrprod").val(res.bon.nbrProduit);
                        $.each(res.prods, function(index, value) {
                            row = `
                                            <tr>
                                            <td>` + value.ref_Bon + `</td>
                                            <td>` + value.ref_Produit + `</td>
                                            <td>` + value.quantité + `</td>
                                            <td>` + value.prixUnitaire + `</td>
                                            <td></td>
                                            <td> <button class="btn btn-sm btn-danger btndelete" id="` + value.id + `">Supprimer</button> </td>
                                            </tr>
                                              `

                            $('#ProdOfBon').append(row);
                            var table = $("#table2  tbody");
                            lastR = 0;
                            table.find('tr').each(function(i, el) {
                                var $tds = $(this).find('td'),
                                    Quantity = $tds.eq(2).text();
                                prix = $tds.eq(3).text();
                                rst = parseInt(Quantity) * parseInt(prix);
                                $tds.eq(4).text(rst);
                                lastR= parseInt(lastR)+parseInt( $tds.eq(4).text());
                                $("#total").val(lastR+'DH');

                            });
                        });

                        }

                    })
                }
            });
            $("#table2").on("click", ".btndelete", function() {
                var id = $(this).attr("id");
               $.ajax({
                        method: 'GET',
                        url: "{{ route('deleteProdBon') }}",
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            id: id,
                        },
                        success: function(res) {
                            if(res.test == "0")
                            {
                                $.notify("ERROR!! Reference  non valide", "error");
                                //    $("#ref_Prod").val("");
                            }
                            else
                            {
                                $.notify("SUCCES!! produit a été supprimer avec succes", "success");
                                var row = '';
                                $('#ProdOfBon').html('');
                                $.each(res.prods, function(index, value) {
                            row = `
                                            <tr>
                                            <td>` + value.ref_Bon + `</td>
                                            <td>` + value.ref_Produit + `</td>
                                            <td>` + value.quantité + `</td>
                                            <td>` + value.prixUnitaire + `</td>
                                            <td></td>
                                            <td> <button class="btn btn-sm btn-danger btndelete" id="` + value.id + `">Supprimer</button> </td>
                                            </tr>
                                              `

                            $('#ProdOfBon').append(row);
                            var table = $("#table2  tbody");
                            lastR = 0;
                            table.find('tr').each(function(i, el) {
                                var $tds = $(this).find('td'),
                                    Quantity = $tds.eq(2).text();
                                prix = $tds.eq(3).text();
                                rst = parseInt(Quantity) * parseInt(prix);
                                $tds.eq(4).text(rst);
                                lastR= parseInt(lastR)+parseInt( $tds.eq(4).text());
                                $("#total").val(lastR+'DH');

                            });
                        });
                            }

                        }

                    })

            });
            })
    </script>
@endsection
