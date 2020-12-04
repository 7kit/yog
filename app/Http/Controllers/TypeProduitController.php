<?php

namespace App\Http\Controllers;

use App\TypeProduit;
use Illuminate\Http\Request;

class TypeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $typeProduits = TypeProduit::all();
        return view('produits', ['typeProduits' => $typeProduits]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeProduit  $typeProduit
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduit $typeProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeProduit  $typeProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProduit $typeProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeProduit  $typeProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduit $typeProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeProduit  $typeProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduit $typeProduit)
    {
        //
    }
}
