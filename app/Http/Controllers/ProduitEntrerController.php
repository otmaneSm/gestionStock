<?php

namespace App\Http\Controllers;

use App\Models\ProduitEntrer;

use App\Models\Produit;

use Illuminate\Http\Request;

class ProduitEntrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $nouveauStock = new ProduitEntrer();
       $nouveauStock->ref_Produit = $request->ref_Prod;
       $nouveauStock->ref_Facture = $request->ref_Fact;
       $nouveauStock->quantité = $request->quantité;
       $nouveauStock->prixTotal = $request->prixTotal;
       $nouveauStock->prixUnitaire = $request->prixUnitaire;
       $nouveauStock->save();
       $produit = Produit::find($request->ref_Prod);
       $produit->stockActuel = $request->quantité;
       $produit->save();
       notify()->success('Nouvelle Quantité ajouté avec succès');
       return redirect('/dashboard/admin/produits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitEntrer  $produitEntrer
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitEntrer $produitEntrer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitEntrer  $produitEntrer
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitEntrer $produitEntrer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitEntrer  $produitEntrer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitEntrer $produitEntrer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitEntrer  $produitEntrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitEntrer $produitEntrer)
    {
        //
    }
}
