<?php

namespace App\Http\Controllers;

use App\Periodos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('periodos')
                ->leftJoin('conjuntos', 'periodos.conjunto_id', '=', 'conjuntos.id')
                ->select(
                'periodos.*',
                'conjuntos.nombre as nomconjunto')
                ->orderByRaw('periodos.id ASC')
                ->get();

        return view ('periodos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('periodos.create')->with (compact('conjuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $f_inicio = $request->input('f_inicio');
        $f_inicio = date("Y-m-d", strtotime($f_inicio));

        $f_fin = $request->input('f_fin');
        $f_fin = date("Y-m-d", strtotime($f_fin));

        $request['f_inicio'] = $f_inicio;
        $request['f_fin'] = $f_fin;
        $request['user_create'] = Auth::id();
        $data = Periodos::create($request->all());

        return redirect ('periodos')->with('success', 'Registro creado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Periodos::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();

        return view ('periodos.edit')->with (compact('data', 'conjuntos'));
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
        $f_inicio = $request->input('f_inicio');
        $f_inicio = date("Y-m-d", strtotime($f_inicio));

        $f_fin = $request->input('f_fin');
        $f_fin = date("Y-m-d", strtotime($f_fin));

        $request['f_inicio'] = $f_inicio;
        $request['f_fin'] = $f_fin;
        $request['user_udpate'] = Auth::id();
        $data = Periodos::find($id)->update($request->all());

        return redirect ('periodos')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function active($id) 
    {
        $data = Periodos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('periodos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Periodos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('periodos')->with('success', 'Registro inactivado exitosamente');
    }
}