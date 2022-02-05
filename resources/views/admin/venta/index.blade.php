@extends('layout.plantilla')

@section('styles')
    <link href="/ampleadmin/plugins/bower_components/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mantenedor venta</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/home">Dashboard</a></li>
                            <li class="active">Venta</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')

				<div class="row">
                    <div class="col-sm-12">     
                        <div class="white-box">
                            <div class="row text-right">
                                <a href="{{route('ventas.create')}}" class="btn btn-success waves-effect waves-light m-t-10" ><i class="ti-plus"></i> Nuevo</a>
                            </div>                                          
                            <div class="table-responsive">              
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Nombre Usuario</th>
                                            <th>Fecha de venta</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th style="width:60px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventas as $venta)
                                        <tr>
                                           
                                            <td>{{$venta->cliente->nombre}}</td>
                                            <td>{{$venta->user->name}}</td>
                                            <td>{{$venta->venta_date}}</td>
                                            <td>{{$venta->tax}}</td>
                                            <td>{{$venta->total}}</td>
                                            <td class="text-center">
                                                <a href="{{route('venta.voucher', $venta->id)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="Imprimir"><i class="ti-printer"></i></a>
                                                @if($venta->sunat == '0')
                                                <a class="btn btn-primary" href="#" onclick="enviarSunat({{$venta->id}})">
                                                    <i class="fa fa-share"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@section('scripts')

    <script src="/ampleadmin/plugins/bower_components/datatables/datatables.min.js"></script>
    <script src="/ampleadmin/plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="/ampleadmin/plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
        });
    });

    @if(!empty($sunat_exito))
        Swal.fire({
            icon: 'success',
            title: '{{$id_sunat}}',
            text: '{{$descripcion_sunat}}',
            showConfirmButton: false,
            timer: 2500
        })
    @endif

    @if(!empty($sunat_error))
        Swal.fire({
            icon: 'error',
            title: '{{$id_sunat}}',
            text: '{{$descripcion_sunat}}',
            showConfirmButton: false,
            timer: 5500
        })
    @endif

    $('#sampleTable').DataTable( {
        responsive: true
    } );

    function enviarSunat(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
            },
            buttonsStyling: false
        })

        Swal.fire({
            title: "Opción Enviar a Sunat",
            text: "¿Seguro que desea enviar documento de venta a Sunat?",
            showCancelButton: true,
            icon: 'info',
            confirmButtonColor: "#1ab394",
            confirmButtonText: 'Si, Confirmar',
            cancelButtonText: "No, Cancelar",
            // showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {

                var url = '{{ route("venta.sunat", ":id")}}';
                url = url.replace(':id',id);

                window.location.href = url

                Swal.fire({
                    title: '¡Cargando!',
                    type: 'info',
                    text: 'Enviando documento de venta a Sunat',
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'La Solicitud se ha cancelado.',
                    'error'
                )
            }
        })

    }

 </script>
@endsection
               
@endsection