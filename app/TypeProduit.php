<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduit extends Model
{
    //
    protected $fillable = ['libelleTypeProduit'];
    
    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
}
