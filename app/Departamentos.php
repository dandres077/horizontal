<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $fillable = [
        'pais_id',
        'nombre',
        'siglas',
        'status',
        'user_create',
        'user_update'       
    ];
}
