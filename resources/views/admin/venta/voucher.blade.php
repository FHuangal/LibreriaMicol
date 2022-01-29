<!DOCTYPE html>
<html>
<head>
<title>Librería MICOL</title>
<link href="/ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="/ampleadmin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/ampleadmin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/ampleadmin/css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body onload="imprimir()"  onafterprint="cancelar()" style="padding: 5px;">
@if ($cliente->documento > 111111111)
<table class="table table-bordered">
    <thead>
        <tr>
            <td rowspan="3" class="text-center" style="vertical-align: middle;">
                <img src="{{ asset('/ampleadmin/plugins/images/micol.jpeg') }}" width="100px"/>
            </td>
            <th rowspan="3" class="text-center" >
                <h2 style="color: rgb(196, 30, 30);"><b>LIBRERIA MICOL</b></h2><br>
                <span>Av. Panamericana 324 Pacanguilla</span><br>
                <span>Pacanga - Chepén - La Libertad</span>
            </th>
            <td class="text-center"><b>RUC: 10104927713</b></td>
        </tr>
        <tr>
            <td class="text-center" style="color: rgb(196, 30, 30);" width="30%"><h4><b>FACTURA DE VENTA</b></h4></td>
        </tr>  
        <tr>
            <td class="text-center">B001-{{str_pad($venta->id, 4, "0", STR_PAD_LEFT)}}</td>
        </tr>       
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
                <span>ㅤVendedor(a):ㅤ{{ $user->name }}</span><br>

                <span>ㅤNombre:ㅤㅤㅤ{{ $cliente->nombre }}</span><br>
                <span>ㅤRUC:ㅤㅤㅤㅤㅤ{{ $cliente->documento }}</span><br>
            </td>

            <td class="text-center" style="vertical-align: middle;">
                <span>Fecha:</span><br>
                <span>{{$venta->created_at}}</span>
            </td>   
        </tr>

        <tr>
            <td colspan="3">
                <table width="100%" height="100%">
                    <tbody>
                    <th class="text-center">CANT</th>
                    <th class="text-center">DESCRIPCIÓN</th>
                    <th class="text-center">P.UNIT.</th>
                    <th class="text-center">IMPORTE</th>
                
                    @foreach($details as $detail)
                        <tr>
                            <td class="text-center">{{ $detail->cantidad }}</td>
                            <td class="text-center">{{ $detail->producto }}</td>
                            <td class="text-center">{{ $detail->precio }}</td>
                            <td class="text-center">{{ number_format(($detail->precio * $detail->cantidad), 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="3" class="table-center text-right" style="vertical-align:middle;"><h6>TOTAL S/.</h6></td>
                        <td>
                            <h5 class="text-center" style="vertical-align:middle;">{{$venta->total}}</h5>
                        </td>
                    </tfoot>
                </table>
            </td>
        </tr>
    </tbody>
</table> 

@else

<table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="3" class="text-center" >
                    <h2 style="color: rgb(103, 103, 209);"><b>LIBRERIA MICOL</b></h2><br>
                    <span>Av. Panamericana 324 Pacanguilla</span><br>
                    <span>Pacanga - Chepén - La Libertad</span>
                </th>
                <td class="text-center"><b>RUC: 10104927713</b></td>
            </tr>
            <tr>
                <td class="text-center" style="color: rgb(103, 103, 209);" width="30%"><h4><b>BOLETA DE VENTA</b></h4></td>
            </tr>  
            <tr>
                <td class="text-center">B001-{{str_pad($venta->id, 4, "0", STR_PAD_LEFT)}}</td>
            </tr>       
        </thead>
        <tbody>
            <tr>
                <td>
                    <span>ㅤSeñor(a):ㅤㅤ{{ $cliente->nombre }}</span><br>
                    <span>ㅤDNI:ㅤㅤㅤㅤ{{ $cliente->documento }}</span><br>
                </td>

                <td class="text-center" style="vertical-align: middle;">
                    <span>Fecha:</span><br>
                    <span>{{$venta->created_at}}</span>
                </td>   
            </tr>

            <tr>
                <td colspan="2">
                    <table width="100%" height="100%">
                        <tbody>
                        <th class="text-center">CANT</th>
                        <th class="text-center">DESCRIPCIÓN</th>
                        <th class="text-center">P.UNIT.</th>
                        <th class="text-center">IMPORTE</th>
                    
                        @foreach($details as $detail)
                            <tr>
                                <td class="text-center">{{ $detail->cantidad }}</td>
                                <td class="text-center">{{ $detail->producto }}</td>
                                <td class="text-center">{{ $detail->precio }}</td>
                                <td class="text-center">{{ number_format(($detail->precio * $detail->cantidad), 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="3" class="table-center text-right" style="vertical-align:middle;"><h6>TOTAL S/.</h6></td>
                            <td>
                                <h5 class="text-center" style="vertical-align:middle;">{{$venta->total}}</h5>
                            </td>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

@endif
</body>

<script type="text/javascript">
     function imprimir() {
            if (window.print) {
                window.print();
            } else {
                alert("La función de impresion no esta soportada por su navegador.");
            }
        }

        function cancelar(){
        	window.history.back();
        }   
</script>
</html>
