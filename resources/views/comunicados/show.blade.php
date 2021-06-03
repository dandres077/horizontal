@extends('layouts.app')

@section('title', 'Comunicados'.' | '.config('app.name'))

@section('style')
<link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
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
                <a href="{{ url ('comunicados')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('comunicados')}}" class="kt-subheader__breadcrumbs-link">
                Comunicados </a>
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
        <div class="kt-portlet">
    <div class="kt-portlet__body">
        <div class="kt-infobox">
            <div class="kt-infobox__header">
                <h2 class="kt-infobox__title">{{ $data->titulo }}</h2>
            </div>
            <div class="kt-infobox__body">
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle"><strong>Escrito por</strong>: {!! $data->creo !!} / {!! $data->created_at !!}</h3>
                    <div class="kt-infobox__content">
                        {!! $data->texto !!}
                    </div>
                </div>                

                @if($data->imagen1 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle">Adjunto: </h3>
                    <div class="kt-infobox__content">
                        <img src="{{$data->imagen1}}" width="100%" height="100%">
                    </div>
                </div>
                @endif

                @if($data->imagen2 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle">Adjunto: </h3>
                    <div class="kt-infobox__content">
                        <img src="{{$data->imagen2}}" width="100%" height="100%">
                    </div>
                </div>
                @endif

                @if($data->imagen3 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle">Adjunto: </h3>
                    <div class="kt-infobox__content">
                        <img src="{{$data->imagen3}}" width="100%" height="100%">
                    </div>
                </div>
                @endif 

                @if($data->documento1 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle"><a href="{{$data->documento1}}">Ver documento adjunto</a> </h3>
                </div> 
                @endif

                @if($data->documento2 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle"><a href="{{$data->documento2}}">Ver documento adjunto</a> </h3>
                </div> 
                @endif

                @if($data->documento3 != NULL)
                <div class="kt-infobox__section">
                    <h3 class="kt-infobox__subtitle"><a href="{{$data->documento3}}">Ver documento adjunto</a> </h3>
                </div> 
                @endif

            </div>
        </div>
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

<!-- SUMMERNOTE -->
<script src="{{asset('js/plugins/summernote/summernote.min.js')}}"></script>

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

<script>
$(document).ready(function(){

    $('.summernote').summernote();

});
</script>

@endsection
