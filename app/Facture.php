<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
	protected $fillable = ['nFacture','cient_id','montantFacture','dateFacture','remise'];
    //

    public function client()
    {
        return $this->belongsTo('App\Client', 'cient_id');
    }

    public function details()
    {
        return $this->hasMany('App\DetailFacture');
    }
}
