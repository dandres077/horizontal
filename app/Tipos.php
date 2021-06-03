<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $fillable = [
        'nombre',
        'siglas',
        'status',
        'user_create',
        'user_update'       
    ];
}
