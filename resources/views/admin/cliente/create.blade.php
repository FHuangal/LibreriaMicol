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
                                                        <label class="control-label col-md-3">Documento</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" id="documento" name="documento" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                            <div class="row">
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Dirección</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Teléfono</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" required></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                
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
		                                        <button type="submit" class="btn btn-success">Guardar</button>
		                                        <a href="{{route('clientes.index')}}" type="button" class="btn btn-default">Cancelar</a>
		                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')
    <script>
            @if(session('Clienteg')=='error')
        swal("Cliente no registrado","", "error")
            @endif
    </script>
@endsection