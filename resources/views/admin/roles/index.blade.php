@extends('layouts.app')

@section('title', 'Listado de Roles')

@section('content')

<style type="text/css">
    /* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
</style>

<!--  Inicio del Content-->

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Gestión de Roles</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url ('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{ url ('roles')}}">Roles</a>
                </li>
                <li class="active">
                    <strong>Inicio</strong>
                </li>
                <li>
                    @can('roles.create')
                    <a href="{{ url ('roles/create')}}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Crear</strong></a>
                    @endcan
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos generales</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                    @can('roles.show')
                        <td> 
                            <a href="{{ url('/roles/'.$roles->id)}}" type="button" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs"> Ver</a>
                    
                        </td>
                    @endcan

                    @can('roles.edit')
                        <td> 
                            <form method="post" action="{{ url('/roles/'.$roles->id.'/edit')}}">
                                {{ csrf_field() }}
                                <a href="{{ url('/roles/'.$roles->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-warning btn-simple btn-xs"> Editar</a>
                            </form>                          
                        </td>
                    @endcan

                    @can('roles.destroy')
                        <td> 
                            <form method="post" action="{{ url('/roles/'.$roles->id)}}">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs"> Eliminar</button>
                            </form>                          
                        </td>
                    @endcan
                </tr>

                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>      
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
                </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


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

@endsection