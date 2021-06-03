@extends('layouts.app')

@section('title', 'Comercios'.' | '.config('app.name'))

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
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Comercios </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        @foreach ($comercios as $comercio)
        <div class="col-md-4">
            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--noborder">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">

                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--user-profile-2">
                        <div class="kt-widget__head">
                            <div class="kt-widget__media">
                                <img class="kt-widget__img kt-hidden-" src="{{ $comercio->imagen}}" alt="image">
                                <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
                                    
                                </div>
                            </div>

                            <div class="kt-widget__info">
                                <a href="#" class="kt-widget__username">
                                    {{ $comercio->nombre}}                                              
                                </a>

                                <!-- <span class="kt-widget__desc">
                                    Head of Development
                                </span> -->
                            </div>
                        </div>

                        <div class="kt-widget__body">
                            <div class="kt-widget__section">
                                {{ $comercio->descripcion}}
                            </div>                                        

                            <div class="kt-widget__item">
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Teléfono:</span>
                                    <a href="tel:{{ $comercio->telefono1}}" class="kt-widget__data">{{ $comercio->telefono1}}</a>
                                </div>
                                @if ($comercio->telefono2)
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Teléfono:</span>
                                    <a href="tel:{{ $comercio->telefono2}}" class="kt-widget__data">{{ $comercio->telefono2}}</a>
                                </div>
                                @endif
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Ubicación:</span>
                                    <span class="kt-widget__data">{{ $comercio->ubicacion}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="kt-widget__footer">
                            <a href="tel:{{ $comercio->telefono1}}" class="btn btn-brand btn-lg active ">Llamar</a>
                        </div>
                    </div>         
                    <!--end::Widget -->
                </div>
            </div>
            <!--End::Portlet--> 
        </div>
        @endforeach
    </div>
</div>
<!-- end:: Content -->
@endsection

    
@section('scripts')

@endsection
