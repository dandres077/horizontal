<?php

namespace App\Http\Controllers;

use App\Mascotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($inmueble)
    {
        $conjunto = DB::table('bienes')->select('conjunto_id')->where('id',$inmueble)->where('status', 1)->first();
        $conjunto = $conjunto->conjunto_id;

        $usuarios = DB::table('usuarios_bienes')
                ->leftJoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
                ->leftJoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
                ->select('users.id as usuario_id', 
                         'bienes.*',
                         DB::raw('CONCAT(users.name, " " ,users.last) AS nomusuario'))
                ->where('usuarios_bienes.status', 1)
                ->where('usuarios_bienes.bien_id', $inmueble)
                ->orderByRaw('users.name ASC')
                ->get();  


        $data = DB::table('bienes')
            ->leftjoin('torres', 'bienes.torre_id', '=', 'torres.id')
            ->leftjoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
            ->select(
                'bienes.*',
                'torres.nombre AS nomtorre',
                'conjuntos.nombre AS nomconjunto')
            ->where('bienes.id',$inmueble)
            ->first();   


        $tipos = DB::table('opciones')->where('tipos_id', 7)->where('status', 1)->orderByRaw('nombre ASC')->get();

        //$inmueble = $inmueble;


        return view ('mascotas.create')->with (compact('conjunto', 'data','tipos', 'usuarios', 'inmueble'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $conjunto, $inmueble)
    {

        $nacimiento = $request->input('nacimiento');
        $fecha = date("Y-m-d", strtotime($nacimiento));

        $request['bien_id'] = $inmueble;
        $request['nacimiento'] = $fecha;
        $request['user_create'] = Auth::id();
        $data = Mascotas::create($request->all());

        return redirect ('residentes/'.$inmueble.'/view')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit($inmueble, $mascota)
    {
        //Permisos
        $validar = DB::table('mascotas')
                    ->select('id')
                     ->where('id', $mascota)
                     ->where('bien_id', $inmueble)
                    ->count();   
        
        if($validar == 0){
            return back();
        }

        $conjunto = DB::table('bienes')->select('conjunto_id')->where('id',$inmueble)->where('status', 1)->first();
        $conjunto = $conjunto->conjunto_id;

        $usuarios = DB::table('usuarios_bienes')
                ->leftJoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
                ->leftJoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
                ->select('users.id as usuario_id', 
                         'bienes.*',
                         DB::raw('CONCAT(users.name, " " ,users.last) AS nomusuario'))
                ->where('usuarios_bienes.status', 1)
                ->where('usuarios_bienes.bien_id', $inmueble)
                ->orderByRaw('users.name ASC')
                ->get();  


        $data = DB::table('mascotas')
                ->leftJoin('bienes', 'mascotas.bien_id', '=', 'bienes.id')
                ->leftJoin('torres', 'bienes.torre_id', '=', 'torres.id')
                ->leftJoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
                ->select('mascotas.*',
                         'mascotas.id as mascota_id',
                         'bienes.nombre as nomapto',
                         'torres.nombre as nomtorre',
                         'conjuntos.id as conjunto_id',
                         'conjuntos.nombre as nomconjunto',
                         'mascotas.usuario_id as usuario_id')
                ->where('mascotas.status', 1)
                ->where('mascotas.id', $mascota)
                ->first();   


        $tipos = DB::table('opciones')->where('tipos_id', 7)->where('status', 1)->orderByRaw('nombre ASC')->get();

        //$inmueble = $inmueble;

        return view ('mascotas.edit')->with (compact('conjunto', 'data','tipos', 'usuarios', 'inmueble'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $request['user_update'] = Auth::id();
        $datos = Mascotas::find($id)->update($request->all());   

        return redirect ('residentes/'.$request->input('inmueble').'/view')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascotas $mascotas)
    {
        //
    }

    public function active_mascota_conjunto($bien, $mascota) 
    {
        $data = DB::table('mascotas')
                    ->where('bien_id', $bien)
                    ->where('id', $mascota)
                    ->update(['status' => '1']);

        return redirect ('bienes')->with('success', 'Registro activado exitosamente');
    }


    public function inactive_mascota_conjunto($bien, $mascota) 
    {

        $data = DB::table('mascotas')
                    ->where('bien_id', $bien)
                    ->where('id', $mascota)
                    ->update(['status' => '2']);

        return redirect ('residentes/'.$bien.'/view')->with('eliminar', 'ok');
    }
}
