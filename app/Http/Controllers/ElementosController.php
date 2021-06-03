<?php

namespace App\Http\Controllers;

use App\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ElementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('elementos')
                ->leftJoin('conjuntos', 'elementos.conjunto_id', '=', 'conjuntos.id')
                ->select(
                'elementos.*',
                'conjuntos.nombre as nomconjunto')
                ->orderByRaw('elementos.id ASC')
                ->get();
        return view ('elementos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('elementos.create')->with (compact('conjuntos'));
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
        $data = Elementos::create($request->all());

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/elementos',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        return redirect ('elementos')->with('success', 'Registro creado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Elementos::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();

        return view ('elementos.edit')->with (compact('data', 'conjuntos'));
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
        $data = Elementos::find($id);
        $data->conjunto_id = $request->input('conjunto_id');
        $data->nombre = $request->input('nombre');
        $data->descripcion= $request->input('descripcion');        
        $data->user_update = Auth::id();
        $data->save();

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/elementos',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        return redirect ('elementos')->with('success', 'Registro actualizado exitosamente');
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
        $data = Elementos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('elementos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Elementos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('elementos')->with('success', 'Registro inactivado exitosamente');
    }
}
