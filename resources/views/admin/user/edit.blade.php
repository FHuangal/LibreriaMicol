@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Editar usuario</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/usuarios">Usuario</a></li>
                            <li class="active">Editar usuario</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Editar Usuario </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="/usuarios/{{$usuario->id}}" method="POST" class="form-horizontal">
                                    	@csrf
                                         @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$usuario->name}}" id="name" name="name"></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" value="{{$usuario->email}}" id="email" name="email"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rol</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="rol">
                                                            <option value="{{$usuario->rol}}" disabled selected>--{{$usuario->rol}}--</option>
                                                            <option value="administrador">administrador</option>
                                                            <option value="jefe compras">jefe compras</option>
                                                            <option value="jefe almacén">jefe almacén</option>
                                                            <option value="vendedor">vendedor</option>
                                                        </select> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    
                                                </div>
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
        @if(session('Usuarioe')=='error')
        swal("Usuario no actualizado","", "error")
        @endif
    </script>
@endsection