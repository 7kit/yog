<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encaissement extends Model
{
    //
    protected $fillable = ['cient_id','montantEncaisse','dateEncaissement'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'cient_id');
    }
}
