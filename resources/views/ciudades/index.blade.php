@extends('layouts.app')

@section('title', 'Ciudades'.' | '.config('app.name'))

@section('style')
<link href="{{ asset('assets/css/pages/tables/style.css')}}" rel="stylesheet" type="text/css" />
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
                Ciudades </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                   Ciudades
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ url ('ciudades/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Crear
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="table-responsive">
            <!--begin: Datatable -->
             <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                <th>Id</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Nombre</th>
                <th>Siglas</th>
                <th>Estado</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $ciudades)
                <tr class="gradeX">
                    <td>{{$ciudades->id}}</td>
                    <td>{{$ciudades->nompais}}</td>
                    <td>{{$ciudades->nomdpto}}</td>
                    <td>{{$ciudades->nombre}}</td>
                    <td>{{$ciudades->siglas}}</td>
                    <td>                             
                    @if ($ciudades->status==1)
                        <form method="post" action="{{ url('ciudades/'.$ciudades->id.'/inactive')}}">
                            {{ csrf_field() }}
                            <button type="submit" rel="tooltip" title="Cambiar" class="btn btn-warning btn-elevate btn-pill btn-elevate-air btn-sm"> Inactivar <i class="fa fa-repeat"></i></button>
                        </form>

                    @else
                        <form method="post" action="{{ url('ciudades/'.$ciudades->id.'/active')}}">
                            {{ csrf_field() }}
                            <button type="submit" rel="tooltip" title="Cambiar" class="btn btn-success btn-elevate btn-pill btn-elevate-air btn-sm"> Activar <i class="fa fa-repeat"></i></button>
                        </form>
                    @endif                        
                    </td>
                    <td>
                        <a href="{{ url('ciudades/'.$ciudades->id.'/edit')}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                          <i class="la la-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach 
                </tbody>
                <tfoot>
                <tr>
                <th>Id</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Nombre</th>
                <th>Siglas</th>
                <th>Estado</th>
                <th></th>
                </tr>
                </tfoot>
                </table>
            </div>
            <!--end: Datatable -->
        </div>
    </div>
</div>

<!-- end:: Content -->
                        


@endsection

   
@section('scripts')

<script src="{{ asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>

<!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
    $('.dataTables-example').DataTable({
        "order": [[ 2, "asc" ]], //or asc 
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            //{ extend: 'copy'},
            //{extend: 'csv'},
            //{extend: 'excel', title: 'ExampleFile'},
            //{extend: 'pdf', title: 'ExampleFile'},

            /*{extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }*/
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
