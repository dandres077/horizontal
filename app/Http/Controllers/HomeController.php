<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $v_local = DB::table('vinculos')
                ->leftJoin('vinculos_conjuntos', 'vinculos.id', '=', 'vinculos_conjuntos.vinculo_id')
                ->select('vinculos.*')
                ->where('vinculos.ubicacion', '1')
                ->where('vinculos_conjuntos.conjunto_id', '1')
                ->orderByRaw('vinculos.orden ASC')
                ->get();

        $v_general = DB::table('vinculos')
                ->leftJoin('vinculos_conjuntos', 'vinculos.id', '=', 'vinculos_conjuntos.vinculo_id')
                ->select('vinculos.*')
                ->where('vinculos.ubicacion', '2')
                ->where('vinculos_conjuntos.conjunto_id', '1')
                ->orderByRaw('vinculos.orden ASC')
                ->get();

        $comunicados = DB::table('comunicados')
                ->select('comunicados.*')
                ->where('comunicados.conjunto_id', '1')
                ->orderByRaw('comunicados.created_at ASC')
                ->get();

        $conjunto = DB::table('conjuntos')
                ->select('conjuntos.*')
                ->where('id', '1')
                ->first();

        $reservas = DB::select("SELECT 
                    valores_conjuntos.id,
                    valores_conjuntos.item_id,
                    case item_id  when 3 then (SELECT nombre FROM elementos WHERE id = opcion_id) end as nom_requerimiento,
                    case item_id  when 3 then (SELECT imagen FROM elementos WHERE id = opcion_id) end as imagen,
                    valores_conjuntos.valor,
                    valores_conjuntos.descripcion,
                    conjuntos.nombre AS nomconjunto
                    FROM `valores_conjuntos`
                    LEFT JOIN conjuntos ON valores_conjuntos.conjunto_id = conjuntos.id
                    WHERE
                    valores_conjuntos.item_id = 3 AND
                    valores_conjuntos.conjunto_id = 1 AND
                    valores_conjuntos.status = 1");



        $disponible_v = DB::table('parqueaderos')->select('id')->where('conjunto_id', '1')->where('tipo_id', '12')->where('status', '1')->count();
        $disponible_m = DB::table('parqueaderos')->select('id')->where('conjunto_id', '1')->where('tipo_id', '13')->where('status', '1')->count();
        $disponible_b = DB::table('parqueaderos')->select('id')->where('conjunto_id', '1')->where('tipo_id', '14')->where('status', '1')->count();

        return view ('home')->with (compact('v_local', 'v_general', 'comunicados', 'conjunto', 'disponible_v', 'disponible_m', 'disponible_b', 'reservas'));

    }

    public function usuario()
    {

        return view ('usuario');

    }

    public function administrador()
    {

        return view ('administrador');

    }

}


    