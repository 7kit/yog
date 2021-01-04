<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Perime;
use Illuminate\Http\Request;

class PerimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        $perimes = Perime::all();
        return view('perimes', ['perimes' => $perimes, 'produits' => $produits]);
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
        $perime = new Perime;

        // $produit = Produit::find($request->produit);

        $perime->produit_id = $request->produit;
        $perime->quantite = $request->quantite;
        $perime->indication = $request->indication;

        $perime->save();
        return redirect()->route('perimes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perime  $perime
     * @return \Illuminate\Http\Response
     */
    public function show(Perime $perime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perime  $perime
     * @return \Illuminate\Http\Response
     */
    public function edit(Perime $perime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perime  $perime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perime $perime)
    {
        Perime::where('id', $request->perime_id)->update([
            'quantite' => $request['quantite'],
            'indication' => $request['indication'],
            'produit_id' => $request['produit'],
        ]);
        return redirect()->route('perimes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perime  $perime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Perime $perime)
    {
        $perime = Perime::findOrfail($request->id);
        $perime->delete();
        return redirect()->route('perimes');
    }

    public function graph()
    {
        return view('graphes');
    }
}
