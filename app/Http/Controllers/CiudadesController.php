<?php

namespace App\Http\Controllers;

use App\Ciudades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ciudades')
                ->leftJoin('departamentos', 'ciudades.departamentos_id', '=', 'departamentos.id')
                ->leftJoin('paises', 'departamentos.paises_id', '=', 'paises.id')
                ->select(
                        'paises.nombre AS nompais',
                        'departamentos.nombre AS nomdpto',
                        'ciudades.*')
                ->orderByRaw('paises.nombre DESC')
                ->get();


        return view ('ciudades.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('paises.nombre ASC')->get();
        $dpto = DB::table('departamentos')->where('status', '=', 1)->orderByRaw('departamentos.nombre ASC')->get();
        return view ('ciudades.create')->with (compact('paises', 'dpto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Ciudades();
        $data->paises_id = $request->input('pais_id');
        $data->departamentos_id = $request->input('departamento_id');
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');
        $data->user_create = Auth::id();
        $data->save();

        return redirect ('ciudades')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ciudades::find($id);
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('paises.nombre ASC')->get();
        $dpto = DB::table('departamentos')->where('status', '=', 1)->orderByRaw('departamentos.nombre ASC')->get();
        return view ('ciudades.edit')->with(compact('data', 'paises', 'dpto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ciudades::find($id);
        $data->paises_id = $request->input('pais_id');
        $data->departamentos_id = $request->input('departamento_id');
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');        
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('ciudades')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }


    public function active($id) 
    {
        $data = Ciudades::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('ciudades')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Ciudades::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('ciudades')->with('success', 'Registro inactivado exitosamente');
    }
    

    public function byGroup($id){

        $dpto = DB::table('departamentos')->where('paises_id', $id)->where('status', '=', 1)->orderByRaw('departamentos.nombre ASC')->get();
        return $dpto;     
    }

    public function byGroup2($id){

        $data = DB::table('ciudades')->where('departamentos_id', $id)->where('status', '=', 1)->orderByRaw('ciudades.nombre ASC')->get();
        return $data;     
    }
}
