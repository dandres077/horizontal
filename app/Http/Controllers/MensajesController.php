<?php

namespace App\Http\Controllers;

use App\Mensajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MensajesController extends Controller
{

    public static function fechaCastellano ($fecha, $opcion) {
      $fecha = substr($fecha, 0, 10);
      $numeroDia = date('d', strtotime($fecha));
      $dia = date('l', strtotime($fecha));
      $mes = date('F', strtotime($fecha));
      $anio = date('Y', strtotime($fecha));
      $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
      $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      $nombredia = str_replace($dias_EN, $dias_ES, $dia);
      $meses_ES = array("Ene", "Feb", "Mar", "Abr", "Mayo", "Jun", "Jul", "Ago", "Sept", "Oct", "Nov", "Dic");
      $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
      $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

      if ($opcion == 1) {
          return $numeroDia;
      }elseif ($opcion == 2){
          return $nombreMes;
      }elseif ($opcion == 3){
          return $anio;  
      }else{
          return $numeroDia." ".$nombreMes;  
      }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('mensajes')
            ->select(
                'mensajes.*')
            ->where('status','!=', 4)
            ->orderByDesc('id')
            ->get();


        $sin_leer = Mensajes::all()->where('status', 1)->count();
        return view ('mensajes.index')->with(compact('data', 'sin_leer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('mensajes.create');
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
        $data = Mensajes::create($request->all());

        return redirect ('mensajes')->with('success', 'Registro creado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Herramientas::find($id); 

        return view ('herramientas.edit')->with (compact('data'));
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
        $request['user_udpate'] = Auth::id();
        $data = Herramientas::find($id)->update($request->all());

        return redirect ('herramientas')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('mensajes')
            ->select(
                'mensajes.*')
            ->where('mensajes.id', $id)
            ->get();

        $estado = Mensajes::find($id);
        $estado->status = '2'; 
        $estado->save();

        $sin_leer = Mensajes::all()->where('status', 1)->count();


        return view ('mensajes.view')->with (compact('data', 'sin_leer'));
    }


    public function destroy($id) 
    {
        $data = Mensajes::find($id);
        $data->status = '4'; 
        $data->save();

        return redirect ('mensajes')->with('success', 'Registro eliminado exitosamente');
    }

    public function important($id, $estado) 
    {
        $data = Mensajes::find($id);
        $data->importante = $estado; 
        $data->save();

        return redirect ('mensajes')->with('success', 'Registro eliminado exitosamente');
    }

    public function trash()
    {
        $data = Mensajes::all()->where('status', 4);
        $sin_leer = Mensajes::all()->where('status', 1)->count();
        return view ('mensajes.trash')->with(compact('data', 'sin_leer'));

    }

    public function importantes()
    {
        $data = Mensajes::all()->where('status','!=', 4)->where('importante', 1);
        $sin_leer = Mensajes::all()->where('status', 1)->count();
        return view ('mensajes.trash')->with(compact('data', 'sin_leer'));

    }




}
