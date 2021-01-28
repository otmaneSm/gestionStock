@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3">

        <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Produit Manquant
                </h4>

            </div>
            <div class="card-body px-0 py-1">
                <form class="form p-4">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Ref_Produit</label>
                                <input type="text" id="contact-info" class="form-control" name="contact" placeholder="Reference Produit">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Categorie</label>
                                <input type="text" id="contact-info" class="form-control" name="contact" placeholder="Categorie Produit">

                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="company-column">Description</label>
                                 <textarea type="text" id="contact-info" class="form-control" name="contact" placeholder="Description Produit"></textarea>
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
    <div class="col-md-9">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Les Produits Qui Nous Manquent</h4>
                <div class="d-flex ">

                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class='table mb-0' id="table1">
                        <thead>
                            <tr>
                                <th>Ref_Produit</th>
                                <th>Categorie</th>
                                <th>Description</th>
                                <th>Stock_Actuel</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->ref_Produit }}</td>
                            <td>{{ $produit->categorie }}</td>
                            <td>{{ $produit->description }}</td>

                            <td class="">
                                <span class="badge bg-danger" style="font-size: 20px;color: #fff">{{ $produit->stockActuel }}</span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
