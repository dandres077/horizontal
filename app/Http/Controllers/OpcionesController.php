<?php

namespace App\Http\Controllers;

use App\Opciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class OpcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('opciones')
                ->leftJoin('tipos', 'opciones.tipos_id', '=', 'tipos.id')
                ->leftJoin('users', 'opciones.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'opciones.user_update', '=', 'users2.id')
                ->select(
                'opciones.*',
                'tipos.nombre AS nomtipo',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('opciones.tipos_id ASC')
                ->get();


        return view ('opciones.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = DB::table('tipos')->where('status', '=', 1)->orderByRaw('tipos.nombre ASC')->get();
        return view ('opciones.create')->with (compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Opciones();
        $data->tipos_id = $request->input('tipos_id');
        $data->nombre = $request->input('nombre');    
        $data->user_create = Auth::id();
        $data->save();

        return redirect ('opciones')->with('success', 'Registro creado exitosamente');
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
        $data = Opciones::find($id); 
        $tipos = DB::table('tipos')->where('status', '=', 1)->orderByRaw('tipos.nombre ASC')->get();
        return view ('opciones.edit')->with(compact('data', 'tipos'));
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
        $data = Opciones::find($id);
        $data->tipos_id = $request->input('tipos_id');
        $data->nombre = $request->input('nombre');      
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('opciones')->with('success', 'Registro actualizado exitosamente');
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
        $data = Opciones::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('opciones')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Opciones::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('opciones')->with('success', 'Registro inactivado exitosamente');
    }
}