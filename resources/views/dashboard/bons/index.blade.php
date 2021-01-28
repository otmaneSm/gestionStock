@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Mes Bons</h4>
            <div class="d-flex ">
                <i data-feather="download"></i>
            </div>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class='table mb-0' id="table1">
                    <thead>
                        <tr>
                            <th>Ref_Bon</th>
                            <th>Client</th>
                            <th>Date Achat</th>
                            <th> N° Produit</th>
                            <th>Montant Total</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bons as $bon)
                        <tr>
                            <td>{{$bon->ref_Bon}}</td>
                            <td>{{$bon->client}}</td>
                            <td>{{$bon->dateBon}}</td>
                            <td>{{$bon->nbrProduit}}</td>
                            <td>{{$bon->MontantTotal}}</td>
                            <td>
                               <a href="" class="btn btn-sm btn-info">Details</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
