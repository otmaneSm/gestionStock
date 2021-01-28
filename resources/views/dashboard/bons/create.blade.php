@extends('layouts.admin')
@section('content')
    <div class="row mb-4">
        <div class="col-md-6">

            <div class="card widget-todo">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title d-flex">
                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Nouveau Bon
                    </h4>

                </div>
                <div class="card-body px-0 py-1">
                    <form class="form p-4" action="{{ route('createBon') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Ref_Bon</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="reference Bon" name="ref_bon">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Client</label>
                                    <input type="text" id="last-name-column" class="form-control"
                                        placeholder="Nom & Prenom du CLient" name="client">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Montant Total</label>
                                    <input type="text" id="contact-info" class="form-control" name="MontantTotal"
                                        placeholder="Montant Total">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Date Du Bon</label>
                                    <input type="date" id="contact-info" class="form-control" name="dateBon"
                                        placeholder="stock Actuel">
                                </div>
                            </div>
                            {{-- <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Montant Total</label>
                                    <input type="text" id="contact-info" class="form-control" name="contact"
                                        placeholder="Montant Total">
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">N° Produit</label>
                                    <input type="number" id="contact-info" class="form-control" name="nbrProduit"
                                        placeholder="Nombre Du Produit">
                                </div>
                            </div>
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary mr-1 mb-1" style="width: 100%">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card widget-todo">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title d-flex">
                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Produit Du Bon
                    </h4>

                </div>
                <div class="card-body px-0 py-1">
                    <form class="form p-4" id="ProdBon">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Ref_Bon</label>
                                    <select name="" class="form-control" id="refBon">
                                        <option value=""></option>
                                        @foreach ($bons as $bon)
                                            <option value="{{ $bon->ref_Bon }}">{{ $bon->ref_Bon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Ref_Produit</label>
                                    <select name="" class="form-control" id="refProd">
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->ref_Produit }}">{{ $produit->ref_Produit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="company-column">Categorie</label>
                                    <input type="text" id="categorie" class="form-control" name="contact"
                                        placeholder="Categorie Produit">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Quantité</label>
                                    <input type="number" id="quantité" class="form-control" name="contact"
                                        placeholder="Quantité">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Prix Unitaire</label>
                                    <input type="text" id="prixUnitaire" class="form-control" name="contact"
                                        placeholder="Prix Unitaire">
                                </div>
                            </div>
                            <div class="col-12 ">

                                <button type="submit" class="btn btn-primary mr-1 mb-1" style="width: 100%">Ajouter</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Contenu Bon</h4>
                    <div class="d-flex ">
                        <i title="imprimer le bon" class="fa fa-upload" style="cursor: pointer"></i>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Ref_Bon</th>
                                    <th>Ref_Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tableProdBon">





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button id="testsss">ddd</button>
    </div>

    <input type="text" name="" id="total" class="form-control float-right mb-5" style="width: 20%" placeholder="--,--DH"
        disabled>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var input;

            $("#ProdBon").submit(function(e) {
                e.preventDefault();
                // alert($("#refBon").val());
                var ref_Bon = $("#refBon").val();
                var ref_Prod = $("#refProd").val();
                var categorie = $("#categorie").val();
                var quantité = $("#quantité").val();
                var prixUnitaire = $("#prixUnitaire").val();
                // if (info != "") {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('add_Prod_Bon') }}",
                    dataType: 'json',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        ref_Bon: ref_Bon,
                        ref_Prod: ref_Prod,
                        categorie: categorie,
                        quantité: quantité,
                        prixUnitaire: prixUnitaire,
                    },
                    success: function(res) {

                        var row = '';
                        $('#tableProdBon').html('');
                        $.each(res, function(index, value) {
                            row = `
                                            <tr>
                                            <td>` + value.ref_Bon + `</td>
                                            <td>` + value.ref_Produit + `</td>
                                            <td>` + value.quantité + `</td>
                                            <td>` + value.prixUnitaire + `</td>
                                            <td>ssss</td>
                                            </tr>
                                              `

                            $('#tableProdBon').append(row);
                            var table = $("#table1  tbody");
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
                // }
                // else
                // {
                //     $.notify("ERROR!! veuillez entrer un references d'un produit", "error");
                // }


            });








            $('#refBon').change(function(e) {
                input = $(this).val();
                $("#total").val('');
                if (input == '') {
                    var tableRow;
                    $('#tableProdBon').html('');
                    $('#tableProdBon').append(tableRow);
                } else {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('searchBon') }}",
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            input: input,
                        },
                        success: function(res) {

                            var row = '';
                            $('#tableProdBon').html('');
                            $.each(res, function(index, value) {
                                row = `
                                            <tr>
                                            <td>` + value.ref_Bon + `</td>
                                            <td>` + value.ref_Produit + `</td>
                                            <td>` + value.quantité + `</td>
                                            <td>` + value.prixUnitaire + `</td>
                                            <td>ssss</td>
                                            </tr>
                                              `

                                $('#tableProdBon').append(row);
                                var table = $("#table1  tbody");
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
        })

    </script>
@endsection
