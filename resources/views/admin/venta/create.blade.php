@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro de venta</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/ventas">Venta</a></li>
                            <li class="active">Nueva venta</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Registro de venta </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="{{route('ventas.store')}}" method="POST" class="form-horizontal">
                                    	@csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Cliente</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="cliente_id" name="cliente_id">
                                                            <option value="" disabled selected>Selecccione un cliente</option>
                                                            @foreach ($clientes as $cliente)
                                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                                            @endforeach           
                                                        </select>
                                                        
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary text-right"  data-toggle="modal" data-target="#ncli">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">B/F</label>
                                                        <div class="col-md-8">
                                                        <select class="form-control" id="comprobante_id" name="comprobante_id">
                                                            <option value="" disabled selected>Tipo</option>
                                                            @foreach ($comprobante as $c)
                                                            <option value="{{$c->id}}">{{$c->tipo}}</option>
                                                            @endforeach           
                                                        </select>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-3">
                                                    <label class="control-label col-md-3">IGV</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                                <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"><span class="input-group-text">$</span>
                                                            </span>
                                                            <input id="tax" type="number" value="18" name="tax" class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Producto</label>
                                                        <div class="col-md-9">
                                                        <select class="form-control" id="producto_id" name="producto_id">
                                                            <option value="" disabled selected>Selecccione un producto</option>
                                                            @foreach ($productos as $producto)
                                                            <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio_venta}}">{{$producto->nombre}}</option>
                                                            @endforeach           
                                                        </select></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Stock disponible</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" id="stock" name="stock" disabled> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Precio venta</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" id="precio_venta" name="precio_venta" disabled> </div>
                                                    </div>
                                                </div>
                                                
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Cantidad</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" id="cantidad" name="cantidad"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <!--/span-->
                                                
                                                <!--/span-->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Descuento</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" id="descuento" name="descuento" value="0"> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 text-right">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" id="agregar">Agregar Producto</button>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="panel-heading">Detalles de venta</div>
                                                <div class="table-responsive col-md-12">
                                                    <table id="detalles" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Eliminar</th>
                                                                <th>Producto</th>
                                                                <th>Precio Venta (S/.)</th>
                                                                <th>Descuento</th>
                                                                <th>Cantidad</th>
                                                                <th>SubTotal (S/.)</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="5">
                                                                    <p align="right">TOTAL:</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span id="total">S/. 0.00</span> </p>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="5">
                                                                    <p align="right">TOTAL IMPUESTO (18%):</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span id="total_impuesto">S/. 0.00</span></p>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="5">
                                                                    <p align="right">TOTAL PAGAR:</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span align="right" id="total_pagar_html">S/. 0.00</span> <input type="hidden"
                                                                            name="total" id="total_pagar"></p>
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                        


                                            <!--/row-->
		                                    <div class="form-actions">
                                                <button type="submit" class="btn btn-success">Registrar</button>
                                                <a href="{{route('ventas.index')}}" type="button" class="btn btn-default">Cancelar</a>
		                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ncli" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Nuevo Cliente</h4> </div>
                                    <div class="modal-body">
                                        <form action="{{ route('clientes.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Documento</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="documento" id="documento" class="form-control">
                                                                        <button type="button" class="btn btn-dark" onclick="return buscar();">
                                                                            <i class="fas fa-search" style="color: white;"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-dark" onclick="return buscar2();">
                                                                            <i class="fas fa-search" style="color: white;"></i>
                                                                        </button>
                                                                    
                                                                </div>
                                                        </div>
                                                    </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input type="text" name="nombre" id="nombre" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="number" name="telefono" id="telefono" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark" onclick="return limpiar();"><i class="fas fa-eraser"></i></button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
@endsection

@section('scripts')

<script>
    
$(document).ready(function () {
    $("#agregar").click(function () {
        agregar();
    });
});
var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();
$("#producto_id").change(mostrarValores);

function mostrarValores() {
    datosProducto = document.getElementById('producto_id').value.split('_');
    $("#precio_venta").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}
var producto_id1 = $('#producto_id');
    
    producto_id1.change(function(){
        $.ajax({
            url: "http://www.lanube.cu.ma/admin/get_products_by_id",
            method: 'GET',
            data:{
                producto_id1: producto_id1.val(),
            },
            success: function(data){
                $("#precio_venta").val(data.precio_venta);
                $("#stock").val(data.stock);
        }
    });
});
$(obtener_registro());
function obtener_registro(code){
    $.ajax({
        url: "http://www.lanube.cu.ma/admin/get_products_by_barcode",
        type: 'GET',
        data:{
            code: code
        },
        dataType: 'json',
        success:function(data){
            console.log(data);
            $("#precio_venta").val(data.precio_venta);
            $("#stock").val(data.stock);
            $("#producto_id").val(data.id);
        }
    });
}
$(document).on('keyup', '#code', function(){
    var valorResultado = $(this).val();
    if(valorResultado!=""){
        obtener_registro(valorResultado);
    }else{
        obtener_registro();
    }
})
function agregar() {
    datosProducto = document.getElementById('producto_id').value.split('_');
    producto_id = datosProducto[0];
    producto = $("#producto_id option:selected").text();
    cantidad = $("#cantidad").val();
    descuento = $("#descuento").val();
    precio_venta = $("#precio_venta").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();
    if (producto_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio_venta != "") {
        if (parseInt(stock) >= parseInt(cantidad)) {
            subtotal[cont] = (cantidad * precio_venta) - (cantidad * precio_venta * descuento / 100);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td> <td> <input type="hidden" name="precio_venta[]" value="' + parseFloat(precio_venta).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio_venta).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' + parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input type="number" value="' + cantidad + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'La cantidad a vender supera el stock.',
            })
        }
    } else {
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la venta.',
        })
    }
}
function limpiar() {
    $("#cantidad").val("");
    $("#descuento").val("0");
    $("#documento").val("");
    $("#nombre").val("");
    $("#telefono").val("0");

}
function totales() {
    $("#total").html("S/. " + total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("S/. " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("S/. " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}
function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}
function eliminar(index) {
    total = total - subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("S/." + total);
    $("#total_impuesto").html("S/." + total_impuesto);
    $("#total_pagar_html").html("S/." + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}


function buscar(){
            var dni=$('#documento').val();
            if (dni!='') {
                $.ajax({
                    url:"{{ route('buscarDni') }}",
                    method:'GET',
                    data:{dni:dni},
                    dataType:'json',
                    success:function(data){
                        if(data[0]==="nada")
                        {
                            $('#documento').val('');
                            $('#nombre').val('');
                        }
                        else{
                            $('#nombre').val(data[1] + " " + data[2] + " " + data[3]);
                        }
                    }
                });
            }else{
                alert('Escriba el DNI!');
                $('#documento').focus();
            }

            return false;
            
        }

function buscar2(){
            var dni=$('#documento').val();
            if (dni!='') {
                $.ajax({
                    url:"{{ route('buscarRuc') }}",
                    method:'GET',
                    data:{dni:dni},
                    dataType:'json',
                    success:function(data){
                        if(data[0]==="nada")
                        {
                            $('#documento').val('');
                            $('#nombre').val('');
                        }
                        else{
                            $('#nombre').val(data[1]);
                        }
                    }
                });
            }else{
                alert('Escriba el RUC!');
                $('#documento').focus();
            }

            return false;
            
        }

    @if(session('Ventag')=='error')
        swal("Venta no registrada","", "error")
    @endif
    @if(session('Ventag')=='ruc')
        swal("Venta no registrada","No se puede crear una boleta para un cliente con RUC", "error")
    @endif
    @if(session('Ventag')=='dni')
        swal("Venta no registrada","No se puede crear una factura para un cliente con DNI", "error")
    @endif
</script>

@endsection