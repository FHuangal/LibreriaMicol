@extends('layout.plantilla')

@section('styles')
    <link href="/ampleadmin/plugins/bower_components/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mantendor compra</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/home">Dashboard</a></li>
                            <li class="active">Compra</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
        
				<div class="row">
                    <div class="col-sm-12">     
                        <div class="white-box">
                            <div class="row text-right">
                                <a href="{{route('compras.create')}}" class="btn btn-success waves-effect waves-light" ><i class="ti-plus"></i> Nuevo</a>
                            </div>                                          
                            <div class="table-responsive">              
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre Proveedor</th>
                                            <th>Nombre Usuario</th>
                                            <th>Fecha de compra</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th style="width:50px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $compra)
                                        <tr>
                                            <td>{{$compra->proveedor->nombre}}</td>
                                            <td>{{$compra->user->name}}</td>
                                            <td>{{$compra->compra_date}}</td>
                                            <td>{{$compra->tax}}</td>
                                            <td>{{$compra->total}}</td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#show{{ $compra->id }}" class="btn btn-dark mtmobile btn-dark"><i class="fas fa-eye"></i></button>

                                                <div id="show{{ $compra->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Datos la compra #{{$compra->id}}</h4> </div>
                                                                <div class="modal-body">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <table id="myTable" class="table table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="text-center">Id Detalle</th>
                                                                                            <th class="text-center">Producto</th>
                                                                                            <th class="text-center">Cantidad</th>
                                                                                            <th class="text-center">Precio</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($compra->DetalleCompra as $detalle)
                                                                                        <tr>
                                                                                            <td class="text-center">{{$detalle->id}}</td>
                                                                                                <td class="text-center">{{$detalle->producto->nombre}}</td>
                                                                                            <td class="text-center">{{$detalle->cantidad}}</td>
                                                                                            <td class="text-center">{{$detalle->precio}}</td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <td colspan="3"><h5 class="text-center font-weight-bold">Total</h5></td>
                                                                                            <td><h5 class="text-center">S/.{{ $compra->total }}</h5></td>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                </div>
                                                                    
                                                            </div>
                                                        </div>
                                                </div>
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

    @if(session('Comprag')=='ok')
        swal("Compra registrada con éxito","", "success")
    @endif

    </script>
@endsection
               
@endsection