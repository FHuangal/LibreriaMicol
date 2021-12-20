@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro de Cliente</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/clientes">Cliente</a></li>
                            <li class="active">Nuevo Cliente</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Registro de Cliente </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="{{route('clientes.store')}}" method="POST" class="form-horizontal">
                                    	@csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Apellidos y Nombres</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="nombre" id="nombre" name="nombre" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">DNI</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="DNI" id="dni" name="dni" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">RUC</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="RUC" id="ruc" name="ruc"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Dirección</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Teléfono</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required> </div>
                                                    </div>
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
		                                                        <a href="{{route('clientes.index')}}" type="button" class="btn btn-default">Cancelar</a>
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