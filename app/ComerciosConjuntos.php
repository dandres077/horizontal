<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComerciosConjuntos extends Model
{
    protected $fillable = [
        'conjunto_id',
        'comercio_id',       
        'status',
        'user_create',
        'user_update'       
    ];
}
