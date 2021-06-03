<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cld_Calendarios extends Model
{
    protected $fillable = [
        'fecha',
        'mss_ano',
        'mss_mes',
        'cld_esfuerzo_dia',
        'cld_habil',
        'cld_nombre_dia',
        'cld_semana',
        'cld_sem_mes',
        'user_create',
        'user_update'   
    ];
}


			