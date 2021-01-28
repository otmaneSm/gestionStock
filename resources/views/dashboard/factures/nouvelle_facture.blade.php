@extends('layouts.admin')
@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nouvelle Facture</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('create_Facture') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ref_Facture</label>
                                        <input type="text" id="first-name-column" class="form-control" placeholder="reference facture"
                                            name="ref_facture">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">fournisseur</label>
                                        <input type="text" id="last-name-column" class="form-control" placeholder="fournisseur"
                                            name="fournisseur">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">date Achat</label>
                                        <input type="date" id="city-column" class="form-control" name="date" name="city-column">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Montant Total</label>
                                        <input type="text" id="total" class="form-control" name="montantTotal" placeholder="Montant Total">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Montant Payer</label>
                                         <input type="text" id="payer" class="form-control" name="MontantPayer" placeholder="Montant Payer">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Reste</label>
                                         <input type="text" id="rest" class="form-control" name="reste" placeholder="Reste" disabled>
                                         <input type="hidden" id="rests" class="form-control" name="restes" placeholder="Reste" >
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Ajouter</button>
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
            $("#total").keyup(function() {
                total = $(this).val();
            });
            $("#payer").keyup(function() {
                payer = $(this).val();
                $reslt=parseInt(total)-parseInt(payer);
                if(payer == "" || total == "")
                {
                    $("#rest").val("");
                }
                else
                {
                    $("#rest").val($reslt);
                    $("#rests").val($reslt);
                }

            });


        });
    </script>
@endsection
