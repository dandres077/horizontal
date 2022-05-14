<?php

namespace App\Http\Controllers;

use App\Comunicados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\Funciones;
use DB;


class ComunicadosController extends Controller
{
    use Funciones;

    public function index()
    {
        $permiso = $this->permisos(Auth::id()); 

        if($permiso == 1)
        {
            $data = DB::table('comunicados')
                ->leftJoin('conjuntos', 'comunicados.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'comunicados.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comunicados.user_update', '=', 'users2.id')
                ->select(
                        'comunicados.*',
                        'conjuntos.nombre AS nomconjunto',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('comunicados.status','<>',3 )
                ->orderByRaw('comunicados.created_at ASC')
                ->get();
        }
        elseif($permiso == 2)
        {
            $data = DB::table('comunicados')
                ->leftJoin('conjuntos', 'comunicados.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'comunicados.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comunicados.user_update', '=', 'users2.id')
                ->select(
                        'comunicados.*',
                        'conjuntos.nombre AS nomconjunto',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('comunicados.conjunto_id', Auth::user()->conjunto_id)
                ->where('comunicados.status','<>',3 )
                ->orderByRaw('comunicados.created_at ASC')
                ->get();
        }        

        return view ('comunicados.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('comunicados.create')->with (compact('conjuntos'));
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
        $data = Comunicados::create($request->all());

        if ($request->file('imagen1')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen1'));
            $data->fill(['imagen1'=>asset($path)])->save();
        }

        if ($request->file('imagen2')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen2'));
            $data->fill(['imagen2'=>asset($path)])->save();
        }

        if ($request->file('imagen3')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen3'));
            $data->fill(['imagen3'=>asset($path)])->save();
        } 
        
        if ($request->file('documento1')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento1'));
            $data->fill(['documento1'=>asset($path)])->save();
        } 

        if ($request->file('documento2')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento2'));
            $data->fill(['documento2'=>asset($path)])->save();
        } 

        if ($request->file('documento3')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento3'));
            $data->fill(['documento3'=>asset($path)])->save();
        }  

        return redirect ('comunicados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('comunicados')
                ->leftJoin('conjuntos', 'comunicados.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'comunicados.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comunicados.user_update', '=', 'users2.id')
                ->select(
                'comunicados.*',
                'conjuntos.nombre AS nomconjunto',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('comunicados.id', $id )
                ->where('comunicados.status','<>',3 )
                ->orderByRaw('comunicados.created_at ASC')
                ->first();

        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('comunicados.show')->with(compact('data', 'conjuntos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Comunicados::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('comunicados.edit')->with(compact('data', 'conjuntos'));
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
        $data = Comunicados::find($id);
        $data->conjunto_id = $request->input('conjunto_id');
        $data->titulo = $request->input('titulo');
        $data->texto= $request->input('texto');        
        $data->user_update = Auth::id();
        $data->save();

        if ($request->file('imagen1')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen1'));
            $data->fill(['imagen1'=>asset($path)])->save();
        }

        if ($request->file('imagen2')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen2'));
            $data->fill(['imagen2'=>asset($path)])->save();
        }

        if ($request->file('imagen3')) {
            $path = Storage::disk('public')->put('img/comunicados',$request->file('imagen3'));
            $data->fill(['imagen3'=>asset($path)])->save();
        } 
        
        if ($request->file('documento1')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento1'));
            $data->fill(['documento1'=>asset($path)])->save();
        } 

        if ($request->file('documento2')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento2'));
            $data->fill(['documento2'=>asset($path)])->save();
        } 

        if ($request->file('documento3')) {
            $path = Storage::disk('public')->put('documentos/conjuntos',$request->file('documento3'));
            $data->fill(['documento3'=>asset($path)])->save();
        }  
        
        return redirect ('comunicados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comunicados  $comunicados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Comunicados::find($id);
        $data->status = '3'; //Eliminado
        $data->save();

        return redirect ('comunicados')->with('success', 'Registro activado exitosamente');
    }

    public function active($id) 
    {
        $data = Comunicados::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('comunicados')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Comunicados::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('comunicados')->with('success', 'Registro inactivado exitosamente');
    }


    public function ver()
    {
        $permiso = $this->permisos(Auth::id()); 

        if($permiso == 1)
        {
            $data = DB::table('comunicados')
                ->leftJoin('conjuntos', 'comunicados.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'comunicados.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comunicados.user_update', '=', 'users2.id')
                ->select(
                        'comunicados.*',
                        'conjuntos.nombre AS nomconjunto',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('comunicados.status','<>',3 )
                ->orderByRaw('comunicados.created_at ASC')
                ->get();
        }
        elseif($permiso == 2)
        {
            $data = DB::table('comunicados')
                ->leftJoin('conjuntos', 'comunicados.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'comunicados.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'comunicados.user_update', '=', 'users2.id')
                ->select(
                        'comunicados.*',
                        'conjuntos.nombre AS nomconjunto',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('comunicados.conjunto_id', Auth::user()->conjunto_id)
                ->where('comunicados.status','<>',3 )
                ->orderByRaw('comunicados.created_at ASC')
                ->get();
        }

        

        return view ('comunicados.ver')->with(compact('data'));
    }
}
