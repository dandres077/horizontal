<?php

namespace App\Http\Controllers;

use App\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = DB::table('marcas')
                ->leftJoin('users', 'marcas.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'marcas.user_update', '=', 'users2.id')
                ->select(
                'marcas.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('marcas.marca DESC')
                ->get();


        return view ('marcas.index')->with (compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $marca = new Marcas();
        $marca->tipo = $request->input('tipo');
        $marca->marca = $request->input('marca');
        $marca->user_create = Auth::id();
        $marca->save();

        return redirect ('marcas');
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
        $marca = Marcas::find($id); 
        return view ('marcas.edit')->with(compact('marca'));
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
        $marca = Marcas::find($id);
        $marca->tipo = $request->input('tipo');
        $marca->marca = $request->input('marca');
        $marca->user_update = Auth::id();
        $marca->save();

        return redirect ('marcas');
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
        $marca = Marcas::find($id);
        $marca->status = '1'; //Activo
        $marca->save();

        return back();
    }


    public function inactive($id) 
    {

        $marca = Marcas::find($id);
        $marca->status = '2';//Inactivo
        $marca->save();

        return back();
    }
}
