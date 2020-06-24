<?php

namespace App\Http\Controllers;

use App\Encaissement;
use App\Client;
use Illuminate\Http\Request;

class EncaissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        $encaissements = Encaissement::all();
        return view('encaisse', ['clients' => $clients, 'encaissements' => $encaissements]);
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
        //
        //dd($request->all());
        $encaissement = new Encaissement;

        $encaissement->dateEncaissement = $request->dateEncaissement;
        $encaissement->montantEncaisse = $request->montant;
        $encaissement->cient_id = $request->client;

        $encaissement->save();

        return redirect()->route('encaissements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function show(Encaissement $encaissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Encaissement $encaissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encaissement $encaissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encaissement  $encaissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encaissement $encaissement)
    {
        //
    }
}
