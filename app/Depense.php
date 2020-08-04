<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = ['dateDepense','libelleDepense','type_id','montantDepense'];

    public function type()
    {
        return $this->belongsTo('App\TypeDepense', 'type_id');
    }
    /*
         * $depense->dateDepense = $request->dateDepense;
        $depense->libelleDepense = $request->libelleDepense;
        $depense->type_id = $request->type_id;
        $depense->montantDepense = $request->montantDepense;*/


    //
}
