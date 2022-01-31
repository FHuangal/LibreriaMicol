<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Voucher</title>
        <style>
            body{
                font-size: 6pt;
                font-family: Arial, Helvetica, sans-serif;
                color: black;
            }

            .cabecera {
                align-content: center;
                text-align: center;
            }

            .logo{
                width: 100%;
                margin: 0px;
                padding: 0px;
            }

            .img-fluid {
                width: 60%;
                height: 70px;
                margin-bottom: 10px;
            }

            .empresa {
                position: relative;
                align-content: center;
            }

            .comprobante {
                width: 100%;
            }

            .numero-documento {
                margin: 1px;
                padding-top: 20px;
                padding-bottom: 20px;
                border: 1px solid #8f8f8f;
            }

            .informacion{
                width: 100%;
                position: relative;
            }

            .tbl-informacion {
                width: 100%;
            }

            .cuerpo{
                width: 100%;
                position: relative;
                margin-bottom: 10px;
            }

            .tbl-detalles {
                width: 100%;
            }

            .tbl-detalles thead{
                border-top: 1px solid;
                background-color: rgb(241, 239, 239);
            }

            .tbl-detalles tbody{
                border-top: 1px solid;
                border-bottom: 1px solid;
            }

            .tbl-qr {
                width: 100%;
            }

            .qr {
                position: relative;
                width: 100%;
                align-content: center;
                text-align: center;
                margin-top: 10px;
            }
            /---------------------------------------------/

            .m-0{
                margin:0;
            }

            .text-uppercase {
                text-transform: uppercase;
            }

            .p-0{
                padding:0;
            }
        </style>
    </head>

    <body>
        <div class="cabecera">
            <div class="logo">
                <img src="{{ public_path() . '/ampleadmin/plugins/images/micol.jpeg' }}" class="img-fluid">
            </div>
            <div class="empresa">
                <p class="m-0 p-0 text-uppercase nombre-empresa">MICOL</p>
                <p class="m-0 p-0 text-uppercase ruc-empresa">RUC 10104927713</p>
                <p class="m-0 p-0 text-uppercase direccion-empresa"> Av. Panamericana 324</p>

                <p class="m-0 p-0 text-info-empresa">Central telefónica: 999999999</p>
                <p class="m-0 p-0 text-info-empresa">Email: micol@gmail.com</p>
            </div><br>
            <div class="comprobante">
                <div class="numero-documento">
                    <p class="m-0 p-0 text-uppercase">{{ $venta->comprobante_id== 1 ? "BOLETA ELECTRONICA" : "FACTURA ELECTRONICA" }}</p>
                    <p class="m-0 p-0 text-uppercase">{{$venta->comprobante->serie.'-'.str_pad($venta->id, 4, "0", STR_PAD_LEFT)}}</p>
                </div>
            </div>
        </div><br>
        <div class="informacion">
            <table class="tbl-informacion">
                <tr>
                    <td>F. EMISIÓN</td>
                    <td>:</td>
                    <td>{{ getFechaFormato( $venta->venta_date ,'d/m/Y')}} {{ date_format($venta->created_at, 'H:i') }}</td>
                </tr>
                <tr>
                    <td>F. VENC.</td>
                    <td>:</td>
                    <td>{{ getFechaFormato( $venta->venta_date ,'d/m/Y')}}</td>
                </tr>
                <tr>
                    <td>CLIENTE</td>
                    <td>:</td>
                    <td>{{ $cliente->nombre }}</td>
                </tr>
                <tr>
                    <td class="text-uppercase">{{ strlen($cliente->documento) == 8 ? "RUC" : "DNI"}}</td>
                    <td>:</td>
                    <td>{{ $cliente->documento }}</td>
                </tr>
                <tr>
                    <td>DIRECCIÓN</td>
                    <td>:</td>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
                <tr>
                    <td>MODO DE PAGO</td>
                    <td>:</td>
                    <td>Contado</td>
                </tr>
            </table>
        </div><br>
        <div class="cuerpo">
            <table class="tbl-detalles text-uppercase" cellpadding="2" cellspacing="0">
                <thead>
                    <tr >
                        <th style="text-align: left; width: 10%;">CANT</th>
                        <th style="text-align: left; width: 55%;">DESCRIPCION</th>
                        <th style="text-align: left; width: 10%;">P.UNIT.</th>
                        <th style="text-align: right; width: 10%;">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $item)
                        <tr>
                            <td style="text-align: left">{{ number_format($item->cantidad, 2) }}</td>
                            <td style="text-align: left">{{ $item->producto}}</td>
                            <td style="text-align: left">{{ $item->precio }}</td>
                            <td style="text-align: right">{{ number_format($item->cantidad * $item->precio, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align:right">Sub Total: S/.</th>
                        <th style="text-align:right">{{ number_format($venta->total/1.18, 2) }}</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align:right">IGV: S/.</th>
                        <th style="text-align:right">{{ number_format($venta->total - ($venta->total/1.18), 2) }}</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align:right">Total a pagar: S/.</th>
                        <th style="text-align:right">{{ number_format($venta->total, 2) }}</th>
                    </tr>
                </tfoot>
            </table>
            <br>
            <p class="p-0 m-0 text-uppercase text-cuerpo">SON: <b>{{ $legends[0]['value'] }}</b></p>
            <br>
        </div><br>
        <div class="qr">
            @if($venta->ruta_qr)
            <img src="{{ base_path() . '/storage/app/'.$venta->ruta_qr }}">
            @endif
            @if($venta->hash)
            <p class="m-0 p-0">Código Hash: {{ $venta->hash }}</p>
            @endif
        </div>
    </body>

</html>

