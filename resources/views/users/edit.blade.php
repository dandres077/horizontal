@extends('layouts.app')

@section('title', 'Usuarios'.' | '.config('app.name'))

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
                <a href="{{ url ('usuarios')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('usuarios')}}" class="kt-subheader__breadcrumbs-link">
                 Usuarios </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                Actualizar </a>
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
                        <h3 class="kt-portlet__head-title">Ingrese la información</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form method="post" class="form-horizontal" action="{{ url('usuarios/'.$user->id.'/edit')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">                                                                     

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Apellido</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="last" name="last" value="{{ old('last', $user->last) }}" required="">
                                            </div>
                                        </div>                                        

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo documento</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_identificacion" id="tipo_identificacion">
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{$tipo->id}}" @if($user->tipo_identificacion==$tipo->id) selected @endif> {{ $tipo->nombre, $user->tipo_identificacion }}</option>
                                                @endforeach                                               
                                                </select>
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">N° documento</label>
                                            <div class="col-9">
                                            <input type="number" class="form-control" id="n_identificacion" name="n_identificacion" value="{{ old('n_identificacion', $user->n_identificacion) }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Genero</label>
                                            <div class="col-9">
                                                <select class="form-control" name="genero_id" id="genero_id">
                                                @foreach ($generos as $genero)
                                                    <option value="{{$genero->id}}" @if($user->genero_id==$genero->id) selected @endif> {{ $genero->nombre, $user->genero_id }}</option>
                                                @endforeach                                               
                                                </select>
                                            </div>
                                        </div>    

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required="">
                                            </div>
                                        </div>                                 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Rol</label>
                                            <div class="col-9">
                                            @foreach ($roles as $rol)
                                                @foreach ($rol_user as $user)   
                                                    @if($rol->id == $user->role_id)
                                                        <label> <input type="checkbox" value="{{$rol->id}}" name="roles[]" id="roles[]" checked="checked"> {{ $rol->name }} </label><br>
                                                    @break   
                                                    @endif
                                                @endforeach

                                                    @if($rol->id == $user->role_id)
                                                        
                                                    @else
                                                        <label> <input type="checkbox" value="{{$rol->id}}" name="roles[]" id="roles[]"> {{ $rol->name }} </label><br>
                                                    @endif
                                            @endforeach                                             
                                            </div>
                                        </div>                                        

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                        <div class="kt-form__actions">
                                            @can('usuarios.update')
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            @endcan
                                            <a href="{{ url ('usuarios')}}" class="btn btn-secondary">Cancelar</a>
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

<script type="text/javascript">
  $('#pais_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('https://techno-web.app/api/departamento/' + province_id,function(data) {
      console.log(data);

      $('#departamento_id').empty();
      $('#ciudad_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#departamento_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>

<script type="text/javascript">
  $('#departamento_id').on('change', function(e){
    console.log(e);
    var province_id = e.target.value;

    $.get('https://techno-web.app/api/ciudad/' + province_id,function(data) {
      console.log(data);

      $('#ciudad_id').empty();

      $.each(data, function(index, regenciesObj){
        $('#ciudad_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
      })
    });
  });

</script>


@endsection
