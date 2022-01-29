@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro de Usuario</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/usuarios">Usuario</a></li>
                            <li class="active">Nuevo Usuario</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Registro de Usuario </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="{{route('users.store')}}" method="POST" class="form-horizontal">
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
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="name" id="name" name="name" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" placeholder="email" id="email" name="email" required> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Contraseña</label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control" placeholder="password" id="password" name="password" required></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Rol</label>
                                                        <div class="col-md-9">
                                                        <select class="form-control" id="rol" name="rol" tabindex="1">
                                                            <option value="" disabled selected>Selecccione un rol</option>
                                                            <option value="administrador">administrador</option>
                                                            <option value="jefe compras">jefe compras</option>
                                                            <option value="jefe almacén">jefe almacén</option>
                                                            <option value="vendedor">vendedor</option>
                                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                                <!--/span-->
                                            </div>                                             
                                            <!--/row-->
		                                    <div class="form-actions">
		                                        <button type="submit" class="btn btn-success">Guardar</button>
		                                        <a href="{{route('users.index')}}" type="button" class="btn btn-default">Cancelar</a>
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
        @if(session('Usuariog')=='error')
            swal("Usuario no registrado","", "error")
        @endif
    </script>
@endsection