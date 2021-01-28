@extends('layouts.admin')
@section('content')
    <section id="multiple-column-form">

        <section class="form">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Ref_Produit</label>
                        <input type="text" class="form-control" placeholder="reference produit" name="fname-column"
                            id="ref_Prod">
                    </div>
                </div>



                <div class="col-md-2 col-12">
                    <div class="form-group">
                        <label for="company-column">Chercher produit</label>
                        <div>
                            <button class="btn btn-primary mr-1 mb-1" id="searchProduit"
                                style="width: 100%">Chercher</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="form-group">
                        <label for="company-column">Supprimer produit</label>
                        <div>
                            <button id="deleteProd" class="btn btn-danger mr-1 mb-1" style="width: 100%">Supprimer</button>
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
                            <h4 class="card-title">Information Produit</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('update_Prod') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Ref_Produit</label>
                                                <input type="text" id="Ref_Produit" class="form-control"
                                                    placeholder="reference produit" name="" disabled>
                                                    <input type="hidden" id="Ref_Produit2" class="form-control"
                                                    placeholder="reference produit" name="ref" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Categorie</label>
                                                <input type="text" id="Categorie" class="form-control"
                                                    placeholder="Categorie produit" name="categorie">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Description</label>
                                                <textarea name="description" id="Description" cols="30" class="form-control" rows="8"
                                                    placeholder="Description produit "></textarea>
                                                {{-- <input type="text" id="city-column"
                                                    class="form-control" placeholder="Description produit "
                                                    name="city-column"> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">stock Actuel</label>
                                                <input type="number" id="stock-Actuel" class="form-control" name="stock_actuel" disabled
                                                    placeholder="stock Actuel">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Stock Minimal</label>
                                                <input type="number" id="Stock-Minimal" class="form-control" name="stockMinimal"
                                                    placeholder="Stock Minimal">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Modifier</button>

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
            $(document).ready(function() {
                $("#searchProduit").click(function() {
                    var info = $("#ref_Prod").val();
                    if (info != "") {
                        $.ajax({
                            method: 'GET',
                            url: "{{ route('search_Produit') }}",
                            dataType: 'json',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                info:info,
                            },
                            success: function(res) {

                      if(!$.trim(res)){
                        $.notify("ERROR!! Reference  non valide", "error");
                        $("#ref_Prod").val("");
                      }
                      else
                      {
                                $("#Ref_Produit").val(res.ref_Produit);
                                $("#Ref_Produit2").val(res.ref_Produit);
                                $("#Categorie").val(res.categorie);
                                $("#Description").val(res.description);
                                $("#stock-Actuel").val(res.stockActuel);
                                $("#Stock-Minimal").val(res.stockMinimal);
                      }


                            }

                        })
                    }
                    else
                    {
                        $.notify("ERROR!! veuillez entrer un references d'un produit", "error");
                    }


                });


                $("#deleteProd").click(function(){
                    var info = $("#ref_Prod").val();
                    if(info != "")
                    {
                        $.ajax({
                            method: 'GET',
                            url: "{{ route('supprimer_produit') }}",
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
