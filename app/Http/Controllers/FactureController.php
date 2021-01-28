<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Stock;
use App\Models\Produit;

use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = Facture::all();
        return view('dashboard/factures.mes_factures',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/factures.nouvelle_facture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facture = new Facture();
        $facture->ref_Facture = $request->ref_facture;
        $facture->fournisseur = $request->fournisseur;
        $facture->dateFacture = $request->date;
        $facture->MontantTotal = $request->montantTotal;
        $facture->MontantPayer = $request->MontantPayer;
        $facture->Reste = $request->restes;
        $facture->save();
        notify()->success('Facture ajouté avec succès');
        return redirect('/dashboard/admin/factures');
    }
    public function Qstore(Request $request)
    {
        $facture = new Facture();
        $facture->ref_Facture = $request->refFacture;
        $facture->fournisseur = $request->fournisseur;
        $facture->dateFacture = $request->dateF;
        $facture->MontantTotal = $request->montantTotal;
        $facture->MontantPayer = $request->montantPayer;
        $facture->Reste = $request->reste;
        $facture->save();
        notify()->success('Facture ajouté avec succès');
        return back();
    }

    public function search(Request $request)
    {
        $facture = Facture::find($request->info);

        return json_encode($facture);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodAcheter = Stock::where('ref_Facture',$id)->get();
        $facture = Facture::find($id);
        return view('dashboard/factures.details',compact('prodAcheter','facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        return view('dashboard/factures.editer_facture');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {

        $facture = $facture->find($request->ref_facture);
        $facture->fournisseur = $request->fournisseur;
        $facture->dateFacture = $request->date;
        $facture->MontantTotal = $request->montantTotal;
        $facture->MontantPayer = $request->montantPayer;
        $facture->Reste = $request->reste;
        $facture->save();
        notify()->success('Facture modifié avec succès');
        return redirect('/dashboard/admin/factures');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produit = Facture::find($request->info);
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
