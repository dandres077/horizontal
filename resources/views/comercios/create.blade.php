@extends('layouts.app')

@section('title', 'Comercios'.' | '.config('app.name'))

@section('style')
<link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
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
                <a href="{{ url ('comercios')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('comercios')}}" class="kt-subheader__breadcrumbs-link">
                Comercios </a>
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
                    <form method="post" class="form-horizontal" action="{{ url('/comercios/store')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Descripción</label>
                                            <div class="col-9">
                                              <textarea class="summernote" rows="5" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 1</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ old('telefono1') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 2</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ old('telefono2') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Ubicación</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Horario</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="horario" name="horario" value="{{ old('horario') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tags</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group form-show-validation row" id="data_1">
                                            <label class="col-3 col-form-label">Fecha inicio</label>
                                            <div class="col-9">
                                            <div class="input-group date">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" readonly="readonly">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-show-validation row" id="data_1">
                                            <label class="col-3 col-form-label">Fecha fin</label>
                                            <div class="col-9">
                                            <div class="input-group date">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" readonly="readonly">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Imágen</label>
                                            <div class="col-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="imagen" id="imagen">
                                                    <label class="custom-file-label selected" for="customFile"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>


                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Conjuntos</label>
                                            <div class="col-9">
                                            @foreach ($conjuntos as $conjunto)
                                                <label> <input type="checkbox" value="{{$conjunto->id}}" name="conjuntos[]" id="conjuntos[]"> {{ $conjunto->nombre }} </label><br>
                                            @endforeach 
                                            </div>
                                        </div>                

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                            <a href="{{ url ('comercios')}}" class="btn btn-secondary">Cancelar</a>
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

<!-- SUMMERNOTE -->
<script src="{{asset('js/plugins/summernote/summernote.min.js')}}"></script>

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

<script>
$(document).ready(function(){

    $('.summernote').summernote();

});
</script>

@endsection
