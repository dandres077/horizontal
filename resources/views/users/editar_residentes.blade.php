@extends('layouts.app')

@section('title', 'Residentes'.' | '.config('app.name'))

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
                Residentes </a>
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
                    <form method="post" class="form-horizontal" action="{{ url('/residentes/'.$inmueble.'/edit/'.$usuario)}}" autocomplete="off" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" value="{{ $data->nomtorre }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Inmueble</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" value="{{ $data->nombre }}" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $data1->name) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Apellido</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="last" name="last" value="{{ old('last', $data1->last) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo identificación</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_identificacion" id="tipo_identificacion">
                                                @foreach ($tipo_identificacion as $ti)
                                                    <option value="{{$ti->id}}" @if($data1->tipo_identificacion==$ti->id) selected @endif> {{ $ti->nombre, $data1->tipo_identificacion }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">N° identificación</label>
                                            <div class="col-9">
                                            <input type="number" class="form-control" id="n_identificacion" name="n_identificacion" value="{{ old('n_identificacion', $data1->n_identificacion) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Genero</label>
                                            <div class="col-9">
                                                <select class="form-control" name="genero_id" id="genero_id">
                                                @foreach ($generos as $genero)
                                                    <option value="{{$genero->id}}" @if($data1->genero_id==$genero->id) selected @endif> {{ $genero->nombre, $data1->genero_id }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $data1->email) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo residente</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_residente" id="tipo_residente">
                                                @foreach ($tipo_residente as $tr)
                                                    <option value="{{$tr->id}}" @if($data->tipo_residente==$tr->id) selected @endif> {{ $tr->nombre, $data->tipo_residente }}</option>
                                                @endforeach 
                                                </select>
                                            </div>
                                        </div>

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

@endsection
