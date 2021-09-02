<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    //RElacion a nivel de modelo
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
