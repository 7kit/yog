<?php

namespace App\Http\Controllers;

use App\Production;
use App\Produit;
use Illuminate\Http\Request;

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        $productions = Production::all();
        return view('productions', ['productions' => $productions, 'produits' => $produits]);
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
        $production = new Production;

        // $produit = Produit::find($request->produit);

        $production->produit_id = $request->produit;
        $production->quantite = $request->quantite;
        $production->indication = $request->indication;

        $production->save();
        return redirect()->route('productions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        Production::where('id', $request->production_id)->update([
            'quantite' => $request['quantite'],
            'indication' => $request['indication'],
            'produit_id' => $request['produit'],
        ]);
        return redirect()->route('productions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Production $production)
    {
        $production = Production::findOrfail($request->id);
        $production->delete();
        return redirect()->route('productions');
    }
}
