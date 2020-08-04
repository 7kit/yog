<?php

namespace App\Http\Controllers;

use App\Depense;
use App\TypeDepense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if($id==7777){
            $depenses = Depense::all();
            $montant = Depense::all()->sum('montantDepense');
            $typeDepenses = TypeDepense::all();
        }
        else{
            $depenses = Depense::where('type_id',$id)->get();
            $montant = Depense::where('type_id',$id)->sum('montantDepense');
            $typeDepenses = TypeDepense::all();
        }

        return view('depenses', ['typeDepenses' => $typeDepenses, 'depenses' => $depenses, 'montant'=>$montant]);
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
        $depense = new Depense;

        $depense->dateDepense = $request->dateDepense;
        $depense->libelleDepense = $request->libelleDepense;
        $depense->type_id = $request->type_id;
        $depense->montantDepense = $request->montantDepense;

        $depense->save();

        return redirect()->route('depenses',['id'=>7777]);
        //, ['debut' => $request->debut,'fin' => $request->fin,'idclient'=>$request->client]
        //return redirect()->route('details',['id' => $request->nFacture]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {

        //dd($request);
        Depense::where('id', $request->id)->update([
            'dateDepense' => $request['dateDepense'],
            'libelleDepense' => $request['libelleDepense'],
            'type_id' => $request['type_id'],
            'montantDepense' => $request['montantDepense'],
        ]);
        return redirect()->route('depenses', ['id'=>7777]);// cela devrait renvoyer vers la facture individuelle pour saisir les détails.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Depense $depense)
    {
        $depense = Depense::findOrfail($request->id);
        $depense->delete();
        return redirect()->route('depenses', ['id'=>7777]);
        //
    }
}
