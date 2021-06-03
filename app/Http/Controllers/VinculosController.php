<?php

namespace App\Http\Controllers;

use App\Vinculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class VinculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vinculos')
                ->select('vinculos.*')
                ->orderByRaw('1, 2')
                ->get();


        return view ('vinculos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('vinculos.create')->with (compact('conjuntos'));
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
        $data = Vinculos::create($request->all()); 

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/conjuntos',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        $data->conjuntos()->sync($request->get('conjuntos'));  

        return redirect ('vinculos')->with('success', 'Registro creado exitosamente');
    }


    public function edit($id)
    {
        $data = Vinculos::find($id); 
        $conjuntos = DB::table('conjuntos')->select('id', 'nombre')->where('status', '=', 1)->orderByRaw('conjuntos.nombre ASC')->get();
        $existencia = DB::table('vinculos_conjuntos')->select('id')->where('vinculo_id', '=', $id)->count();

        if ($existencia == ''){
            $validador = 0;
        }else{
            $validador = 1;
        }

        $vinculos_conjuntos = DB::table('vinculos_conjuntos')
            ->select('conjunto_id', 'vinculo_id')
            ->where('vinculo_id', '=', $id)
            ->get();

        return view ('vinculos.edit')->with(compact('data', 'conjuntos', 'existencia', 'vinculos_conjuntos', 'validador'));

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
        $data = Vinculos::find($id);
        $data->nombre = $request->input('nombre');
        $data->telefono1 = $request->input('telefono1');
        $data->telefono2 = $request->input('telefono2');
        $data->direccion = $request->input('direccion');
        $data->orden = $request->input('orden');  
        $data->observacion = $request->input('observacion');        
        $data->user_create = Auth::id();
        $data->save(); 

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/conjuntos',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        $data->conjuntos()->sync($request->get('conjuntos'));  

        return redirect ('vinculos')->with('success', 'Registro actualizado exitosamente');
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
        $data = Vinculos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('vinculos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Vinculos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('vinculos')->with('success', 'Registro inactivado exitosamente');
    }

    public function show() 
    {

        $data = DB::table('vinculos')
                ->select('vinculos.*')
                ->where('ubicacion', '2')
                ->orderByRaw('1, 2')
                ->get();

        $data2 = DB::table('vinculos_conjuntos')
                ->leftJoin('vinculos', 'vinculos_conjuntos.vinculo_id', '=', 'vinculos.id')
                ->select('vinculos.*',)
                ->where('vinculos.ubicacion', '1')
                ->where('vinculos_conjuntos.conjunto_id', '1')
                ->orderByRaw('1, 2')
                ->get();

        return view ('vinculos.show')->with (compact('data', 'data2'));
    }
}
