<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\UsuariosBienes;
use DB;
use Hash;


class UserController extends Controller
{


/*-- ----------------------------
-- Función Random
-- ----------------------------*/

/*public function generarCodigo($longitud) 
    {
    $key = 'UA';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
    }*/

/*-- ----------------------------
-- Index
-- ----------------------------*/

     public function index() 
    {
        $data = DB::table('users')
            ->leftjoin('opciones', 'users.tipo_identificacion', '=', 'opciones.id')
            ->leftjoin('sexos', 'users.genero_id', '=', 'sexos.id')
            ->select(
                'users.*',
                'opciones.nombre AS tipo_i',
                'sexos.nombre AS nom_sexo')
            ->orderByRaw('users.id ASC')
            ->get();


        return view ('users.index')->with (compact('data'));
    }



/*-- ----------------------------
-- Show
-- ----------------------------*/

     public function show_residente($id) 
    {

        $validar = DB::table('bienes')
                    ->select('id')
                    ->where('id', $id)
                    ->where('conjunto_id', Auth::user()->conjunto_id)
                    ->count();
        
        if($validar == 0){
            return back();
        }


        $data = DB::table('usuarios_bienes')
            ->leftjoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
            ->leftjoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
            ->leftjoin('sexos', 'users.genero_id', '=', 'sexos.id')
            ->select(
                'usuarios_bienes.*',
                'usuarios_bienes.status AS ub_status',
                'users.*',
                'sexos.nombre as nomsexo')
            ->where('bienes.id', $id)
            ->where('usuarios_bienes.status', 1)
            ->get();


        $data2 = DB::table('bienes_parqueaderos')
            ->leftjoin('users', 'bienes_parqueaderos.usuario_id', '=', 'users.id')
            ->leftjoin('opciones', 'bienes_parqueaderos.tipo_id', '=', 'opciones.id')
            ->leftjoin('parqueaderos', 'bienes_parqueaderos.parqueadero_id', '=', 'parqueaderos.id')
            ->leftjoin('vehiculos', 'bienes_parqueaderos.vehiculo_id', '=', 'vehiculos.id')
            ->leftjoin('marcas', 'vehiculos.marca_id', '=', 'marcas.id')
            ->leftjoin('opciones as opciones2', 'vehiculos.color_id', '=', 'opciones2.id')
            ->select(
                'users.name',
                'users.last',
                'opciones.nombre as nomopcion',
                'parqueaderos.nombre as nomparqueadero',
                'marcas.marca as nommarca',
                'marcas.imagen as imagen',
                'opciones2.nombre as nomcolor',
                'vehiculos.*', 
                'vehiculos.observacion as v_observacion', 
                'bienes_parqueaderos.status AS bp_status')
            ->where('bienes_parqueaderos.bien_id', $id)
            ->where('bienes_parqueaderos.status', 1)
            ->get();


        $data3 = DB::table('mascotas')
            ->leftjoin('users', 'mascotas.usuario_id', '=', 'users.id')
            ->leftjoin('opciones', 'mascotas.tipo_id', '=', 'opciones.id')            
            ->select(
                'users.name',
                'users.last',
                'opciones.nombre as nomopcion',                
                'mascotas.*', 
                'mascotas.observacion as m_observacion',
                'mascotas.status AS m_status')
            ->where('mascotas.bien_id', $id)
            ->where('mascotas.status', 1)
            ->get();

        $bien = $id;

        return view ('users.view_residentes')->with (compact('data', 'data2', 'data3','bien'));
    }


/*-- ----------------------------
-- Usuario creado por el administrador del conjunto ---> 2020
-- ----------------------------*/

    public function crear_residente($id) 
    {
        
        $data = DB::table('bienes')
            ->leftjoin('torres', 'bienes.torre_id', '=', 'torres.id')
            ->leftjoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
            ->select(
                'bienes.*',
                'torres.nombre AS nomtorre',
                'conjuntos.nombre AS nomconjunto')
            ->where('bienes.id',$id)
            ->first();
        //dd($data);

        $tipo_identificacion = DB::table('opciones')->where('tipos_id', '=', 2)->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $generos = DB::table('sexos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $tipo_residente = DB::table('opciones')->where('tipos_id', '=', 6)->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $inmueble = $id;
        
        return view ('users.crear_residente')->with (compact('data','tipo_identificacion', 'generos', 'tipo_residente', 'inmueble'));

    }



/*-- ----------------------------
-- Store : Usuario creado por el administrador del sistema ---> 2020
-- ----------------------------*/
    public function store_residente(Request $request, $id)
    {

        if (User::where('email', $request->input('email'))->exists()) {
            return back()->with('danger', 'Ya existe un usuario con el correo ingresado.');

        };
        
        $request['password'] = bcrypt('123456');
        $request['user_create'] = Auth::id();
        $request['conjunto_id'] = Auth::user()->conjunto_id;
        $request['imagen'] = 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png';
        $data = User::create($request->all());

        $request['bien_id'] = $id;
        $request['usuario_id'] = $data->id;
        $data2 = UsuariosBienes::create($request->all());   


        if($request->input('tipo_residente') == '26' or $request->input('tipo_residente') == '28')
        {
            DB::insert('INSERT INTO model_has_roles (role_id, model_id) values (?, ?)', ['2', $data->id]);
        }

        return redirect ('residentes/'.$id.'/view')->with('success', 'Registro creado exitosamente');        

    }



/*-- ----------------------------
-- Edit : Usuario creado por el administrador del sistema ---> 2020
-- ----------------------------*/
    public function edit_residente($bien, $id) 
    {
        //Permisos
        $validar = DB::table('bienes')
                    ->leftjoin('usuarios_bienes', 'bienes.id', '=', 'usuarios_bienes.bien_id')
                    ->select(
                        'bienes.id')
                    ->where('bienes.id',$bien)
                    ->where('usuarios_bienes.usuario_id',$id)
                    ->count();
        
        if($validar == 0){
            return back();
        }


        $data = DB::table('bienes')
            ->leftjoin('torres', 'bienes.torre_id', '=', 'torres.id')
            ->leftjoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
            ->leftjoin('usuarios_bienes', 'bienes.id', '=', 'usuarios_bienes.bien_id')
            ->select(
                'bienes.*',
                'torres.nombre AS nomtorre',
                'conjuntos.nombre AS nomconjunto', 
                'usuarios_bienes.tipo_residente')
            ->where('bienes.id',$bien)
            ->first();

        $data1 = User::find($id); 


        $tipo_identificacion = DB::table('opciones')->where('tipos_id', '=', 2)->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $generos = DB::table('sexos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $tipo_residente = DB::table('opciones')->where('tipos_id', '=', 6)->where('status', '=', 1)->orderByRaw('nombre ASC')->get(); 
        $inmueble = $bien;
        $usuario = $id;

        return view ('users.editar_residentes')->with(compact('data', 'data1', 'tipo_identificacion', 'generos', 'tipo_residente', 'inmueble', 'usuario'));
    }





/*-- ----------------------------
-- Update : Usuario creado por el administrador del sistema ---> 2020
-- ----------------------------*/
    public function update_residente(Request $request, $inmueble, $usuario)
    {

        /*if (User::where('email', $request->input('email'))->exists()) {
            return back()->with('danger', 'Ya existe un usuario con el correo ingresado.');

        };*/
        
        $request['bien_id'] = $inmueble;
        $request['user_update'] = Auth::id();
        $data = User::find($usuario)->update($request->all());


        $data2 = DB::table('usuarios_bienes')
            ->where('bien_id', $inmueble)
            ->where('usuario_id', $usuario)
            ->update(['tipo_residente' => $request->input('tipo_residente')]);

            return redirect ('residentes/'.$inmueble.'/view')->with('success', 'Registro actualizado exitosamente');

        //DB::insert('INSERT INTO role_user (role_id, user_id) values (?, ?)', ['2', $user_id]);

    }




/*-- ----------------------------
-- Index : Usuarios creado por el administrador del sistema --> 2020
-- ----------------------------*/

     public function index_residente($conjunto) 
    {
        $data = DB::table('usuarios_bienes')
            ->leftjoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
            ->leftjoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
            ->leftjoin('torres', 'bienes.torre_id', '=', 'torres.id')
            ->leftjoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
            ->leftjoin('sexos', 'users.genero_id', '=', 'sexos.id')
            ->leftjoin('opciones', 'users.tipo_identificacion', '=', 'opciones.id')
            ->leftjoin('opciones as opciones2', 'usuarios_bienes.tipo_residente', '=', 'opciones2.id')
            ->select(
                'usuarios_bienes.*',
                'users.*',
                'bienes.nombre as nombien',
                'torres.nombre as nomtorre',
                'sexos.nombre as nomsexo', 
                'opciones.nombre as nomidentificacion',
                'opciones2.nombre as nomtiporesidente')
            ->where('conjuntos.id', $conjunto)
            ->where('usuarios_bienes.status', 1)
            ->orderByRaw('2,3')
            ->get();  


        return view ('users.index_residentes')->with (compact('data', 'conjunto'));
    }



    public function active_user_conjunto($bien, $usuario) 
    {
        $data = DB::table('usuarios_bienes')
                    ->where('bien_id', $bien)
                    ->where('usuario_id', $usuario)
                    ->update(['status' => '1']);

        return redirect ('bienes')->with('success', 'Registro activado exitosamente');
    }


    public function inactive_user_conjunto($bien, $usuario) 
    {

        $data = DB::table('usuarios_bienes')
                    ->where('bien_id', $bien)
                    ->where('usuario_id', $usuario)
                    ->update(['status' => '2']);

        $data = DB::table('users')
                    ->where('id', $bien)
                    ->update(['status' => '2']);

        return redirect ('residentes/'.$bien.'/view')->with('eliminar', 'ok');
        
    }
        

        


























/*-- ----------------------------
-- Store Web
-- ----------------------------*/
public function storeweb(UsuariosStoreWeb $request) 
{

    $codigo =  $this->generarCodigo(6);

    $user = new User();
    $user->name = $request->input('name');
    $user->last = $request->input('last');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->email = $request->input('email');
    $user->confirmation_code = $codigo;
    $user->save();

    $user_id = $user->id;

    DB::insert('INSERT INTO role_user (role_id, user_id) values (?, ?)', ['2', $user_id]);

    $data = array(

        'nom_usuario' => $request->input('name'),      
        'destinatario' => $request->input('email'),
        'codigo' => $codigo
    );

    Mail::send('emails/notificacion1', compact('data'), function($message)use ($data){
        $message->from('contacto@motcar.co', 'MotCar');
        $message->to($data['destinatario'])->subject('Activación cuenta');

    });

    return redirect('login')->with('success', 'Se ha enviado un correo para la confirmación de tu cuenta');
}


/*-- ----------------------------
-- Edit
-- ----------------------------*/
    public function edit($id) 
    {
        $user = User::find($id); 
        $generos = DB::table('sexos')->where('status', 1)->orderByRaw('id ASC')->get(); 

        $tipos = DB::table('opciones')
                    ->select('id', 'nombre')
                    ->where('tipos_id', 2)
                    ->where('status', 1)
                    ->orderByRaw('nombre ASC')
                    ->get();  

        $conjuntos = DB::table('conjuntos')->select('id', 'nombre')->where('status', 1 )->orderByRaw('nombre ASC')->get(); 

        $roles = Role::get();
        $rol_user = DB::table('model_has_roles')
            ->select('model_has_roles.*')
            ->where('model_id', '=', $id)
            ->get();


        return view ('users.edit')->with(compact('user', 'roles', 'rol_user', 'generos', 'tipos', 'conjuntos'));
    }


/*-- ----------------------------
-- Edit Perfil
-- ----------------------------*/
    public function editarperfil($id) 
    {
        if ($id != Auth::id())
        return redirect('perfil');

        $user = User::find($id); 
        //$this->authorize('pass', $user);
        $sexo = DB::table('sexos')->where('Estado', '=', 1)->orderByRaw('sexos.id ASC')->get();  
        $pais = DB::table('pais')->where('status', '=', 1)->orderByRaw('pais.nombre ASC')->get();  
        $dpto = DB::table('departamentos')->where('status', '=', 1)->orderByRaw('departamentos.nombre ASC')->get();  
        $ciudad = DB::table('ciudads')->where('status', '=', 1)->orderByRaw('ciudads.nombre ASC')->get();     


        return view ('users.editperfil')->with(compact('user', 'sexo', 'pais', 'dpto', 'ciudad'));
    }



/*-- ----------------------------
-- Update
-- ----------------------------*/
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last = $request->input('last');        
        $user->tipo_identificacion = $request->input('tipo_identificacion');
        $user->n_identificacion = $request->input('n_identificacion');
        $user->genero_id = $request->input('genero_id');
        $user->email = $request->input('email');
        $user->save();  

        $user->roles()->sync($request->get('roles'));  //Sincroniza los roles de un usuario     

        return redirect ('usuarios')->with('success', 'Registro actualizado exitosamente');
    }


/*-- ----------------------------
-- Update Perfil
-- ----------------------------*/
    public function updateperfil(Request $request, $id)
    {      
        if ($id != Auth::id())
        return redirect('perfil');    

        $rules = [
            'name' => 'required|max:30',
            'last' => 'required|max:30',
            'sexo_id' => 'required|numeric|min:0|max:5',
            'nacimiento' => 'required|date_format:m/d/Y',
            'pais_id' => 'required|max:5',
            'departamento_id' => 'required|max:32',
            'ciudad_id' => 'required|max:15',
        ];

        $this->validate($request, $rules);

        $nacimiento = $request->input('nacimiento');
        $fecha = date("Y-m-d", strtotime($nacimiento));

        $user = User::find($id);
        //$this->authorize('pass', $user);
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->nacimiento = $fecha;
        $user->sexo_id = $request->input('sexo_id');
        $user->pais_id = $request->input('pais_id');
        $user->departamento_id = $request->input('departamento_id');
        $user->ciudad_id = $request->input('ciudad_id');
        $user->save();
        
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/users',$request->file('imagen'));
            $user->fill(['imagen'=>asset($path)])->save();
        }

        /*$data = array(

            'nom_usuario' => 'DavidContreras',         
            'destinatario' => 'davidcontreras07@gmail.com'
        );

        Mail::send('emails/notificacion1', compact('data'), function($message)use ($data){
            $message->from('contacto@motcar.co', 'MotCar');
            $message->to($data['destinatario'])->subject('Activación cuenta');

        });*/

        return redirect ('perfil')->with('success', 'Perfil actualizado exitosamente');
    }



/*-- ----------------------------
-- Destroy
-- ----------------------------*/
    public function destroy($id) 
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }


/*-- ----------------------------
-- Cambio de contraseña - Vista
-- ----------------------------*/
    public function cambio() 
    {   
        return view ('users.cambio');
    }


/*-- ----------------------------
-- Actualizar contraseña 
-- ----------------------------*/
    public function actualizarpwd(Request $request) 
    {

        $pwd = DB::table('users')->select('id', 'password')->where('id', Auth::id())->first(); 
        $password = bcrypt($request->input('actual'));

        if($request->password != $request->password_confirmation){
            return redirect ('perfil/cambio')->with('danger', 'La contraseña de confirmación no coincide');
        }

        if(Hash::check( $pwd->password , $request->input('actual'))) // Son diferentes
        {
            return redirect ('perfil/cambio')->with('danger', 'La contraseña actual no coincide con la del sistema');
        }else{                                                      // Son iguales
            $user = User::find($pwd->id);
            $user->password = bcrypt($request->input('password'));
            //$user->user_update = Auth::id();
            $user->save();

            return redirect ('perfil')->with('success', 'Contraseña actualizada exitosamente');
        }        
    }


/*-- ----------------------------
-- Activar usuario por email
-- ----------------------------*/
    public function confirmar_usuario($confirmation_code) 
    {   
    
        $user = User::where('confirmation_code', $confirmation_code)->first();

        if (! $user)
        return redirect ('login')->with('danger', 'El código ya expiró o la cuenta ya fue activada');

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
    
        return redirect('/login')->with('success', 'Has confirmado correctamente tu correo!');
    }


/*-- ----------------------------
-- Recuperar - Vista
-- ----------------------------*/
    public function recuperar() 
    {   
        return view ('auth.recuperar');
    }

/*-- ----------------------------
-- Recuperar: envio de email con token 
-- ----------------------------*/
    public function recuperar_envio(Request $request)  
    {   

        $user = User::where('email', $request->input('email'))->first();

        if (! $user)
        return redirect ('login')->with('danger', 'El email ingresado no existe en nuestras bases de datos');

        $codigo =  $this->generarCodigo(6);
        $token = bcrypt($codigo);
        $user->remember_token = $token;
        $user->save();


        $data = array(
            'codigo' => $token,         
            'destinatario' => $request->input('email')
        );

        Mail::send('emails/recuperar_pwd', compact('data'), function($message)use ($data){
            $message->from('contacto@motcar.co', 'MotCar');
            $message->to($data['destinatario'])->subject('Recuperar contraseña');

        });

        return redirect('/login')->with('success', 'Se te ha enviado un email para completar el proceso');
    }


/*-- ----------------------------
-- Contraseña Nueva - Vista
-- ----------------------------*/
    public function recuperar_pwd($token) 
    {   

        $user = User::where('remember_token', $token)->first();

        if (! $user)
        return redirect ('login')->with('danger', 'No es posible continuar con el proceso, intentalo de nuevo');

        return view('auth.resetear')->with(compact('token'))->with('success', 'Ingresa una contraseña nueva para tu cuenta');

    }


/*-- ----------------------------
-- Contraseña Nueva - Vista
-- ----------------------------*/
    public function nueva_pwd(CambioPwdWebRequest $request) 
    {   

        $user = User::where('remember_token', $request->input('token'))->first();
        if (! $user)
        return redirect ('login')->with('danger', 'No es posible continuar con el proceso, intentalo de nuevo');

        $user->password = bcrypt($request->input('password'));
        $user->remember_token = null;
        $user->save();
    
        return redirect('/login')->with('success', 'Has cambiado correctamente tu contraseña');



    }


/*
|--------------------------------------------------------------------------
| Activar Usuario
|--------------------------------------------------------------------------
|
*/

public function active($id)
{

    $data = User::find($id);
    $data->status = 1;
    //$data->user_update = Auth::id();
    $data->save();

    return redirect ('usuarios')->with('success', 'Registro activado exitosamente');
}


/*
|--------------------------------------------------------------------------
| Desactivar Usuario
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = User::find($id);
        $data->status = 2;
        //$data->user_update = Auth::id();
        $data->save();

        return redirect ('usuarios')->with('success', 'Registro inactivado exitosamente');
    }

/*-- ----------------------------
-- Create
-- ----------------------------*/

    public function create() 
    {

        $roles = Role::get();

        $generos = DB::table('sexos')->where('status', 1)->orderByRaw('id ASC')->get(); 

        $tipos = DB::table('opciones')
                    ->select('id', 'nombre')
                    ->where('tipos_id', 2)
                    ->where('status', 1)
                    ->orderByRaw('nombre ASC')
                    ->get();  

        $conjuntos = DB::table('conjuntos')->select('id', 'nombre')->where('status', 1 )->orderByRaw('nombre ASC')->get();

        return view ('users.create')->with (compact('roles', 'conjuntos', 'generos', 'tipos'));

    }


/*-- ----------------------------
-- Store
-- ----------------------------*/
    public function store(Request $request) 
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->last = $request->input('last');        
        $user->tipo_identificacion = $request->input('tipo_identificacion');
        $user->n_identificacion = $request->input('n_identificacion');
        $user->genero_id = $request->input('genero_id');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        //$user->colegio_id = $request->input('colegio_id');
        $user->save();

        $user->roles()->sync($request->get('roles'));        

        return redirect ('usuarios')->with('success', 'Registro creado exitosamente');
    }


}