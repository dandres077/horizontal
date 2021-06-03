<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienesParqueaderos extends Model
{
    protected $fillable = [
        'bien_id',
        'usuario_id',
        'tipo_id',
        'parqueadero_id',
        'vehiculo_id',
        'fecha_asignacion',
        'fecha_finalizacion',
        'observacion',
        'status',
        'user_create',
        'user_update'
     
    ];
}
