<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('departamentos')
                ->leftJoin('paises', 'departamentos.paises_id', '=', 'paises.id')
                ->leftJoin('users', 'departamentos.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'departamentos.user_update', '=', 'users2.id')
                ->select(
                'departamentos.*',
                'paises.nombre AS nompais',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('departamentos.nombre ASC')
                ->get();


        return view ('departamentos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('paises.nombre ASC')->get();
        return view ('departamentos.create')->with (compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Departamentos();
        $data->paises_id = $request->input('pais_id');
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');        
        $data->user_create = Auth::id();
        $data->save();

        return redirect ('departamentos')->with('success', 'Registro creado exitosamente');
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
        $data = Departamentos::find($id); 
        $paises = DB::table('paises')->where('status', '=', 1)->orderByRaw('paises.nombre ASC')->get();
        return view ('departamentos.edit')->with(compact('data', 'paises'));
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
        $data = Departamentos::find($id);
        $data->paises_id = $request->input('pais_id');
        $data->nombre = $request->input('nombre');
        $data->siglas = $request->input('siglas');        
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('departamentos')->with('success', 'Registro actualizado exitosamente');
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
        $data = Departamentos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('departamentos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Departamentos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('departamentos')->with('success', 'Registro inactivado exitosamente');
    }
}