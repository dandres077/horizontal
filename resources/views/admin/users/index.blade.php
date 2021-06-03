@extends('layouts.app')

@section('title', 'Listado de Usuarios')

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
            <h2>Gestión de Usuarios</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url ('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{ url ('admin/user')}}">Usuarios</a>
                </li>
                <li class="active">
                    <strong>Inicio</strong>
                </li>
                <li>
                    <a href="{{ url ('user/create')}}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Crear</strong></a>
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
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Oficina</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>F. Creación</th>
                    <th>F. Actualización</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $users)

                <tr class="gradeX">
                    <td>{{$users->id}}</td>
                    <td>
                        @if ($users->admin == '1')
                            <p class="text-success">Administrador</p>
                        @elseif ($users->admin == '0')
                            <p class="text-danger">Sistema</p>
                        @endif
                    </td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->last}}</td>
                    <td>{{$users->office}}</td>
                    <td>{{$users->document}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->username}}</td>
                    <td>{{$users->perfil}}</td>
                    <td>{{$users->status}}</td>
                    <td>{{$users->created_at}}</td>
                    <td>{{$users->updated_at}}</td>
                    <td> 
                        <form method="post" action="{{ url('user/'.$users->id.'/delete')}}">
                            {{ csrf_field() }}
                            <a href="{{ url('user/'.$users->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs"> <i class="fa fa-edit"></i></a>
                            <!--<button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-info btn-simple btn-xs"> <i class="fa fa-trash"></i></button>-->
                        </form>                          
                    </td>
                </tr>

                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Oficina</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>F. Creación</th>
                    <th>F. Actualización</th>
                    <th>Opciones</th>
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