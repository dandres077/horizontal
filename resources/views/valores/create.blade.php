@extends('layouts.app')

@section('title', 'Valores'.' | '.config('app.name'))

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
                <a href="{{ url ('valores')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('valores')}}" class="kt-subheader__breadcrumbs-link">
                Valores </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Editar </a>
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
                    <form method="post" class="form-horizontal" action="{{ url('/valores/store')}}" autocomplete="off">
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
                                            <label class="col-3 col-form-label">Periodo</label>
                                            <div class="col-9">
                                                <select class="form-control" name="periodo_id" id="periodo_id">
                                                    @foreach ($periodos as $periodo)
                                                    <option value="{{ $periodo->id }}"> {{ $periodo->nombre }}</option>
                                                    @endforeach                                                   
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Item</label>
                                            <div class="col-9">
                                                <select class="form-control" name="item_id" id="item_id">
                                                    <option value="1">Inmueble</option>     
                                                    <option value="2">Parqueadero</option>     
                                                    <option value="3">Elementos</option>                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Opción</label>
                                            <div class="col-9">
                                                <select class="form-control" name="opcion_id" id="opcion_id">
                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Valor</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Descripción</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required="">
                                            </div>
                                        </div>

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                            <a href="{{ url ('valores')}}" class="btn btn-secondary">Cancelar</a>
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

<script type="text/javascript">
  $('#item_id').on('change', function(e){
    //console.log(e);
    var province_id = e.target.value;
    var conjunto_id = $("#conjunto_id").val();

    $.get('http://localhost/horizontal/public/api/conjunto/'+ conjunto_id +'/opcion/' + province_id,function(data) {
      console.log(data);

      $('#opcion_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#opcion_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>

@endsection
