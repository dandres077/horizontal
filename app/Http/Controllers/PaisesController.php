<?php

namespace App\Http\Controllers;

use App\Paises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('paises')
                ->leftJoin('users', 'paises.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'paises.user_update', '=', 'users2.id')
                ->select(
                'paises.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('paises.nombre ASC')
                ->get();


        return view ('paises.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Paises();
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');
        $data->icono = $request->input('icono');
        $data->user_create = Auth::id();
        $data->save();

        return redirect ('paises')->with('success', 'Registro creado exitosamente');
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
        $data = Paises::find($id); 
        return view ('paises.edit')->with(compact('data'));
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
        $data = Paises::find($id);
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');
        $data->icono = $request->input('icono');
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('paises')->with('success', 'Registro actualizado exitosamente');
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
        $data = Paises::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('paises')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Paises::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('paises')->with('success', 'Registro inactivado exitosamente');
    }
}
