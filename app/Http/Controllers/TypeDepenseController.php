<?php

namespace App\Http\Controllers;

use App\TypeDepense;
use Illuminate\Http\Request;

class TypeDepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeDepense::all();
        return view('typedepenses', ['types' => $types]);
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
        $type = new TypeDepense;

        $type->libelleType = $request->libelleType;

        $type->save();

        return redirect()->route('types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeDepense  $typeDepense
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDepense $typeDepense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeDepense  $typeDepense
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDepense $typeDepense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeDepense  $typeDepense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDepense $typeDepense)
    {
        //dd($request);
        TypeDepense::where('id', $request->id)->update([
            'libelleType' => $request['libelleType'],
        ]);
        return redirect()->route('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeDepense  $typeDepense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,TypeDepense $typeDepense)
    {
        $type = TypeDepense::findOrfail($request->id);
        $type->delete();
        return redirect()->route('types');
    }
}
