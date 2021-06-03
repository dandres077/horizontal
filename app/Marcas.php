<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $fillable = [
        'tipo',
        'marca',
        'imagen',
        'status',
        'user_create',
        'user_update'       
    ];
}





            