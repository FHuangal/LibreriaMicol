@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro de Producto</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/productos">Producto</a></li>
                            <li class="active">Nueva Producto</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Registro de Producto </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="{{route('productos.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    	@csrf
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <p>Corrige los siguientes errores:</p>
                                                    <ul>
                                                        @foreach ($errors->all() as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="nombre" id="nombre" name="nombre" required> </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Precio de venta</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="precio de venta" id="precio_venta" name="precio_venta" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Stock</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="stock" id="stock" name="stock" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Categoría</label>
                                                        <div class="col-md-9">
                                                        <select class="form-control" id="category_id" name="category_id">
                                                            @foreach ($categories as $categoria)
                                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                            @endforeach
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Proveedor</label>
                                                        <div class="col-md-9">
                                                        <select class="form-control" id="proveedor_id" name="proveedor_id">
                                                            @foreach ($proveedors as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                            @endforeach
                                                            
                                                        </select></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Lugar</label>
                                                        <div class="col-md-9">
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
                                                        </select> </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            <!--/row-->
		                                    <div class="form-actions">
		                                        <button type="submit" class="btn btn-success">Guardar</button>
		                                        <a href="{{route('productos.index')}}" type="button" class="btn btn-default">Cancelar</a>

		                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')
    <script type="text/javascript">

            @if(session('Productog')=='error')
        swal("Producto no registrado","", "error")
            @endif
    </script>
@endsection