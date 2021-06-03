<?php

namespace App\Http\Controllers;

use App\Torres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TorresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('torres')
                ->leftJoin('conjuntos', 'torres.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'torres.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'torres.user_update', '=', 'users2.id')
                ->select(
                'torres.*',
                'conjuntos.nombre AS nomconjunto',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('torres.nombre ASC')
                ->get();


        return view ('torres.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('torres.create')->with (compact('conjuntos'));
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
        $data = Torres::create($request->all()); 

        return redirect ('torres')->with('success', 'Registro creado exitosamente');
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
        $data = Torres::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('torres.edit')->with(compact('data', 'conjuntos'));
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
        $datos = Torres::find($id)->update($request->all());

        return redirect ('torres')->with('success', 'Registro actualizado exitosamente');
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
        $data = Torres::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('torres')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Torres::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('torres')->with('success', 'Registro inactivado exitosamente');
    }
}
