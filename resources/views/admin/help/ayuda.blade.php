@extends('layout.plantilla')
@section('styles')

@endsection

@section('titulo')

    <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Ayuda en línea</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/home">Dashboard</a></li>
                            <li class="active">Ayuda</li>
                        </ol>
                    </div>
    </div>

@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12">
                        <h4 class="box-title m-b-20">Preguntas frecuentes</h4>
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="font-bold"> ¿Cómo funciona el dashboard?  </a> </h4> </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="m-b-20">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        El usuario tendrá acceso a las diferentes opciones disponibles acorde a su rol en el sistema.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton de crear una compra. <br>
                                                        2. Barra de crear una venta. <br>
                                                        3. Boton de notificaciones. <br>
                                                        4 y 5. Perfil del usuario con opción de Logout. <br>
                                                        6. Opciones de navegación. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/navegador.jpeg') }}"  style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title"> <a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" > ¿Cómo funcionan los mantenedores? </a> </h4> </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                    	<div class="row">
                                            <div class="input-group">
                                                <strong><label> Mantenedores de tipo 1 </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        El usuario tendrá acceso a las diferentes mantenedores disponibles acorde a su rol en el sistema.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2. Boton para crear un nuevo registro. <br>
                                                        3. Boton para editar registro. <br>
                                                        4. Boton para eliminar registro. <br>
                                                        6. Opcion para reordenar la tabla. <br>
                                                        7. Buscador de registros. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/mantenedor1.jpg') }}"  style="width: 100%">
                                                    <hr>
                                                </div>
                                            <div class="input-group">
                                                <strong><label> Mantenedores de tipo 2 </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2. Boton para crear un nuevo registro. <br>
                                                        3. Buscador de registros. <br>
                                                        4. Boton para imprimir el ticket de la venta. <br>
                                                        5. Opcion para reordenar la tabla. <br>
                                                        6. Opción para mostrar la cantidad de entradas que se muestran en la tabla. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/mantenedor2.jpg') }}"  style="width: 100%">
                                                    <hr>
                                                </div>
                                            
                                            <div class="input-group">
                                                <strong><label> Mantenedores de tipo 3 </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        El usuario tendrá acceso a las diferentes mantenedores disponibles acorde a su rol en el sistema.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2. Boton para crear un nuevo registro. <br>
                                                        3. Buscador de registros. <br>
                                                        4. Opción para mostrar la cantidad de entradas que se muestran en la tabla. <br>
                                                        5. Opcion para reordenar la tabla. <br>
                                                        6. Opcion para visualizar los detalles de la compra. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/mantenedor3.jpg') }}"  style="width: 100%">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title"> <a class="font-bold collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" > ¿Cómo creo un nuevo registro? </a> </h4> </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                    	<div class="input-group">
                                                <strong><label> Crear registro tipo 1 </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        El usuario tendrá acceso a los diferentes create registros disponibles acorde a su rol en el sistema.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2. Combo box para seleccionar un cliente registrado. <br>
                                                        3. Boton para añadir un nuevo cliente. <br>
                                                        4. Caja de texto que nos brinda el IGV. <br>
                                                        6 y 7. Cajas de texto con la información del producto seleccionado. <br>
                                                        8. Caja de texto para ingresar la cantidad de producto a comprar. <br>
                                                        9. Caja de texto para ingresar el descuento en caso se requiera. <br>
                                                        10. boton para agregar el producto despues de ingresar la cantidad y el descuento en caso sea diferente de 0 <br>
                                                        11. Boton para guardar los datos. <br>
                                                        12. Boton para cancelar <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/venta.jpg') }}"  style="width: 100%">
                                                    <hr>
                                                </div>
                                                
                                        <div class="input-group">
                                                <strong><label> Crear registro tipo 2 </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        El usuario tendrá acceso a los diferentes create registros disponibles acorde a su rol en el sistema.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2, 3 y 5. Cajas de texto para ingresar datos. <br>
                                                        4, 6 y 7. Combo box para seleccionar datos registrados en la base de datos. <br>
                                                        8. Boton para guardar los datos. <br>
                                                        9. Boton para cancelar <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/registro.jpg') }}"  style="width: 100%">
                                                    <hr>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour"> <a class="collapsed font-bold panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> Ayuda extra </a> </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                    	<div class="input-group">
                                                <strong><label> Ayuda con los modales </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        Es un tipo de vista minimizada que pueden funcionar para hacer registros o visualizar datos.
                                                    </div>
                                                    <div class="input-group">
                                                        1. Caja de texto para ingresar el documento. <br>
                                                        2. Boton para buscar por RUC. <br>
                                                        3, 4 y 5. Cajas de texto para ingresar datos. <br>
                                                        6. Boton para limpiar las cajas de texto. <br>
                                                        7. Boton para cerrar el modal. <br>
                                                        8. Boton para registrar los datos. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/modal.jpg') }}"  style="width: 100%">
                                                    <hr>
                                                </div>
                                                <hr>
                                        <div class="input-group">
                                                <strong><label> Ayuda con los reportes </label></strong>
                                            </div>
                                            <hr>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        Reportes por fechas
                                                    </div>
                                                    <div class="input-group">
                                                        1. Boton para regresar al Dashboard o a la ventana anterior. <br>
                                                        2 y 3. Caja de texto typo date para seleccionar la fecha. <br>
                                                        4. Boton para consultar los datos entre las fechas. <br>
                                                        5. Boton para generar el PDF. <br>
                                                        6. Opcion para reordenar la tabla. <br>
                                                        7. Opcion para ver la cantidad de entradas que se muestran en la tabla<br>
                                                        8. Opcion para reordenar la tabla. <br>
                                                        9. Opcion para visualizar los detalles del reporte. <br>
                                                    </div>
                                                    <hr>
                                                    <img src="{{ asset('/ampleadmin/plugins/images/reporte.jpg') }}"  style="width: 100%">
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	</div>
@endsection