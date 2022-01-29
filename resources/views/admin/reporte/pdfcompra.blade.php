<!DOCTYPE html>
<html>
<head>
	<title>Reporte compra</title>
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
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($compras as $compra)
                <tr> 
                    <td class="text-center">{{$compra->id}}</td>
                    <td class="text-center">{{\Carbon\Carbon::parse($compra->compra_date)->format('d M y h:i a')}}</td>
                    <td class="text-center">S/. {{$compra->total}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            	<td class="text-center" colspan="2">
            		<span><b>TOTAL:</b></span>
            	</td>
            	<td class="text-center">
            		S/. {{ number_format($compras->sum('total'),2) }}
            	</td>
            </tfoot>
        </table>
        <h3 class="box-title text-center">Gráfico de compras</h3>
        <div >
            <canvas id="compra_M" height="150"></canvas>
        </div> 
</body>
<script src="/ampleadmin/plugins/bower_components/Chart.js/Chart.min.js"></script>
<script type="text/javascript">

		new Chart(document.getElementById("compra_M"),
	        {
	            type: 'line',
	                data: {
	                    labels: [<?php foreach ($compras as $reg)
	                        { 
	                    echo '"'.\Carbon\Carbon::parse($reg->compra_date)->format('d-m-Y').'",';} ?>],
	                    datasets: [{
	                        label: 'compras',
	                        data: [<?php foreach ($compras as $reg)
	                            {echo ''.number_format($reg->total,2).',';} ?>],
	                        "borderColor":"rgb(83, 230, 157)",
	                        "fill":false,
	                        "lineTension":0.1
	                    }]
	                },
	                options: {
	                    scales: {
	                        yAxes: [{
	                            ticks: {
	                                beginAtZero:false
	                            }
	                        }]
	                    }
	                }
	            });

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