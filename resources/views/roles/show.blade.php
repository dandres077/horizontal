@extends('layouts.app')

@section('title', 'Roles'.' | '.config('app.name'))

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
                <a href="{{ url ('roles')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('roles')}}" class="kt-subheader__breadcrumbs-link">
                    Roles </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Ver </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Nombre</label>
                                        <div class="col-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $roles->name) }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Lista de permisos</label>
                                        <div class="col-9">
                                        
                                        @foreach ($permisos as $permiso)
                                            @foreach ($rol_permisos as $rolp)   
                                                @if($permiso->id == $rolp->permission_id)
                                                    <label> <input type="checkbox" value="{{$permiso->id}}" name="permisos[]" id="permisos[]" checked="checked" disabled> {{ $permiso->name }} </label><br>
                                                @break   
                                                @endif
                                            @endforeach

                                        @endforeach 
                                        </div>
                                    </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                    <div class="kt-form__actions">
                                        <a href="{{ url ('roles')}}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xl-3"></div>
                    </div>
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
