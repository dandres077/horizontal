@extends('layouts.app')

@section('title', 'Roles'.' | '.config('app.name'))

@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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
                Roles </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
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
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet kt-portlet--mobile">
<div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
        <span class="kt-portlet__head-icon">
            <i class="kt-font-brand flaticon2-line-chart"></i>
        </span>
        <h3 class="kt-portlet__head-title">
            Roles del sistema
        </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
            <div class="kt-portlet__head-actions">                
                &nbsp;
                <a href="{{ url ('roles/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Crear
                </a>
            </div>
        </div>
    </div>
</div>
<div class="kt-portlet__body">

    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>                   
            <th></th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles as $roles)
        <tr class="gradeX">
            <td>{{$roles->id}}</td>
            <td>{{$roles->name}}</td>
            <td><a href="{{ url('/roles/'.$roles->id)}}" type="button" rel="tooltip" title="Ver" class="btn btn-info btn-elevate btn-pill btn-elevate-air btn-sm"> Ver</a></td>
             <td> 
                <form method="post" action="{{ url('/roles/'.$roles->id.'/edit')}}">
                    {{ csrf_field() }}
                    <a href="{{ url('/roles/'.$roles->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-elevate btn-pill btn-elevate-air btn-sm"> Editar</a>
                </form>                          
            </td>
             <td> 
                <form method="post" action="{{ url('/roles/'.$roles->id)}}" class="formulario-eliminar_rol">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-elevate btn-pill btn-elevate-air btn-sm">Eliminar</button>
                </form>                          
            </td>
        </tr>
        @endforeach     
        </tbody>
    </table>

    <!--end: Datatable -->
</div>
</div>
</div>
<!-- end:: Content -->

@endsection
    
@section('scripts')
  <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                "order": [[ 4, "asc" ]], //or asc 
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ],
                "language":{
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate":{
                        "next": "Siguiente",
                        "previous": "Anterior",
                    },
                    "lengthMenu": 'Mostrar <select>'+
                                '<option value="10">10</option>'+
                                '<option value="30">30</option>'+
                                '<option value="-1">Todos</option>'+
                                '</select> registros | ',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }

            });

        });

    </script>

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

    $('.formulario-eliminar_rol').submit(function(e){
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
