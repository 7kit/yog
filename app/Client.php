<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = ['libelleClient','adresse','telephone'];


    public function factures()
    {
        return $this->hasMany('App\Facture', 'cient_id');
    }

    public function encaissements()
    {
        return $this->hasMany('App\Encaissement', 'cient_id');
    }

    public function montant()
    {
    	return $this->factures()->sum('montantFacture') - $this->encaissements()->sum('montantEncaisse');
    }
}
