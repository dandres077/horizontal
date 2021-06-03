<?php

namespace App\Http\Controllers;

use App\Sexos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SexosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sexo = Sexos::get();
        return view ('sexos.index')->with (compact('sexo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sexos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Sexos();
        $data->nombre = $request->input('nombre');
        $data->save();

        return redirect ('generos')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function show(Sexos $sexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sexo = Sexos::find($id); 
        return view ('sexos.edit')->with(compact('sexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Sexos::find($id);
        $data->nombre = $request->input('nombre');
        $data->save();

        return redirect ('generos')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sexos $sexo)
    {
        //
    }


    public function active($id) 
    {
        $data = Sexos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('generos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Sexos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('generos')->with('success', 'Registro inactivado exitosamente');
    }
}
