<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class ConsumosWebController extends Controller
{
    public function opcion($conjunto, $id)
    {

    	if($id == 1){ // El usuario selecciono valor para inmuebles

	        $data = DB::table('metros_bienes')
	                ->select(
	                		'metros_bienes.id',
	                        'metros_bienes.nombre')
	                ->where('metros_bienes.conjunto_id', $conjunto)
	                ->orderByRaw('metros_bienes.nombre ASC')
	                ->get();


         }elseif($id == 2){ // El usuario selecciono valor para parqueaderos

         	$data = DB::table('opciones')
                ->select(
                		'opciones.id',
                        'opciones.nombre')
                ->where('opciones.tipos_id', 4)
                ->orderByRaw('opciones.nombre ASC')
                ->get();

         }else{ // El usuario selecciono valor para los elementos del conjunto (salon, etc)

         	$data = DB::table('elementos')
                ->select(
                		'elementos.id',
                        'elementos.nombre')
                ->where('elementos.conjunto_id', $conjunto)
                ->orderByRaw('elementos.nombre ASC')
                ->get();
         }


        return $data;
    }


}
