<?php

namespace App\Http\Controllers;

use App\MetrosBienes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MetrosBienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('metros_bienes')
                ->leftJoin('conjuntos', 'metros_bienes.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'metros_bienes.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'metros_bienes.user_update', '=', 'users2.id')
                ->select(
                'metros_bienes.*',
                'conjuntos.nombre AS nomconjunto',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('metros_bienes.nombre ASC')
                ->get();


        return view ('metrosbienes.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('metrosbienes.create')->with (compact('conjuntos'));
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
        $data = MetrosBienes::create($request->all()); 

        return redirect ('metrosbienes')->with('success', 'Registro creado exitosamente');
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
        $data = MetrosBienes::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('metrosbienes.edit')->with(compact('data', 'conjuntos'));
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
        $request['user_create'] = Auth::id();
        $datos = MetrosBienes::find($id)->update($request->all());

        return redirect ('metrosbienes')->with('success', 'Registro actualizado exitosamente');
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
        $data = MetrosBienes::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('metrosbienes')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = MetrosBienes::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('metrosbienes')->with('success', 'Registro inactivado exitosamente');
    }
}

