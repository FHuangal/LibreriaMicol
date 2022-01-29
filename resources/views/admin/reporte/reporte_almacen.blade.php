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
                        <h4 class="page-title">Reporte almacén</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/productos">Almacén</a></li>
                            <li class="active">Reporte almacén</li>
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
                                            <th>Producto</th>
                                    		<th>Vendidos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productosv as $productos)
                                        <tr>
                                        
                                            <td>{{$productos->id}}</td>
                                            <td>{{$productos->nombre}}</td>
                                            <td>{{$productos->cantidad}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-5">
                        <div class="white-box">
                            <form action="{{route('almacen.pdf')}}" method="">
                                @csrf
                                <div class="text-center">
                                        <div class="form-group">
                                           <button type="submit" class="btn btn-sm">Generar PDF</button>
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
	            // Order by the grouping
	          
	        });
	    });
	</script>
@endsection
@endsection