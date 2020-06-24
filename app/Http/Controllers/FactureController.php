<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Client;
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
        //
        $factures = Facture::all();
        $clients = Client::all();
        return view('factures', ['clients' => $clients, 'factures' => $factures]);
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
        $facture = new Facture;

        $facture->dateFacture = $request->dateFacture;
        //$facture->montantFacture = $request->montant;
        $facture->cient_id = $request->client;
        $facture->nFacture = $request->nFacture;

        $facture->save();

        return redirect()->route('factures');
        //return redirect()->route('details',['id' => $request->nFacture]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
         Produit::where('id', $request->id)->update([
                 'dateFacture' => $request['dateFacture'],
                 'cient_id' => $request['client'],
                 'montantFacture' => $request['montantFacture'],
                 'nFacture' => $request['nFacture'],
             ]);
         return redirect()->route('factures');// cela devrait renvoyer vers la facture individuelle pour saisir les détails.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
