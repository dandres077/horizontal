@extends('layouts.app')

@section('title', 'Editar de Usuarios')

@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Gestión de Usuarios</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url ('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{ url ('user')}}">Usuarios</a>
                </li>
                <li class="active">
                    <strong>Editar</strong>
                </li>
                <li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edite los campos <small> que considere necesarios</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{ url('user/'.$user->id.'/edit')}}">
                                {{ csrf_field()}}

                                <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="last" name="last" value="{{ old('last', $user->last) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Oficina</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="office" name="office" value="{{ old('office', $user->office) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Cédula</label>
                                    <div class="col-sm-10"><input type="number" class="form-control" id="document" name="document" value="{{ old('document', $user->document) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10"><input type="username" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Perfil</label>
                                    <div class="col-sm-10">
                                        <select name="perfil" id="perfil" class="form-control">
                                           @foreach ($perfil as $perfil)
                                                <option value="{{ $perfil->id }}" @if($user->perfil==$perfil->id) selected @endif> {{ $perfil->name, $user->perfil }}</option>
                                            @endforeach 

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                           @foreach ($status as $status)
                                                <option value="{{ $status->id }}" @if($user->status==$status->id) selected @endif> {{ $status->name, $user->status }}</option>
                                            @endforeach 

                                        </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Rol</label>
                                    <div class="col-sm-10">
                                        @foreach ($roles as $rol)
                                            @foreach ($rol_user as $user)   
                                                @if($rol->id == $user->role_id)
                                                    <label> <input type="checkbox" value="{{$rol->id}}" name="roles[]" id="roles[]" checked="checked"> {{ $rol->name.' | '.$rol->description }} </label><br>
                                                @break   
                                                @endif
                                            @endforeach

                                                @if($rol->id == $user->role_id)
                                                    
                                                @else
                                                    <label> <input type="checkbox" value="{{$rol->id}}" name="roles[]" id="roles[]"> {{ $rol->name.' | '.$rol->description }} </label><br>
                                                @endif
                                        @endforeach 
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="{{ url ('user')}}" class="btn btn-white" type="submit">Cancelar</a>
                                        <button class="btn btn-primary" type="submit">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
@endsection
    
<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script>
function myFunction() {
    var x = document.getElementById("password_ch");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
