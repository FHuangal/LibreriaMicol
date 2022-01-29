@extends('layout.plantilla')

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Inicio</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/home">Dashboard</a></li>
                            <li class="active">Inicio</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('styles')
    
    <!-- Menu CSS -->
    <link href="/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
@endsection
@section('contenido')
                @foreach ($totales as $total)
				<div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Compras</h3>
                            <div class="text-right"> <span class="text-muted">Gastos diarios</span>
                                <h1><sup><i class="ti-arrow-down text-danger"></i></sup> ${{$total->totalcompra}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Ventas</h3>
                            <div class="text-right"> <span class="text-muted">Ganancias diarias</span>
                                <h1><sup><i class="ti-arrow-up text-success"></i></sup> ${{$total->totalventa}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title">Compras Mensuales</h3>
                            <div>
                                <canvas id="compra_M" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title">Ventas Mensuales</h3>
                            <div>
                                <canvas id="venta_M" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- .row -->
				<!-- ============================================================== -->
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Demo table -->
                <!-- ============================================================== -->
@endsection
@section('scripts')
    <script src="/ampleadmin/plugins/bower_components/Chart.js/Chart.min.js"></script>
    <script>
        $(function() {
    
    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("compra_M"),
        {
            type: 'line',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        { 
                    
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
            
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],
                        "borderColor":"rgb(83, 230, 157)",
                        "fill":false,
                        "lineTension":0.1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
    
    /*<!-- ============================================================== -->*/
    /*<!-- Bar Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("venta_M"),
        {
            type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
                    
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        "borderColor":"rgb(83, 230, 157)",
                        "fill":false,
                        "lineTension":0.1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
    
});
    </script>
@endsection