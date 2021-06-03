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
                <a href="{{ url ('bienes')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('bienes')}}" class="kt-subheader__breadcrumbs-link">
                Residentes </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Crear </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <!--<div class="kt-subheader__toolbar">
            <a href="#" class="">
            </a>
            <a href="{{ url('residentes/'.$bien.'/create')}}" class="btn btn-label-brand btn-bold">Usuario +  </a>
            <a href="{{ url('residentes/'.$bien.'/create')}}" class="btn btn-label-brand btn-bold">Vehículo +  </a>
        </div> -->

        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                            </g>
                        </svg>

                        <!--<i class="flaticon2-plus"></i>-->
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Crear:
                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Datos del bien"></i>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="{{ url('residentes/'.$bien.'/create')}}" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                    <span class="kt-nav__link-text">Residentes</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="{{ url('vehiculos/'.$bien.'/create')}}" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                    <span class="kt-nav__link-text">Vehículos</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="{{ url('mascotas/'.$bien.'/create')}}" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                    <span class="kt-nav__link-text">Mascotas</span>
                                </a>
                            </li>
                            <!--<li class="kt-nav__separator"></li>
                            <li class="kt-nav__foot">
                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                            </li> -->
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
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

@if (session('success'))
    <div class="alert alert-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-like"></i></div>
        <div class="alert-text">{{ session('success') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif

@foreach ($data as $usuarios)
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <div class="kt-widget kt-widget--user-profile-3">
                <div class="kt-widget__top">
                    <div class="kt-widget__media kt-hidden-">
                        <img src="{{$usuarios->imagen}}" alt="image">
                    </div>
                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                        JM
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__head">
                            <a href="#" class="kt-widget__username">
                                {{$usuarios->name}} {{$usuarios->last}}
                                <i class="flaticon2-correct kt-font-success"></i>
                            </a>
                            <div class="kt-widget__action">
                                <a href="{{ url('residentes/'.$bien.'/edit/'.$usuarios->id)}}" class="btn btn-label-success btn-sm btn-upper">Editar</a>&nbsp;
                                @if ($usuarios->ub_status==1)
                                <form method="post" action="{{ url('residentes/'.$bien.'/inactive/'.$usuarios->id)}}" class="formulario-inactivar-residente">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-info btn-sm btn-upper"> Inactivar <i class="fa fa-repeat"></i></button>
                                </form>
                                @else
                                <form method="post" action="{{ url('residentes/'.$bien.'/active/'.$usuarios->id)}}">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-success btn-sm btn-upper"> Activar <i class="fa fa-repeat"></i></button>
                                </form>
                                @endif 
                            </div>
                        </div>
                        <div class="kt-widget__subhead">
                            <a href="#"><i class="flaticon2-new-email"></i>{{$usuarios->n_identificacion}}</a>
                            <a href="#"><i class="flaticon2-calendar-3"></i>{{$usuarios->nomsexo}} </a>
                            <a href="#"><i class="flaticon2-placeholder"></i>{{$usuarios->email}}</a>
                        </div>
                        <div class="kt-widget__info">
                            <div class="kt-widget__desc">
                                I distinguish three main text objektive could be merely to inform people.
                                <br> A second could be persuade people.You want people to bay objective
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endforeach


@foreach ($data2 as $vehiculo)
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <div class="kt-widget kt-widget--user-profile-3">
                <div class="kt-widget__top">
                    <div class="kt-widget__media kt-hidden-">
                        <img src="{{ asset ('img/logos/'.$vehiculo->imagen)}}" alt="image">
                    </div>
                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                        JM
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__head">
                            <a href="#" class="kt-widget__username">
                                {{$vehiculo->name}} {{$vehiculo->last}}
                                <i class="flaticon2-correct kt-font-success"></i>
                            </a>
                            <div class="kt-widget__action">
                                <a href="{{ url('vehiculos/'.$bien.'/edit/'.$vehiculo->id)}}" class="btn btn-label-success btn-sm btn-upper">Editar</a>&nbsp;
                                @if ($vehiculo->bp_status==1)
                                <form method="post" action="{{ url('vehiculos/'.$bien.'/inactive/'.$vehiculo->id)}}" class="formulario-inactivar-vehiculo">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-info btn-sm btn-upper"> Inactivar <i class="fa fa-repeat"></i></button>
                                </form>
                                @else
                                <form method="post" action="{{ url('vehiculos/'.$bien.'/active/'.$vehiculo->id)}}">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-success btn-sm btn-upper"> Activar <i class="fa fa-repeat"></i></button>
                                </form>
                                @endif 
                            </div>
                        </div>
                        <div class="kt-widget__subhead">
                            <a href="#"><i class="flaticon2-new-email"></i>{{$vehiculo->nomopcion}}</a>
                            <a href="#"><i class="flaticon2-placeholder"></i>{{$vehiculo->modelo}}</a>
                            <a href="#"><i class="flaticon2-calendar-3"></i>{{$vehiculo->nommarca}} </a>
                            <a href="#"><i class="flaticon2-placeholder"></i>{{$vehiculo->nomcolor}}</a>

                        </div>
                        <div class="kt-widget__info">
                            <div class="kt-widget__desc">
                                {{$vehiculo->v_observacion}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endforeach

@foreach ($data3 as $mascota)
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <div class="kt-widget kt-widget--user-profile-3">
                <div class="kt-widget__top">
                    <div class="kt-widget__media kt-hidden-">
                        <img src="{{ asset ('img/otros/mascotas.png')}}" alt="image">
                    </div>
                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                        JM
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__head">
                            <a href="#" class="kt-widget__username">
                                {{$mascota->name}} {{$mascota->last}}
                                <i class="flaticon2-correct kt-font-success"></i>
                            </a>
                            <div class="kt-widget__action">
                                <a href="{{ url('mascotas/'.$bien.'/edit/'.$mascota->id)}}" class="btn btn-label-success btn-sm btn-upper">Editar</a>&nbsp;
                                @if ($mascota->m_status==1)
                                <form method="post" action="{{ url('mascotas/'.$bien.'/inactive/'.$mascota->id)}}" class="formulario-inactivar-mascota">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-info btn-sm btn-upper"> Inactivar <i class="fa fa-repeat"></i></button>
                                </form>
                                @else
                                <form method="post" action="{{ url('mascotas/'.$bien.'/active/'.$mascota->id)}}">
                                    {{ csrf_field() }}
                                    <button type="submit" type="button" rel="tooltip" title="Cambiar" class="btn btn-label-success btn-sm btn-upper"> Activar <i class="fa fa-repeat"></i></button>
                                </form>
                                @endif 
                            </div>
                        </div>
                        <div class="kt-widget__subhead">
                            <a href="#"><i class="flaticon2-new-email"></i>{{$mascota->nomopcion}}</a>
                            <a href="#"><i class="flaticon2-placeholder"></i>{{$mascota->raza}}</a>
                            <a href="#"><i class="flaticon2-calendar-3"></i>{{$mascota->nombre}} </a>
                            <a href="#"><i class="flaticon2-placeholder"></i>{{$mascota->nacimiento}}</a>

                        </div>
                        <div class="kt-widget__info">
                            <div class="kt-widget__desc">
                                {{$mascota->m_observacion}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endforeach
</div>

<!-- end:: Content -->

@endsection
    
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('eliminar')=='ok')
    <script>
        Swal.fire(
        '¡Inactivado!',
        'Registro inactivado exitosamente.',
        'success'
        )
    </script>

    @endif

    <script>

        $('.formulario-inactivar-residente').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Esta seguro?',
            text: "¡No podra revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy seguro',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                this.submit();
                }          
            })
        });
        

        $('.formulario-inactivar-vehiculo').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Esta seguro?',
            text: "¡No podra revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy seguro',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                this.submit();
                }          
            })
        });

        $('.formulario-inactivar-mascota').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Esta seguro?',
            text: "¡No podra revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy seguro',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                this.submit();
                }          
            })
        });

    </script>

@endsection
