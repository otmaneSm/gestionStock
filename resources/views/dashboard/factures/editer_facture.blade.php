@extends('layouts.admin')
@section('content')
<section id="multiple-column-form">

                        <section class="form">
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ref_facture</label>
                                        <input type="text" id="ref_Fact" class="form-control" placeholder="reference produit"
                                            name="fname-column">
                                    </div>
                                </div>



                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Chercher facture</label>
                                        <div>
                                            <button id="chercherFacture" class="btn btn-primary mr-1 mb-1" style="width: 100%">Chercher</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Supprimer facture</label>
                                        <div>
                                            <button id="deletefact" class="btn btn-danger mr-1 mb-1" style="width: 100%">Supprimer</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                        <section id="multiple-column-form">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Editer Facture</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form" action="{{ route('edit_Facture') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Ref_Facture</label>
                                                                <input type="text" id="refFacture" class="form-control" placeholder="reference facture"
                                                                    name="fname-column" disabled>
                                                                    <input type="hidden" id="ref_fature" class="form-control" placeholder="reference facture"
                                                                    name="ref_facture" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="last-name-column">fournisseur</label>
                                                                <input type="text" id="fournisseur" class="form-control" placeholder="fournisseur"
                                                                    name="fournisseur">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="city-column">date Achat</label>
                                                                <input type="date" id="date" class="form-control" placeholder="Description produit " name="date">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="country-floating">Montant Total</label>
                                                                <input type="text" id="montantTotal" class="form-control" name="montantTotal" placeholder="Montant Total">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="company-column">Montant Payer</label>
                                                                 <input type="text" id="montantPayer" class="form-control" name="montantPayer" placeholder="Montant Payer">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="company-column">Reste</label>
                                                                 <input disabled type="text" id="reste" class="form-control" name="contact" placeholder="Reste">
                                                                 <input  type="hidden" id="restes" class="form-control" name="reste" placeholder="Reste">

                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Editer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
var total;
var payer;
            $("#chercherFacture").click(function() {
                    var info = $("#ref_Fact").val();
                    if (info != "") {
                        $.ajax({
                            method: 'GET',
                            url: "{{ route('search_Facture') }}",
                            dataType: 'json',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                info:info,
                            },
                            success: function(res) {
                                console.log(res);
                       if(!$.trim(res)){
                        $.notify("ERROR!! Reference  non valide", "error");
                        $("#ref_Fact").val("");
                      }
                       else
                       {
                                $("#refFacture").val(res.ref_Facture);
                                $("#ref_fature").val(res.ref_Facture);
                                 $("#fournisseur").val(res.fournisseur);
                                $("#date").val(res.dateFacture);
                                $("#montantTotal").val(res.MontantTotal);
                              $("#montantPayer").val(res.MontantPayer);
                               $("#reste").val(res.Reste);
                     }


                            }

                        })
                    }
                    else
                    {
                        $.notify("ERROR!! veuillez entrer un references d'un produit", "error");
                    }


                });


                $("#montantTotal").keyup(function() {
                total = $(this).val();
            });
            $("#montantPayer").keyup(function() {
                payer = $(this).val();
                $reslt=parseInt(total)-parseInt(payer);
                if(payer == "" || total == "")
                {
                    $("#reste").val("");
                }
                else
                {
                    $("#reste").val($reslt);
                    $("#restes").val($reslt);
                }

            });

            $("#deletefact").click(function(){
                var info = $("#ref_Fact").val();
                    if(info != "")
                    {
                        $.ajax({
                            method: 'GET',
                            url: "{{ route('supprimer_facture') }}",
                            dataType: 'json',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                info:info,
                            },
                            success: function(res) {
                            if(res == "0")
                            {
                                $.notify("ERROR!! Reference  non valide", "error");
                                   $("#ref_Prod").val("");
                            }
                            else
                            {
                                $.notify("SUCCES!! produit a été supprimer avec succes", "success");
                            }



                            }

                        })
                    }
                });
        })
    </script>
@endsection
