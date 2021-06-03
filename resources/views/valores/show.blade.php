@extends('layouts.app')

@section('title', 'Valores'.' | '.config('app.name'))

@section('style')
<link href="{{asset('assets/css/pages/pricing/pricing-1.css')}}" rel="stylesheet" type="text/css" />
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

    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="la la-leaf"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Valores
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-pricing-1">
                <div class="kt-pricing-1__items row">
                    @foreach ($data as $datos)
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">

                            @if ($datos->item_id == 1) <!-- Inmueble-->
                            <span class="kt-pricing-1__icon kt-font-success"><i class="fa flaticon-home"></i></span>
                            @elseif($datos->item_id == 2)  <!-- Parqueadero-->
                            <span class="kt-pricing-1__icon kt-font-info"><i class="fa flaticon-rocket"></i></span>
                            @else <!-- Elemento-->
                            <span class="kt-pricing-1__icon kt-font-danger"><i class="fa flaticon-confetti"></i></span>
                            @endif
                        </div>
                        <span class="kt-pricing-1__price">$ {{number_format($datos->valor,'0', ',','.')}}</span>
                        <h2 class="kt-pricing-1__subtitle">{{ $datos->nom_requerimiento}}</h2>
                        <span class="kt-pricing-1__description">
                            <span>{{ $datos->item}}</span>
                            <span>{{ $datos->descripcion}}</span>
                            <span>{{ $datos->nomconjunto}}</span>
                        </span>
                        <!--<div class="kt-pricing-1__btn">
                            <button type="button" class="btn btn-brand btn-custom btn-pill btn-wide btn-uppercase btn-bolder btn-sm">Purchase</button>
                        </div>-->
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>

    <!--end::Portlet-->
</div>

<!-- end:: Content -->

@endsection
    
@section('scripts')

@endsection
