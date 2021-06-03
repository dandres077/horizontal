<?php

namespace App\Http\Controllers;

use App\Conjuntos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ConjuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('conjuntos')
                ->leftJoin('users', 'conjuntos.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'conjuntos.user_update', '=', 'users2.id')
                ->select(
                'conjuntos.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('conjuntos.nombre DESC')
                ->get();


        return view ('conjuntos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $dptos = DB::table('departamentos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $ciudades = DB::table('ciudades')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('conjuntos.create')->with (compact('paises', 'dptos', 'ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_create'] = Auth::id();
        $data = Conjuntos::create($request->all());

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/conjuntos',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        return redirect ('conjuntos')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conjuntos  $conjuntos
     * @return \Illuminate\Http\Response
     */
    public function show(Conjuntos $conjuntos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conjuntos  $conjuntos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Conjuntos::find($id); 
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $dptos = DB::table('departamentos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $ciudades = DB::table('ciudades')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();

        return view ('conjuntos.edit')->with (compact('paises', 'dptos', 'ciudades', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conjuntos  $conjuntos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$datos = Conjuntos::find($id)->update($request->all());*/

        $datos = Conjuntos::find($id);
        $datos->nombre = $request->input('nombre');
        $datos->nit = $request->input('nit');
        $datos->direccion = $request->input('direccion');
        $datos->telefono = $request->input('telefono');
        $datos->celular = $request->input('celular');
        $datos->email = $request->input('email');
        $datos->imagen = $request->input('imagen');
        $datos->pais_id = $request->input('pais_id');
        $datos->dpto_id = $request->input('dpto_id');
        $datos->ciudad_id = $request->input('ciudad_id');
        $datos->localidad = $request->input('localidad');
        $datos->barrio = $request->input('barrio');
        $datos->estratos_id = $request->input('estratos_id');
        $datos->user_create = Auth::id();
        $datos->save(); 

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/users',$request->file('imagen'));
            $datos->fill(['imagen'=>asset($path)])->save();
        }

        return redirect ('conjuntos')->with('success', 'Registro actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conjuntos  $conjuntos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conjuntos $conjuntos)
    {
        //
    }


    public function active($id) 
    {
        $data = Conjuntos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('conjuntos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Conjuntos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('conjuntos')->with('success', 'Registro inactivado exitosamente');
    }


}
