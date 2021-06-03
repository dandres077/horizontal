@extends('layouts.app')

@section('title', 'Creación de Usuarios')

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
                    <strong>Crear</strong>
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
                            <h5>Diligencie los campos</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{ url('user')}}" autocomplete="off">
                                {{ csrf_field()}}

                                <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="last" name="last" value="{{ old('last') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Oficina</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="office" name="office" value="{{ old('office') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Cédula</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="document" name="document" value="{{ old('document') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Perfil</label>
                                    <div class="col-sm-10">
                                        <select name="perfil" id="perfil" class="form-control">
                                           @foreach ($perfil as $perfil)
                                                <option value="{{ $perfil->id }}"> {{ $perfil->name }}</option>
                                            @endforeach 

                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Administrador <br/>
                                    <small class="text-navy">Seleccione si el usuario sera </small></label>
                                    <div class="col-sm-10">
                                        <div><label> <input type="checkbox" id=" name="> Si</label></div>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Contraseña<br/>
                                    <small class="text-navy">Ingrese la contraseña para el usuario.</small></label>
                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onclick="myFunction()">Ver</button> </span> <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                </div>-->

                                <div class="hr-line-dashed"></div> 

                                <div class="form-group"><label class="col-sm-2 control-label">Rol</label>
                                    <div class="col-sm-10">
                                        @foreach ($roles as $rol)
                                                <label> <input type="checkbox" value="{{$rol->id}}" name="roles[]" id="roles[]"> {{ $rol->name.' | '.$rol->description }} </label><br>
                                        @endforeach 
                                    </div>
                                </div>



                                <!--<div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                           @foreach ($status as $status)
                                                <option value="{{ $status->id }}"> {{ $status->name }}</option>
                                            @endforeach 

                                        </select>
                                    </div>
                                </div>-->



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="{{ url ('user')}}" class="btn btn-white" type="submit">Cancelar</a>
                                        <button class="btn btn-primary" type="submit">Guardar</button>
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
<script src="{{asset('js/jquery-3.1.1.min.jsjs')}}"></script>
<script src="{{asset('js/bootstrap.min.jsjs')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.jsjs')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.jsjs')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.jsjs')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.jsjs')}}"></script>

<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.jsjs')}}"></script>
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
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

