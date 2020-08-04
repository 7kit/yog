<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDepense extends Model
{
    protected $fillable = ['libelleType'];

    public function depenses()
    {
        return $this->hasMany('App\Depense');
    }
}
