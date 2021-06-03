<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $fillable = [
        'nombre',
        'siglas',
        'icono',
        'status',
        'user_create',
        'user_update'       
    ];
}
