<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduit extends Model
{
    //
    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
}
