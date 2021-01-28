<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\ProduitSortie;

class BonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bons = Bon::all();
        return view('dashboard/bons.index',compact('bons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bons = Bon::all();
        $produits = Produit::all();
        return view('dashboard/bons.create',compact('bons','produits'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $bon = new Bon();
     $bon->ref_Bon=$request->ref_bon;
     $bon->client=$request->client;
     $bon->dateBon=$request->dateBon;
     $bon->MontantTotal=$request->MontantTotal;
     $bon->nbrProduit=$request->nbrProduit;
     $bon->save();
     notify()->success('Produit ajouté avec succès');
     return back();
    }

    public function storeProd(Request $request)
    {
        $prod_sortie=new ProduitSortie();
        $prod_sortie->ref_Bon = $request->ref_Bon;
        $prod_sortie->categorie = $request->categorie;
        $prod_sortie->ref_Produit = $request->ref_Prod;
        $prod_sortie->quantité = $request->quantité;
        $prod_sortie->prixUnitaire = $request->prixUnitaire;
        $prod_sortie->save();
        $prods = ProduitSortie::where('ref_bon',$request->ref_Bon)->get();
        // dd($prods);
        return json_encode($prods);
        // dd($request->ref_Bon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function show(Bon $bon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function edit(Bon $bon)
    {
        $bons = Bon::all();
        return view('dashboard/bons.edit',compact('bons'));

    }

    public function searchForEdit(Request $request)
    {
        $prods = ProduitSortie::where('ref_bon',$request->input)->get();
        $bon = Bon::Find($request->input);
        return \json_encode(['prods'=>$prods,'bon'=>$bon]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bon $bon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bon $bon)
    {
        //
    }
    public function deleteProdBon(Request $request)
    {
        $produit = ProduitSortie::find($request->id);
        // dd($produit);
        if(empty($produit))
        {
            $test = "0";
        }
        else
        {
            $test = "1";
            $produit->delete();
        }
        $prods = ProduitSortie::where('ref_bon',$produit->ref_Bon)->get();
        return \json_encode(['test'=>$test,'prods'=>$prods]);
    }
    public function search(Request $request)
    {
        $prods = ProduitSortie::where('ref_bon',$request->input)->get();
            return json_encode($prods);
    }
}
