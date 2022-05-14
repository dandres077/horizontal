<?php

namespace App\Http\Controllers;

use App\Comercios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ComerciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('comercios')
                ->leftJoin('users', 'comercios.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comercios.user_update', '=', 'users2.id')
                ->select(
                'comercios.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('comercios.nombre DESC')
                ->get();


        return view ('comercios.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('conjuntos.nombre ASC')->get();
        return view ('comercios.create')->with (compact('conjuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fecha_inicio = $request->input('fecha_inicio');
        $request['fecha_inicio'] = date("Y-m-d", strtotime($fecha_inicio));

        $fecha_fin = $request->input('fecha_fin');
        $request['fecha_fin'] = date("Y-m-d", strtotime($fecha_fin));

        $request['user_create'] = Auth::id();
        $data = Comercios::create($request->all());

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/comercios',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        $data->conjuntos()->sync($request->get('conjuntos'));  

        return redirect ('comercios')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comercios  $comercios
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $comercios = DB::table('comercios_conjuntos')
                    ->leftJoin('comercios', 'comercios_conjuntos.comercio_id', '=', 'comercios.id')
                    ->select('comercios.*')
                    ->where('comercios_conjuntos.conjunto_id', Auth::user()->conjunto_id)
                    ->where('comercios.status',  1)
                    ->orderByRaw('comercios.nombre ASC')
                    ->get();

        return view ('comercios.show')->with(compact('comercios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comercios  $comercios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Comercios::find($id); 
        $conjuntos = DB::table('conjuntos')->select('id', 'nombre')->where('status', '=', 1)->orderByRaw('conjuntos.nombre ASC')->get();

        $existencia = DB::table('comercios_conjuntos')->select('id')->where('comercio_id', '=', $id)->count();

        if ($existencia == ''){
            $validador = 0;
        }else{
            $validador = 1;
        }

        $comercios_conjuntos = DB::table('comercios_conjuntos')
            ->select('comercios_conjuntos.conjunto_id', 'comercios_conjuntos.comercio_id')
            ->where('comercios_conjuntos.comercio_id', '=', $id)
            ->get();


        return view ('comercios.edit')->with(compact('data', 'conjuntos', 'validador', 'comercios_conjuntos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comercios  $comercios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($request);

        $fecha_inicio = $request->input('fecha_inicio');
        $request['fecha_inicio'] = date("Y-m-d", strtotime($fecha_inicio));

        $fecha_fin = $request->input('fecha_fin');
        $request['fecha_fin'] = date("Y-m-d", strtotime($fecha_fin));

        /*$request['user_update'] = Auth::id();
        $data = Comercios::find($id)->update($request->all());   */  

        $data = Comercios::find($id);      
        $data->nombre = $request->input('nombre');
        $data->descripcion = $request->input('descripcion');
        $data->telefono1 = $request->input('telefono1');
        $data->telefono2 = $request->input('telefono2');
        $data->ubicacion = $request->input('ubicacion');
        $data->horario = $request->input('horario');
        $data->fecha_inicio = $request->input('fecha_inicio');
        $data->fecha_fin = $request->input('fecha_fin');
        $data->tags = $request->input('tags');
        $data->user_update = $request->input('user_update');
        $data->user_update = Auth::id();
        $data->save();      

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/comercios',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        $data->conjuntos()->sync($request->get('conjuntos')); 

        return redirect ('comercios')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comercios  $comercios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comercios $comercios)
    {
        //
    }
}
