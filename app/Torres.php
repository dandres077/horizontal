<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torres extends Model
{
    protected $fillable = [
        'conjunto_id',
        'nombre',
        'observacion',
        'status',
        'user_create',
        'user_update'     
    ];
}



			