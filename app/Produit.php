<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
	protected $fillable = ['designation','prixUnitaire'];
    //
    public function details()
    {
        return $this->hasMany('App\DetailFacture');
    }
}
