<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Facture;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        return view('dashboard/produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/produits.create');
    }
    public function nouvelleArrivage()
    {
        $produits = Produit::all();
        $factures = Facture::all();
        return view('dashboard/produits.nouvelle_arrivage',compact('produits','factures'));
    }
    public function produitRenouveler()
    {
        return view('dashboard/produits.produit_renouveler');
    }
    public function produitManquant()
    {
        $produits = Produit::all()->where('stockActuel','0');
        return view('dashboard/produits.produit_manquant',compact('produits'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'refProduit' => 'required',
            'categorie' => 'required',
            'description' => 'required',

            'stockMinimal' => 'required',
        ]);

       $produit = new Produit();
       $produit->ref_Produit = $request->refProduit;
       $produit->categorie = $request->categorie;
       $produit->description = $request->description;
       $produit->stockActuel = "0";
       $produit->stockMinimal = $request->stockMinimal;
       $produit->save();
       notify()->success('Produit ajouté avec succès');
       return redirect('/dashboard/admin/produits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
            $produit = Produit::find($request->info);
            return json_encode($produit);
    }
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        return view('dashboard/produits.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {

        $produit = Produit::find($request->ref);
       $produit->categorie = $request->categorie;
       $produit->description = $request->description;
       $produit->stockActuel = "0";
       $produit->stockMinimal = $request->stockMinimal;
       $produit->save();
       notify()->success('Produit modifié avec succès');
       return redirect('/dashboard/admin/produits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produit = Produit::find($request->info);
        if(empty($produit))
        {
            $test = "0";
        }
        else
        {
            $test = "1";
            $produit->delete();
        }

        return json_encode($test);
    }
}
