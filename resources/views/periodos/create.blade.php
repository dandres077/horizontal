@extends('layouts.app')

@section('title', 'Periodos'.' | '.config('app.name'))

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
                <a href="{{ url ('periodos')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('periodos')}}" class="kt-subheader__breadcrumbs-link">
                Periodos </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                Crear</a>
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
                    <form method="post" class="form-horizontal" action="{{ url('/periodos/store')}}" autocomplete="off" onsubmit="return validar(this)">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body"> 

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Conjunto</label>
                                        <div class="col-9">
                                            <select class="form-control" name="conjunto_id" id="conjunto_id">
                                                @foreach ($conjuntos as $conjunto)
                                                <option value="{{ $conjunto->id }}"> {{ $conjunto->nombre }}</option>
                                                @endforeach                                                   
                                            </select>
                                        </div>
                                    </div>                                          

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Nombre</label>
                                        <div class="col-9">
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required="">
                                        </div>
                                    </div>                                         

                                    <div class="form-group form-show-validation row" id="data_1">
                                        <label class="col-3 col-form-label">Fecha de inicio</label>
                                        <div class="col-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" id="f_inicio" name="f_inicio" value="{{ old('f_inicio') }}" readonly="readonly">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-show-validation row" id="data_1">
                                        <label class="col-3 col-form-label">Fecha de finalización</label>
                                        <div class="col-9">
                                        <div class="input-group date">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" id="f_fin" name="f_fin" value="{{ old('f_fin') }}" readonly="readonly">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                    <div class="kt-form__actions">
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                        <a href="{{ url ('periodos')}}" class="btn btn-secondary">Cancelar</a>
                                    </div>

                                </div>
                            </div> 
                            </div>                               
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
