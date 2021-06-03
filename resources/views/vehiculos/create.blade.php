@extends('layouts.app')

@section('title', 'Vehículos'.' | '.config('app.name'))

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
                <a href="{{ url ('residentes')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('residentes')}}" class="kt-subheader__breadcrumbs-link">
                Vehículos </a>
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


                   <form method="post" class="form-horizontal" action="{{ url('/vehiculos/'.$conjunto.'/store/'.$inmueble) }}" autocomplete="off" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $data->nombre }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Residentes</label>
                                            <div class="col-9">
                                                <select class="form-control" name="usuario_id" id="usuario_id">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{$usuario->usuario_id}}"> {{ $usuario->nomusuario }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_id" id="tipo_id">
                                                <option>Seleccione</option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{$tipo->id}}"> {{ $tipo->nombre }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>                                        

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Espacio</label>
                                            <div class="col-9">
                                                <select class="form-control" name="parqueadero_id" id="parqueadero_id">                                                   
                                              
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Modelo</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Marca</label>
                                            <div class="col-9">
                                                <select class="form-control" name="marca_id" id="marca_id">
                                              
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Color</label>
                                            <div class="col-9">
                                                <select class="form-control" name="color_id" id="color_id">
                                                @foreach ($colores as $color)
                                                    <option value="{{$color->id}}"> {{ $color->nombre }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Observación</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="observacion" name="observacion" value="{{ old('observacion') }}" required="">
                                            </div>
                                        </div>


                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                            <a href="{{ url ('bienes')}}" class="btn btn-secondary">Cancelar</a>
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
  $('#tipo_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('http://localhost/horizontal/public/api/conjunto/{!!$conjunto!!}/parqueaderos/' + province_id,function(data) {
      console.log(data);

      $('#parqueadero_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#parqueadero_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>


<script type="text/javascript">
  $('#tipo_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('http://localhost/horizontal/public/api/marcas/'+ province_id,function(data) {
      console.log(data);

      $('#marca_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#marca_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.marca +'</option>');
      })
    });
  });

</script>





@endsection
