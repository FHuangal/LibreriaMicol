@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro de Compra</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/compras">Compra</a></li>
                            <li class="active">Nueva Compra</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Registro de Compra </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="{{route('compras.store')}}" method="POST" class="form-horizontal">
                                    	@csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Proveedor</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="proveedor_id" name="proveedor_id">
                                                            <option value="" disabled selected>Selecccione un proveedor</option>
                                                            @foreach ($proveedors as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                            @endforeach           
                                                        </select>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary text-right"  data-toggle="modal" data-target="#nprov">+</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Producto</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="producto_id" name="producto_id">
                                                            <option value="" disabled selected>Selecccione un producto</option>
                                                            @foreach ($products as $producto)
                                                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                            @endforeach           
                                                        </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn btn-primary text-right"  data-toggle="modal" data-target="#nprod">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Cantidad</label>
                                                        <div class="col-md-7">
                                                            <input type="number" class="form-control" placeholder="cantidad" id="cantidad" name="cantidad"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Precio</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="precio" id="precio" name="precio"> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2 text-right">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" id="agregar">Agregar Producto</button>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <div class="panel-heading"> Detalle de Compra </div>
                                                <div class="table-responsive col-md-12">
                                                    <table id="detalles" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Eliminar</th>
                                                                <th>Producto</th>
                                                                <th>Precio(S/.)</th>
                                                                <th>Cantidad</th>
                                                                <th>SubTotal(S/.)</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="4">
                                                                    <p align="right">TOTAL:</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span id="total">S/.</span> </p>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="4">
                                                                    <p align="right">TOTAL IMPUESTO (18%):</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span id="total_impuesto">S/.</span></p>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="4">
                                                                    <p align="right">TOTAL PAGAR:</p>
                                                                </th>
                                                                <th>
                                                                    <p align="right"><span align="right" id="total_pagar_html">S/.</span> <input type="hidden" name="total" id="total_pagar" value="0.00"></p>
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
                                                <a href="{{route('compras.index')}}" type="button" class="btn btn-default">Cancelar</a>
		                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="nprov" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Nuevo Proveedor</h4> </div>
                                    <div class="modal-body">
                                        <form action="{{ route('proveedors.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <label>RUC</label>
                                                        <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="ruc" id="ruc" class="form-control">
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
                                                            <label>Email</label>
                                                            <input type="email" name="email" id="email" class="form-control">
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

                <div id="nprod" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Nuevo Producto</h4> </div>
                                    <div class="modal-body">
                                        <form action="{{ route('productos.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" name="nombre" id="nombre" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Stock</label>
                                                            <input type="number" name="stock" id="stock" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                         <div class="form-group">
                                                            <label>precio de venta</label>
                                                            <input type="text" class="form-control" id="precio_venta" name="precio_venta">
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Categoría</label>
                                                            <select class="form-control" id="category_id" name="category_id" tabindex="1">
                                                            @foreach ($categories as $categoria)
                                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Proveedor</label>
                                                            <select class="form-control" id="proveedor_id" name="proveedor_id" tabindex="1">
                                                            @foreach ($proveedors as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Lugar</label>
                                                            <select class="form-control" name="lugar" tabindex="1">
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                            <option value="S4">S4</option>
                                                            <option value="V1">V1</option>
                                                            <option value="V2">V2</option>
                                                            <option value="V3">V3</option>
                                                            <option value="V4">V4</option>
                                                            <option value="C1">C1</option>
                                                            <option value="C2">C2</option>
                                                            </select>
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
    
    var cont = 0;
    total = 0;
    subtotal = [];
    
    $("#guardar").hide();

    
    function agregar() {
    
        producto_id = $("#producto_id").val();
        producto = $("#producto_id option:selected").text();
        cantidad = $("#cantidad").val();
        precio = $("#precio").val();
        impuesto = $("#tax").val();
    
        if (producto_id != "" && cantidad != "" && cantidad > 0 && precio != "") {
            subtotal[cont] = cantidad * precio;
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="productlist[]" value="'+producto_id+'">'+producto+'</td> <td> <input type="hidden" id="precio[]" name="precio[]" value="' + precio + '"> <input class="form-control" type="number" id="precio[]" value="' + precio + '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input class="form-control" type="number" value="' + cantidad + '" disabled> </td> <td align="right">S/' + subtotal[cont] + ' </td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la compras',
    
            })
        }
    }
    
    function limpiar() {
        $("#cantidad").val("");
        $("#precio").val("");
        $("#ruc").val("");
        $("#nombre").val("");
        $("#direccion").val("");
        $("#email").val("");
        $("#telefono").val("");
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
    
    function buscar2(){
            var dni=$('#ruc').val();
            if (dni!='') {
                $.ajax({
                    url:"{{ route('buscarRuc') }}",
                    method:'GET',
                    data:{dni:dni},
                    dataType:'json',
                    success:function(data){
                        if(data[0]==="nada")
                        {
                            $('#ruc').val('');
                            $('#nombre').val('');
                        }
                        else{
                            $('#nombre').val(data[1]);
                        }
                    }
                });
            }else{
                alert('Escriba el RUC!');
                $('#ruc').focus();
            }

            return false;
            
        }

    @if(session('Comprag')=='error')
        swal("Compra no registrada","", "error")
    @endif

    </script>
    
@endsection