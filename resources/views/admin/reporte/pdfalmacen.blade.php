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
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Veces compradas</th>
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
        <h3 class="box-title text-center">Gráfico de productos</h3>
        <div >
            <canvas id="produ_V" height="150"></canvas>
        </div> 
</body>
<script src="/ampleadmin/plugins/bower_components/Chart.js/Chart.min.js"></script>
<script type="text/javascript">

		new Chart(document.getElementById("produ_V"),
	        {
	            type: 'bar',
	                data: {
	                    labels: [<?php foreach ($productosv as $reg)
	                        { 
	                    echo '"'.$reg->nombre.'",';} ?>],
	                    datasets: [{
	                        label: 'productos',
	                        data: [<?php foreach ($productosv as $reg)
	                            {echo ''.$reg->cantidad.',';} ?>],
	                        "borderColor":"rgb(83, 230, 157)",
	                        "fill":true,
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