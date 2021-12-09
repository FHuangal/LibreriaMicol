@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Editar Proveedor</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/proveedores">Proveedor</a></li>
                            <li class="active">Editar Categoria</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Editar Proveedor </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="/proveedores/{{$proveedor->id}}" method="POST" class="form-horizontal">
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
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$proveedor->nombre}}" id="nombre" name="nombre" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" value="{{$proveedor->email}}" id="email" name="email" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Ruc</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" value="{{$proveedor->ruc}}" id="ruc" name="ruc" disabled> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Dirección</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$proveedor->direccion}}" id="direccion" name="direccion" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Teléfono</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" value="{{$proveedor->telefono}}" id="telefono" name="telefono" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">        
                                                </div>
                                                <!--/span-->
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
		                                                        <a href="{{route('proveedors.index')}}" type="button" class="btn btn-default">Cancelar</a>
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