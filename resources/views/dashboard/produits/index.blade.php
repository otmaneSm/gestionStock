@extends('layouts.admin')
@section('content')
    <div class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>PRODUITS</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ $produits->count() }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>MANQUANTS</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>532,2</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>RENOUVELER</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>1,544</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Sales Today</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>423 </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Mes Produits</h4>
            <div class="d-flex ">
                <i data-feather="download"></i>
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
                            <th>Stock_Minimal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                        @if ($produit->stockActuel == '0' || $produit->stockActuel == $produit->stockMinimal )
                        <tr style="background-color: #BCBCBC">
                            <td>{{ $produit->ref_Produit }}</td>
                            <td>{{ $produit->categorie }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>
                                @if ($produit->stockActuel == $produit->stockMinimal )
                                <span class="badge bg-danger">
                                    {{ $produit->stockActuel }}
                                </span>
                                @else
                                <span class="badge bg-success">
                                    {{ $produit->stockActuel }}
                                </span>
                                @endif
                            </td>
                            <td>
                                {{ $produit->stockMinimal }}
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $produit->ref_Produit }}</td>
                            <td>{{ $produit->categorie }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>
                                @if ($produit->stockActuel == $produit->stockMinimal )
                                <span class="badge bg-danger">
                                    {{ $produit->stockActuel }}
                                </span>
                                @else
                                <span class="badge bg-success">
                                    {{ $produit->stockActuel }}
                                </span>
                                @endif
                            </td>
                            <td>
                             {{ $produit->stockMinimal }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


