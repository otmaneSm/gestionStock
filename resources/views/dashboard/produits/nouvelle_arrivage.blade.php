@extends('layouts.admin')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Nouvelle Quantité</h4>
                        <div class="d-flex ">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Ajouter Facture
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Rapidement Facture</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('QuickAdd') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Ref_Facture</label>
                                                            <input type="text" class="form-control" name="refFacture"
                                                                placeholder="Reference Facture">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Fournisseur</label>
                                                            <input type="text" class="form-control" name="fournisseur"
                                                                placeholder="Fournisseur">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Date Facture</label>
                                                            <input type="date" class="form-control" name="dateF">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Montant Total</label>
                                                            <input type="number" id="total" class="form-control"
                                                                placeholder="Montant Total" name="montantTotal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="country-floating">Montant Payer</label>
                                                            <input type="number" id="payer" class="form-control"
                                                                placeholder="Montant Payer" name="montantPayer">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="country-floating">Le Reste</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="le Reste" id="reste" disabled>
                                                                <input type="hidden" class="form-control"
                                                                placeholder="le Reste" id="restes" name="reste">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <input type="submit" class="btn btn-success" value="ajouter"
                                                                style="width: 100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('ProduitEntrer') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ref_Produit</label>
                                        <select class="form-control" name="ref_Prod" id="basicSelect">
                                            @foreach ($produits as $produit)
                                                <option>{{ $produit->ref_Produit }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Ref_Facture</label>
                                        <select class="form-control" name="ref_Fact" id="basicSelect">
                                            @foreach ($factures as $facture)
                                                <option>{{ $facture->ref_Facture }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-2 col-12">
                                    <label for="last-name-column">nouvelle Facture</label>
                                    <div>

                                        <a href="" class="btn btn-success" style="width: 100%;margin-top:-2px">ajouter</a>
                                    </div>

                                </div> --}}


                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Quantité</label>
                                        <input type="number" id="contact-info" class="form-control" name="quantité"
                                            placeholder="Quantité">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Prix total</label>
                                        <input type="text" id="company-column" class="form-control" name="prixTotal"
                                            placeholder="Prix Total ">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Prix Unitaire</label>
                                        <input type="text" id="company-column" class="form-control" name="prixUnitaire"
                                            placeholder="Prix Unitaire ">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Valider achat</label>
                                        <div>
                                            <button type="submit" class="btn btn-primary mr-1 mb-1"
                                                style="width: 100%">Ajouter</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
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
            $("#total").keyup(function() {
                total = $(this).val();
            });
            $("#payer").keyup(function() {
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
        })
   </script>
@endsection
