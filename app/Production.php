<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['quantite','indication','produit_id'];
    
    public function produit()
    {
        return $this->belongsTo('App\Produit', 'produit_id');
    }
}
