@extends('layouts.app')

@section('title', 'Conjuntos'.' | '.config('app.name'))

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
                <a href="{{ url ('conjuntos')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('conjuntos')}}" class="kt-subheader__breadcrumbs-link">
                Conjuntos </a>
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
                    <form method="post" class="form-horizontal" action="{{ url('/conjuntos/store')}}" autocomplete="off" enctype="multipart/form-data">
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
                                            <label class="col-3 col-form-label">NIT</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nit" name="nit" value="{{ old('nit') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Dirección</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Celular</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">País</label>
                                            <div class="col-9">
                                                <select class="form-control" name="pais_id" id="pais_id">
                                                @foreach ($paises as $pais)
                                                    <option value="{{$pais->id}}"> {{ $pais->nombre }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Departamento</label>
                                            <div class="col-9">
                                                <select class="form-control" name="dpto_id" id="dpto_id">
                                                @foreach ($dptos as $dpto)
                                                    <option value="{{$dpto->id}}"> {{ $dpto->nombre }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Ciudad</label>
                                            <div class="col-9">
                                                <select class="form-control" name="ciudad_id" id="ciudad_id">
                                                @foreach ($ciudades as $ciudad)
                                                    <option value="{{$ciudad->id}}"> {{ $ciudad->nombre }}</option>
                                                @endforeach                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Localidad</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="localidad" name="localidad" value="{{ old('localidad') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Barrio</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="barrio" name="barrio" value="{{ old('barrio') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Estrato</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="estratos_id" name="estratos_id" value="{{ old('estratos_id') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Descripción</label>
                                            <div class="col-9">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <textarea class="form-control" id="descripcion" name="descripcion" rows="8"></textarea>
                                            </div>
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

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            <button type="submit" class="btn btn-primary">Crear</button>
                                            <a href="{{ url ('conjuntos')}}" class="btn btn-secondary">Cancelar</a>
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
  $('#pais_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('http://157.253.198.43/conjuntos6/public/api/departamento/' + province_id,function(data) {
      console.log(data);

      $('#dpto_id').empty();
      $('#ciudad_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#dpto_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>

<script type="text/javascript">
  $('#dpto_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('http://157.253.198.43/conjuntos6/public/api/ciudad/' + province_id,function(data) {
      console.log(data);

      $('#ciudad_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#ciudad_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>

@endsection
