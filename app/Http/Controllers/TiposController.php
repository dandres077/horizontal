<?php

namespace App\Http\Controllers;

use App\Tipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tipos')
                ->leftJoin('users', 'tipos.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'tipos.user_update', '=', 'users2.id')
                ->select(
                'tipos.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('tipos.nombre DESC')
                ->get();


        return view ('tipos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Tipos();
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');
        $data->user_create = Auth::id();
        $data->save();

        return redirect ('tipos')->with('success', 'Registro creado exitosamente');
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
        $data = Tipos::find($id); 
        return view ('tipos.edit')->with(compact('data'));
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
        $data = Tipos::find($id);
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('tipos')->with('success', 'Registro actualizado exitosamente');
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
        $data = Tipos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('tipos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Tipos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('tipos')->with('success', 'Registro inactivado exitosamente');
    }
}
