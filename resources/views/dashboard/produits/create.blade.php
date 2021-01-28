@extends('layouts.admin')
@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nouveau Produit</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('Create_Produit') }} ">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Ref_Produit</label>
                                        <input type="text" id="first-name-column" class="form-control @error('refProduit') is-invalid @enderror" placeholder="reference produit"
                                            name="refProduit">
                                            @if ($errors->has('refProduit'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('refProduit') }}</strong>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Categorie</label>
                                        <input type="text" id="last-name-column" class="form-control @error('categorie') is-invalid @enderror" placeholder="Categorie produit"
                                            name="categorie">
                                            @if ($errors->has('categorie'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('categorie') }}</strong>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Description</label>
                                        <textarea name="description" id="" cols="30" class="form-control @error('description') is-invalid @enderror" rows="8"  placeholder="Description produit "></textarea>
                                        @if ($errors->has('description'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">stock Actuel</label>
                                        <input type="number" id="contact-info" class="form-control @error('stockActuel') is-invalid @enderror" name="stockActuel" placeholder="stock Actuel" value="0" disabled>
                                        @if ($errors->has('stockActuel'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('stockActuel') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Stock Minimal</label>
                                         <input type="number" id="contact-info" class="form-control @error('stockMinimal') is-invalid @enderror" name="stockMinimal" placeholder="Stock Minimal">
                                         @if ($errors->has('stockMinimal'))
                                         <div class="invalid-feedback">
                                             <strong>{{ $errors->first('stockMinimal') }}</strong>
                                         </div>
                                         @endif
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

