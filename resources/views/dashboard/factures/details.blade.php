@extends('layouts.admin')
@section('content')
<div class="row mb-5">
    <div class="col-md-3">
        <label for="">Ref_Facture</label>
        <input type="text" class="form-control" value="{{ $facture->ref_Facture }}" disabled>
    </div>
    <div class="col-md-3">
        <label for="">Fournisseur</label>
        <input type="text" class="form-control" value="{{ $facture->fournisseur }}" disabled>
    </div>
    <div class="col-md-3">
        <label for="">Montant Total</label>
        <input type="text" class="form-control" value="{{ $facture->MontantTotal }}" disabled>
    </div>
    <div class="col-md-3">
        <label for="">Montant Payer</label>
        <input type="text" class="form-control" value="{{ $facture->MontantPayer }}" disabled>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Les Produit De la Facture {{ $facture->ref_Facture }}</h4>
        <div class="d-flex ">
                @if ($facture->Reste =='0')
                <span class="badge badge-success">Payer</span>

                @else
                <span class="badge badge-warning">Credit : {{ $facture->Reste }} DHS</span>

                @endif
        </div>
    </div>
    <div class="card-body px-0 pb-0">
        <div class="table-responsive">
            <table class='table mb-0' id="table1">
                <thead>
                    <tr>
                        <th>Ref_Produit</th>
                        <th>Quantité</th>
                        <th>Prix Total</th>
                        <th>Prix Unitaire</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($prodAcheter as $item)
                    <tr>
                        <td>{{ $item->ref_Produit }}</td>
                        <td>{{ $item->quantité }}</td>
                        <td>{{ $item->prixTotal }}</td>
                        <td>{{ $item->prixUnitaire }}</td>

                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
