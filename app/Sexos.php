<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexos extends Model
{
    protected $fillable = [
        'nombre',
        'status',
        'user_create',
        'user_update'       
    ];
}
