@extends('layouts.app')

@section('title', 'Vínculos conjuntos'.' | '.config('app.name'))

@section('style')

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
                <a href="{{ url ('vinculos')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('vinculos')}}" class="kt-subheader__breadcrumbs-link">
                Vínculos conjuntos </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Editar </a>

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
                    <form method="post" class="form-horizontal" action="{{ url('/vinculos/'.$data->id.'/edit')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $data->nombre) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 1</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ old('telefono1', $data->telefono1) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 2</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ old('telefono2', $data->telefono2) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Dirección</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $data->direccion) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Orden</label>
                                            <div class="col-9">
                                            <input type="number" class="form-control" id="orden" name="orden" value="{{ old('orden', $data->orden) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Cargar archivo</label>
                                            <div class="col-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="imagen" id="imagen">
                                                    <label class="custom-file-label selected" for="customFile"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Observación</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="observacion" name="observacion" value="{{ old('observacion', $data->observacion) }}">
                                            </div>
                                        </div>

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                        <div class="form-group"><label class="col-sm-2 control-label">Conjuntos</label>
                                            <div class="col-sm-10">
                                @if($validador == 1) <!-- Si tiene registro en la tabla de pibote se visualiza esta sección-->
                                    @foreach ($conjuntos as $conjunto)
                                        @foreach ($vinculos_conjuntos as $vinculos)   
                                            @if($conjunto->id == $vinculos->conjunto_id)
                                                <label> <input type="checkbox" value="{{$conjunto->id}}" name="conjuntos[]" id="conjuntos[]" checked="checked"> {{ $conjunto->nombre }} </label><br>
                                            @break   
                                            @endif
                                        @endforeach

                                            @if($conjunto->id == $vinculos->conjunto_id)
                                                
                                            @else
                                                <label> <input type="checkbox" value="{{$conjunto->id}}" name="conjuntos[]" id="conjuntos[]"> {{ $conjunto->nombre }} </label><br>
                                            @endif
                                    @endforeach 
                                @else <!-- Si NO tiene registro en la tabla de pibote se visualiza esta sección-->
                                    @foreach ($conjuntos as $conjunto)
                                        <label> <input type="checkbox" value="{{$conjunto->id}}" name="conjuntos[]" id="conjuntos[]"> {{ $conjunto->nombre }} </label><br>
                                    @endforeach 
                                @endif
                                            </div>
                                        </div>

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="{{ url ('vinculos')}}" class="btn btn-secondary">Cancelar</a>
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

@endsection
