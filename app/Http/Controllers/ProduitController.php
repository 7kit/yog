<?php

namespace App\Http\Controllers;

use App\Produit;
use App\TypeProduit;
use Illuminate\Http\Request;

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
        $typeProduits = TypeProduit::all();
        return view('produits', ['produits' => $produits, 'typeProduits' => $typeProduits]);
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
        $produit = new Produit;

        $produit->designation = $request->designationProduit;
        $produit->prixUnitaire = $request->prix;
        $produit->type_id = $request->type_id;

        $produit->save();

        return redirect()->route('produits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //dd($request->all());
        //dd($produit->id);

         Produit::where('id', $request->id)->update([
                 'designation' => $request['designationProduit'],
                 'prixUnitaire' => $request['prix'],
                 'type_id' => $request['type_id'],
             ]);
         return redirect()->route('produits');

        /*$produit = App\produit::find($produit->id);

        $produit->designation = $request->designationProduit;
        $produit->prixUnitaire = $request->prix;

        $produit->save();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Produit $produit)
    {
        $produit = Produit::findOrfail($request->id);
        $produit->delete();
        return redirect()->route('produits');
    }
}
