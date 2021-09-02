<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //Relacion a nivel de modelos
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    //Relacion a nivel de modelos
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
