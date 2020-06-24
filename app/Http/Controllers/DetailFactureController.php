<?php

namespace App\Http\Controllers;

use App\DetailFacture;
use App\Produit;
use App\Facture;
use Illuminate\Http\Request;

class DetailFactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $produits = Produit::all();
        $facture = Facture::find($id);
        return view('details', ['produits' => $produits, 'facture' => $facture]);
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
        //dd($request->all());
        $detailFacture = new DetailFacture;

        $produit = Produit::find($request->produit);

        $detailFacture->facture_id = $request->facture_id;
        $detailFacture->produit_id = $request->produit;
        $detailFacture->quantiteProduit = $request->quantiteProduit;
        $detailFacture->montantDetail = $produit->prixUnitaire*$request->quantiteProduit;

        $detailFacture->save();
        $montant = DetailFacture::where('facture_id', $request->facture_id)->sum('montantDetail');
        $facture = Facture::find($request->facture_id);

        $facture->montantFacture = $montant;

        $facture->save();
        return redirect()->route('details', ['id' => $request->facture_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailFacture  $detailFacture
     * @return \Illuminate\Http\Response
     */
    public function show(DetailFacture $detailFacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailFacture  $detailFacture
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailFacture $detailFacture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailFacture  $detailFacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailFacture $detailFacture)
    {
        //dd($request->all());
        $produit = Produit::find($request->produit);

        DetailFacture::where('id', $request->detail_id)->update([
                 'produit_id' => $request['produit'],
                 'quantiteProduit' => $request['quantiteProduit'],
                 'montantDetail' => $produit->prixUnitaire*$request['quantiteProduit'],
             ]);

        $montant = DetailFacture::where('facture_id', $request->facture_id)->sum('montantDetail');
        $facture = Facture::find($request->facture_id);
        $facture->montantFacture = $montant;
        $facture->save();

        return redirect()->route('details', ['id' => $request->facture_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailFacture  $detailFacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailFacture $detailFacture)
    {
        //
    }
}
