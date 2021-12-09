@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Editar Producto</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/productos">Producto</a></li>
                            <li class="active">Editar Producto</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Editar Producto </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="/productos/{{$producto->id}}" method="POST" class="form-horizontal">
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
                                         @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Código</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$producto->codigo}}" id="codigo" name="codigo" disabled></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$producto->nombre}}" id="nombre" name="nombre"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Precio de venta</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$producto->precio_venta}}" id="precio_venta" name="precio_venta" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Stock</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" value="{{$producto->stock}}" id="stock" name="stock" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Lugar</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="lugar">
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
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    
                                                </div>
                                            </div>                                         
                                            <!--/row-->
		                                    <div class="form-actions">
		                                        <div class="row">
		                                            <div class="col-md-9">
		                                            </div>
		                                            <div class="col-md-3">
		                                            	<div class="row">
		                                                    <div class="col-md-offset-3 col-md-12">
		                                                        <button type="submit" class="btn btn-success">Guardar</button>
		                                                        <a href="{{route('productos.index')}}" type="button" class="btn btn-default">Cancelar</a>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')

@endsection