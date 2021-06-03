<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinculos extends Model
{
    protected $fillable = [
        'nombre',
        'telefono1',
        'telefono2',
        'direccion',
        'orden',
        'imagen',
        'observacion',
        'ubicacion',
        'status',
        'user_create',
        'user_update'     
    ];

    public function conjuntos(){
        return $this->belongsToMany(Conjuntos::class, 'vinculos_conjuntos','vinculo_id', 'conjunto_id');
    }
}
