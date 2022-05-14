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
                    Crear </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Section-->
    <div class="row">
        @foreach ($data as $vinculos)
        <div class="col-lg-3 col-xl-3 order-lg-1 order-xl-1">

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
                                <img class="kt-widget__img kt-hidden-" src="{{env('APP_URL').$vinculos->imagen}}" alt="image">
                                <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
                                    ChS
                                </div>
                            </div>
                            <div class="kt-widget__info">
                                <a href="#" class="kt-widget__titel kt-hidden-">
                                    {{ $vinculos->nombre}}
                                </a>
                                <a href="#" class="kt-widget__username kt-hidden">
                                    {{ $vinculos->nombre}}
                                </a>
                                <span class="kt-widget__desc">
                                    {{ $vinculos->telefono1}}
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget__footer">
                            <a href="tel:{{ $vinculos->telefono1}}"><button type="button" class="btn btn-brand btn-lg active ">Llamar</button></a>
                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>

            <!--End::Portlet-->
        </div>
        @endforeach
    </div>

    <h2>Números locales</h2>

    <div class="row">
        @foreach ($data2 as $vinculos)
        <div class="col-lg-3 col-xl-3 order-lg-1 order-xl-1">

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
                                <img class="kt-widget__img kt-hidden-" src="{{ asset('img/icons/icon-72x72.png') }}" alt="image">
                                <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
                                    ChS
                                </div>
                            </div>
                            <div class="kt-widget__info">
                                <a href="#" class="kt-widget__titel kt-hidden-">
                                    {{ $vinculos->nombre}}
                                </a>
                                <a href="#" class="kt-widget__username kt-hidden">
                                    {{ $vinculos->nombre}}
                                </a>
                                <span class="kt-widget__desc">
                                    {{ $vinculos->telefono1}}
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <div class="kt-widget__item">
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Teléfono 1:</span>
                                    <a href="#" class="kt-widget__data">{{ $vinculos->telefono1}}</a>
                                </div>
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Tléfono 2:</span>
                                    <a href="#" class="kt-widget__data">{{ $vinculos->telefono2}}</a>
                                </div>
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Dirección:</span>
                                    <span class="kt-widget__data">{{ $vinculos->direccion}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__footer">
                            <a href="tel:{{ $vinculos->telefono1}}"><button type="button" class="btn btn-brand btn-lg active ">Llamar</button></a>
                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>

            <!--End::Portlet-->
        </div>
        @endforeach
    </div>

    <!--End::Section-->

</div>

<!-- end:: Content -->

@endsection
    
@section('scripts')

@endsection
