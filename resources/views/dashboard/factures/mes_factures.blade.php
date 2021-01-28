@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Mes Factures</h4>
            <div class="d-flex ">
                <i data-feather="download"></i>
            </div>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class='table mb-0' id="table1">
                    <thead>
                        <tr>
                            <th>Ref_Facture</th>
                            <th>Fournisseur</th>
                            <th>Date Facture</th>
                            <th>Montant Facture</th>
                            <th>Status</th>

                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factures as $facture)
                        <tr>
                            <td>{{ $facture->ref_Facture }}</td>
                            <td>{{ $facture->fournisseur }}</td>
                            <td>{{ $facture->dateFacture }}</td>
                            <td>{{ $facture->MontantTotal }}</td>
                            <td>
                                @if ((int)$facture->MontantPayer == (int)$facture->MontantTotal)
                                <span class="badge bg-success">Payer</span>
                                @else
                                <span class="badge bg-warning">credit</span>
                                @endif

                            </td>
                            <td><a href="{{ route('factureDetails',$facture->ref_Facture ) }}" class="btn btn-info btn-sm">Details    <i class="fa fa-upload" aria-hidden="true"></i>
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
