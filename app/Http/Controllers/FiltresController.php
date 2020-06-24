<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Encaissement;
use App\Facture;
use App\Produit;

class FiltresController extends Controller
{

	public function show()
	{
		$clients = Client::all();
		$produits = Produit::all()->count();
		$montantEncaisse = Encaissement::all()->sum('montantEncaisse');
		$montantFacture = Facture::all()->sum('montantFacture');
		$resteAPayer = Facture::all()->sum('montantFacture') - Encaissement::all()->sum('montantEncaisse');
		return view('dashboard', ['produits'=>$produits,'clients'=> $clients, 'montantEncaisse'=>$montantEncaisse, 'montantFacture'=>$montantFacture, 'resteAPayer'=>$resteAPayer]);
	}

	public function showFacture($debut, $fin, $idclient)
	{
		$clients = Client::all();
		if ($idclient==0) {
        		$factures = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->get();
        		$montantFacture = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->sum('montantFacture');
        		$total = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->count();
        	
        }
        else{
        	$factures = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->where('cient_id',$idclient)->get();
        		$montantFacture = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->where('cient_id',$idclient)->sum('montantFacture');
        		$total = Facture::where('dateFacture','>=', $debut)->where('dateFacture','<=',$fin)->where('cient_id',$idclient)->count();
        }
        return view('filtresFacture', ['clients'=> $clients, 'factures'=> $factures, 'montantFacture'=>$montantFacture, 'total'=>$total]);
	}

	public function showEncaissement($debut, $fin, $idclient)
	{
		$clients = Client::all();
		if ($idclient==0) {
        		$encaissements = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->get();
        		$montantEncaisse = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->sum('montantEncaisse');
        		$total = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->count();
        	
        }
        else{
        	$encaissements = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->where('cient_id',$idclient)->get();
        		$montantEncaisse = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->where('cient_id',$idclient)->sum('montantEncaisse');
        		$total = Encaissement::where('dateEncaissement','>=', $debut)->where('dateEncaissement','<=',$fin)->where('cient_id',$idclient)->count();
        }
        return view('filtresEncaissement', ['clients'=> $clients, 'encaissements'=> $encaissements, 'montantEncaisse'=>$montantEncaisse, 'total'=>$total]);
	}

	public function processFacture(Request $request){
		return redirect()->route('filtresFacture', ['debut' => $request->debut,'fin' => $request->fin,'idclient'=>$request->client]);
		
	}

	public function processEncaissement(Request $request){
		return redirect()->route('filtresEncaissement', ['debut' => $request->debut,'fin' => $request->fin,'idclient'=>$request->client]);
	}

	/*public function clientsARisques(){
		$eux = [];
		$clients = Client::all();
		foreach ($clients as $client){
			if (Facture::where('cient_id',$client->id)->count()!=0) {
				if (Encaissement::where('cient_id',$request->client)->count()!=0) {
					array_push($eux, $client);
				}
				else{
					array_push($eux, $client);
				}
				
			}
		    
		}
	}*/

    /*public function process(Request $request)
    {
    	$clients = Client::all();

        //dd($request->all());
        if ($request->client==0) {
        	if ($request->type=="Encaissements") {
        		$encaissements = Encaissement::where('dateEncaissement','>=', $request->debut)->where('dateEncaissement','<=',$request->fin);
        		$montantEncaisse = Encaissement::where('dateEncaissement','>=', $request->debut)->where('dateEncaissement','<=',$request->fin)->sum('montantEncaisse');
        		return redirect()->route('filtres', ['t'=>'1','clients'=> $clients, 'encaissements'=> $encaissements, 'montantEncaisse'=>$montantEncaisse]); 
        	}
        	if ($request->type=="Factures") {
        		$factures = Facture::where('dateFacture','>=', $request->debut)->where('dateFacture','<=',$request->fin);
        		$montantFacture = Facture::where('dateFacture','>=', $request->debut)->where('dateFacture','<=',$request->fin)->sum('montantFacture');
        		return redirect()->route('filtres', ['t'=>'2','clients'=> $clients, 'factures'=> $factures, 'montantFacture'=>$montantFacture]); 
        	}
        }
        else{
        	$resteAPayer = Facture::where('cient_id',$request->client)->sum('montantFacture') - Encaissement::where('cient_id',$request->client)->sum('montantEncaisse');

        	if ($request->type=="Encaissements") {
        		$encaissements = Encaissement::where('dateEncaissement','>=', $request->debut)->where('dateEncaissement','<=',$request->fin)->where('cient_id',$request->client);
        		$montantEncaisse = Encaissement::where('dateEncaissement','>=', $request->debut)->where('dateEncaissement','<=',$request->fin)->where('cient_id',$request->client)->sum('montantEncaisse');
        		return redirect()->route('filtres', ['t'=>'3','clients'=> $clients, 'encaissements'=> $encaissements, 'montantEncaisse'=>$montantEncaisse, 'resteAPayer'=>$resteAPayer]); 
        	}
        	if ($request->type=="Factures") {
        		$factures = Facture::where('dateFacture','>=', $request->debut)->where('dateFacture','<=',$request->fin)->where('cient_id',$request->client);
        		$montantFacture = Facture::where('dateFacture','>=', $request->debut)->where('dateFacture','<=',$request->fin)->where('cient_id',$request->client)->sum('montantFacture');
        		return redirect()->route('filtres', ['t'=>'4','clients'=> $clients, 'factures'=> $factures, 'montantFacture'=>$montantFacture, 'resteAPayer'=>$resteAPayer]);
        	}
        }
        //$produits = Produit::all();
        //$facture = Facture::find($id);
        //return view('details', ['produits' => $produits, 'facture' => $facture]);
    }*/
}
