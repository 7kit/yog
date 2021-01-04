<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perime extends Model
{
    protected $fillable = ['quantite','indication','produit_id'];
    
    public function produit()
    {
        return $this->belongsTo('App\Produit', 'produit_id');
    }
}
