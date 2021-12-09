@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Editar Categoria</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/categorias">Categoría</a></li>
                            <li class="active">Editar Categoria</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Editar Categoría </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="/categorias/{{$categoria->id}}" method="POST" class="form-horizontal">
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
                                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}" required></div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Descripción</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$categoria->descripcion}}" required> </div>
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
		                                                        <a href="{{route('categories.index')}}" type="button" class="btn btn-default">Cancelar</a>
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