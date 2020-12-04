<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
	protected $fillable = ['designation','prixUnitaire','type_id'];
    //
    public function details()
    {
        return $this->hasMany('App\DetailFacture');
    }

    public function typeProduit()
    {
        return $this->belongsTo('App\TypeProduit', 'type_id');
    }
}
