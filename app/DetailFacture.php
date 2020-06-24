<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailFacture extends Model
{
    //
    protected $fillable = ['facture_id','produit_id','quantiteProduit','montantDetail'];

    public function facture()
    {
        return $this->belongsTo('App\Facture');
    }

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }

    public function montant(){
        //$produit = $this->produit();
        //return $produit->prixUnitaire*$this->quantiteProduit;
    }
}
