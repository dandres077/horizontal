<?php

namespace App\Traits;
use DB;

trait Funciones
{
    public function permisos($id)
    {

        $rol = DB::table('model_has_roles')
                ->select('id')
                ->where('role_id', 1)  //Administrador general
                ->where('model_id', $id)
                ->count();

        $rol2 = DB::table('model_has_roles')
                ->select('id')
                ->where('role_id', 2)  //Administrador del conjunto
                ->where('model_id', $id)
                ->count();
        
        if ($rol > 0) 
        {
            return 1;

        }elseif($rol2 > 0)
        {
            return 2;

        }else
        {
            return 3;
        }

   }

}
