@extends('layouts.app')

@section('title', config('app.name'))

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
<div class="kt-container  kt-container--fluid ">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Dashboard</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <a href="#" class="btn btn-label-success btn-bold btn-sm btn-icon-h kt-margin-l-10">
            Bienvenido
        </a>
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
            <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                <span><i class="flaticon2-search-1"></i></span>
            </span>
        </div>
    </div>
</div>
</div>

<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<!--Begin::Dashboard 1-->

<!--Begin::Row-->
<div class="row">
    <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Indicadores
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-widget17">
                    <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #1a3cfc">
                        <div class="kt-widget17__chart" style="height:135px;">
                            <canvas id=""></canvas>
                        </div>
                    </div>
                    <div class="kt-widget17__stats">
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Administ.
                                </span>
                                <span class="kt-widget17__desc">
                                    $ 95.000
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    P. Carros
                                </span>
                                <span class="kt-widget17__desc">
                                    Total : {{ $conjunto->n_parqueaderov}} <br> Disponible : {{ $disponible_v}}
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg></span>
                                <span class="kt-widget17__subtitle">
                                    P. Motos
                                </span>
                                <span class="kt-widget17__desc">
                                    Total : {{ $conjunto->n_parqueaderom}} <br> Disponible : {{ $disponible_m}}
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    P. Bicicletas
                                </span>
                                <span class="kt-widget17__desc">
                                    Total : {{ $conjunto->m_parqueaderob}} <br> Disponible : {{ $disponible_b}}
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                    </g>
                                </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Dolar
                                </span>
                                <span class="kt-widget17__desc">
                                    $ 7.500
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Gasolina
                                </span>
                                <span class="kt-widget17__desc">
                                    $ 7.500
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Activity-->
    </div>
    <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Blog-->
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
            <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="min-height: 300px; background-image: url(assets/media//products/product4.jpg)">
                    <h3 class="kt-widget19__title kt-font-light">
                        {{ $conjunto->nombre}}
                    </h3>
                    <div class="kt-widget19__shadow"></div>
                    <div class="kt-widget19__labels">
                        <a href="#" class="btn btn-label-light-o2 btn-bold ">{{ $conjunto->barrio}}</a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget19__wrapper">
                    <!--<div class="kt-widget19__content">
                        <div class="kt-widget19__userpic">
                            <img src="assets/media/users/user1.jpg" alt="">
                        </div>
                        <div class="kt-widget19__info">
                            <a href="#" class="kt-widget19__username">
                                Administrador
                            </a>
                        </div>
                    </div>-->
                    <div class="kt-widget19__text">
                        {{ $conjunto->descripcion}}
                    </div>
                </div>
                <!--<div class="kt-widget19__action">
                    <a href="#" class="btn btn-sm btn-label-brand btn-bold">Leer más</a>
                </div>-->

                <div class="kt-widget__content">
                    <div class="kt-widget__info">
                        <span class="kt-widget__label">Email:</span>
                        <a href="" class="kt-widget__data"><strong>{{ $conjunto->email}}</strong></a>
                    </div>
                    <div class="kt-widget__info">
                        <span class="kt-widget__label">Teléfono:</span>
                        <a href="tel:{{ $conjunto->telefono}}" class="kt-widget__data"><strong>{{ $conjunto->telefono}}</strong></a>
                    </div>
                    <div class="kt-widget__info">
                        <span class="kt-widget__label">Dirección:</span>
                        <span class="kt-widget__data"><strong>{{ $conjunto->direccion}}</strong></span>
                    </div>
                </div>

            </div>
        </div>

        <!--end:: Widgets/Blog-->
    </div>
    <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Notifications-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Tus notificaciones
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" aria-expanded="true">
                        <div class="kt-notification">
                            @foreach ($comunicados as $comunicado)
                            <a href="{{ url ('comunicados/'.$comunicado->id.'/show')}}" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
                                            <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg> </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        {{ $comunicado->titulo}}
                                    </div>
                                    <div class="kt-notification__item-time">
                                        {{ $comunicado->created_at}}
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Notifications-->
    </div>

</div>

<!--End::Row-->

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Puedes reservar
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            @foreach($reservas as $elementos)
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="{{ env('APP_URL').$elementos->imagen}}" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            {{ $elementos->nom_requerimiento}}
                                        </a>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">$ {{number_format($elementos->valor,'0', ',','.')}}</span>
                                        <span class="kt-widget5__sales">{{ $elementos->descripcion}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Best Sellers-->
    </div>
    <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

        <!--begin:: Widgets/New Users-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Contáctos
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
                                General
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
                                Local
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget4_tab1_content">
                        <div class="kt-widget4">
                            @foreach ($v_general as $general)
                            <div class="kt-widget4__item">
                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                    <img src="{{env('APP_URL').$general->imagen}}" alt="">
                                </div>
                                <div class="kt-widget4__info">
                                    <a href="#" class="kt-widget4__username">
                                        {{$general->nombre}}
                                    </a>
                                    <p class="kt-widget4__text">
                                        {{$general->telefono1}}
                                    </p>
                                </div>
                                <a href="tel:{{$general->telefono1}}" class="btn btn-sm btn-label-info btn-bold">Llamar</a>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="tab-pane" id="kt_widget4_tab2_content">
                        <div class="kt-widget4">
                            @foreach ($v_local as $local)
                            <div class="kt-widget4__item">
                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                    <img src="{{env('APP_URL').$local->imagen}}" alt="">
                                </div>
                                <div class="kt-widget4__info">
                                    <a href="#" class="kt-widget4__username">
                                        {{$local->nombre}}
                                    </a>
                                    <p class="kt-widget4__text">
                                        {{$local->observacion}}
                                    </p>
                                </div>
                                <a href="tel:{{$local->telefono1}}" class="btn btn-sm btn-label-info btn-bold">Llamar</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/New Users-->
    </div>
</div>

<!--End::Row-->

<!--End::Dashboard 1-->
</div>

<!-- end:: Content -->
@endsection