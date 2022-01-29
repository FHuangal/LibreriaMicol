@extends('layout.plantilla')
@section('styles')
	<link href="/ampleadmin/plugins/bower_components/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="/ampleadmin/plugins/bower_components/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endsection

@section('titulo')
	<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Reporte Compras</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/compras">Compra</a></li>
                            <li class="active">Reporte Compras</li>
                        </ol>
                    </div>
    </div>
@endsection

@section('contenido')
    			<div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-7">     
                        <div class="white-box">                                          
                            <div class="table-responsive">              
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                    		<th>Fecha</th>
                                    		<th>Total</th>
                                            <th style="width:50px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $compra)
                                        <tr>
                                        
                                            <td>{{$compra->id}}</td>
                                            <td>{{\Carbon\Carbon::parse($compra->compra_date)->format('d M y h:i a')}}</td>
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

                    <div class="col-md-3 col-lg-3 col-sm-5">
                    	<div class="white-box">
	                    		<div class="text-center">
		                            <span>Total de ingresos: <b> </b></span>
		                            <div class="form-group">
		                                <strong>S/. {{ number_format($compras->sum('total'),2) }}</strong>
		                            </div>
		                        </div>
		                    <form action="{{route('compras.resultados')}}" method="POST">
		                    	@csrf
		    					<div class="form-group">
		                            <span>Fecha inicial</span>
		                            <div class="input-group">
		                                <input class="form-control" type="date" name="fecha_ini" id="fecha_ini" min="2022-01-01">   
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <span>Fecha final</span>
		                            <div class="input-group">
		                                <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" min="2022-01-01">
		                            </div>
		                        </div>
		                        <div class="text-center">
		                            <div class="form-group">
		                               <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
		                            </div>
		                        </div>
	                        </form>
                            <form action="{{route('compras.pdf')}}" method="POST">
                                @csrf
                                <div class="text-center">
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-sm">Generar PDF</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="hidden" name="fi" id="fi" min="2022-01-01" value="{{$fi}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="hidden" name="ff" id="ff" min="2022-01-01" value="{{$ff}}">
                                    </div>
                                </div> 
                            </form>
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

   	<script src="/ampleadmin/plugins/bower_components/moment/moment.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="/ampleadmin/plugins/bower_components/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="/ampleadmin/plugins/bower_components/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="/ampleadmin/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

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

    	window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }
	</script>
@endsection
@endsection