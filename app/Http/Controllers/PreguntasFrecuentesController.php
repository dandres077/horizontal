<?php

namespace App\Http\Controllers;

use App\PreguntasFrecuentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class PreguntasFrecuentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('preguntas_frecuentes')
                ->leftJoin('conjuntos', 'preguntas_frecuentes.conjunto_id', '=', 'conjuntos.id')
                ->select(
                'preguntas_frecuentes.*',
                'conjuntos.nombre AS nomconjunto')
                ->where('preguntas_frecuentes.status','!=', 3 )
                ->orderByRaw('preguntas_frecuentes.created_at ASC')
                ->get();

        return view ('faq.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('faq.create')->with (compact('conjuntos'));
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
        $data = PreguntasFrecuentes::create($request->all());

        return redirect ('faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $data = DB::table('preguntas_frecuentes')
                ->leftJoin('conjuntos', 'preguntas_frecuentes.conjunto_id', '=', 'conjuntos.id')
                ->select(
                'preguntas_frecuentes.*',
                'conjuntos.nombre AS nomconjunto')
                ->where('preguntas_frecuentes.status', 1 )
                ->where('preguntas_frecuentes.conjunto_id', 1)
                ->orderByRaw('preguntas_frecuentes.created_at ASC')
                ->get();


        return view ('faq.show')->with(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PreguntasFrecuentes::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('faq.edit')->with(compact('data', 'conjuntos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PreguntasFrecuentes::find($id);
        $data->conjunto_id = $request->input('conjunto_id');
        $data->titulo = $request->input('titulo');
        $data->texto= $request->input('texto');        
        $data->user_update = Auth::id();
        $data->save();
        
        return redirect ('faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PreguntasFrecuentes::find($id);
        $data->status = '3'; //Eliminado
        $data->save();

        return redirect ('faq')->with('success', 'Registro activado exitosamente');
    }

    public function active($id) 
    {
        $data = PreguntasFrecuentes::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('faq')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = PreguntasFrecuentes::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('faq')->with('success', 'Registro inactivado exitosamente');
    }
}

