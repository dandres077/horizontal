<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    protected $fillable = [
        'conjunto_id',
        'nombre',
        'f_inicio',
        'f_fin',
        'status',
        'user_create',
        'user_update'       
    ];
}
