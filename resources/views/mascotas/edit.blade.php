@extends('layouts.app')

@section('title', 'Mascotas'.' | '.config('app.name'))

@section('style')
    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Dashboard </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url ('residentes')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('residentes')}}" class="kt-subheader__breadcrumbs-link">
                Mascotas </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Crear </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Ingresa la información <small>** obligatorio</small></h3>
                    </div>
                </div>
                <div class="kt-portlet__body">


                   <form method="post" class="form-horizontal" action="{{ url('/mascotas/'.$data->mascota_id.'/edit')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Conjunto</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" value="{{ $data->nomconjunto }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Torre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $data->nomtorre }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Inmueble</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $data->nomapto }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Residentes</label>
                                            <div class="col-9">
                                                <select class="form-control" name="usuario_id" id="usuario_id">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{$usuario->usuario_id}}" @if($data->usuario_id==$usuario->usuario_id) selected @endif> {{ $usuario->nomusuario, $data->usuario_id }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_id" id="tipo_id">
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{$tipo->id}}" @if($data->tipo_id==$tipo->id) selected @endif> {{ $tipo->nombre, $data->tipo_id }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>                           

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Raza</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="raza" name="raza" value="{{ old('raza', $data->raza) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $data->nombre) }}" required="">
                                            </div>
                                        </div>

                                        @php
                                            $nacimiento = $data->nacimiento;
                                            $nacimiento = date("m/d/Y", strtotime($nacimiento));

                                        @endphp

                                        <div class="form-group form-show-validation row" id="data_1">
                                            <label class="col-3 col-form-label">Nacimiento</label>
                                            <div class="col-9">
                                            <input type="date" class="form-control" name="nacimiento" value="{{ old('nacimiento', $data->nacimiento) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Observación</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="observacion" name="observacion" value="{{ old('observacion', $data->observacion) }}">
                                            </div>
                                        </div>

                                        <input type="hidden" name="inmueble" value="{{ $inmueble }}">

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-xl-3"></div>
                        </div>
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>

<!-- end:: Content -->

@endsection
    
@section('scripts')

<!-- Data picker -->
<script src="{{asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>

<!-- Date range picker -->
<script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script>
    $(document).ready(function(){

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });       

</script>
@endsection
