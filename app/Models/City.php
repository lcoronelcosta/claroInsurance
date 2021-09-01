<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    //Relacion a nivel de los modelos
    public function country()
    {
        return $this->hasOne('App\Country');
    }

    //Relacion a nivel de los modelos
    public function state()
    {
        return $this->hasOne('App\State');
    }
}
