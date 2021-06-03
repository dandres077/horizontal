@extends('layouts.app')

@section('title', 'Creación de Roles')

@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Gestión de Roles</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url ('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{ url ('admin/user')}}">Roles</a>
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
                            <form method="post" class="form-horizontal" action="{{ url('/roles/store')}}" autocomplete="off">
                                {{ csrf_field()}}

                                <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Url Amigable</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Descripción</label>
                                    <div class="col-sm-10"><textarea class="form-control" rows="5" id="description" name="description"></textarea></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Permiso especial</label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" value="all_access" id="special" name="special"> Acceso total </label></div>
                                        <div><label> <input type="radio" value="no-access" id="special" name="special"> Ningún acceso </label></div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Lista de permisos</label>
                                    <div class="col-sm-10">
                                        @foreach ($permisos as $permiso)
                                                <label> <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" id="permisos[]"> {{ $permiso->name }} </label><br>
                                        @endforeach 
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="{{ url ('roles')}}" class="btn btn-white" type="submit">Cancelar</a>
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
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>


