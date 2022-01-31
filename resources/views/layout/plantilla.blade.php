<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/ampleadmin/plugins/images/favicon.png">
    <title>Libreria Micol Dashboard @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="/ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="/ampleadmin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/ampleadmin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/ampleadmin/css/colors/default.css" id="theme" rel="stylesheet">

    <link href="/ampleadmin/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Toastr style -->
    <link href="{{asset('Inspinia/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    @laravelPWA
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <a class="logo" href="">
                        <span class="hidden-xs">
                        <img src="/ampleadmin/plugins/images/micol.jpeg" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                    @if(Auth::user()->rol=="jefe compras" || Auth::user()->rol=="administrador" )
                    <li class="">
                        <a class="button waves-effect waves-light" href="{{route('compras.create')}}"> <i class="mdi mdi-cart-plus"></i>
                        </a></li>
                    @endif
                    @if(Auth::user()->rol=="vendedor" || Auth::user()->rol=="administrador" )
                    <li class="">
                        <a class="button waves-effect waves-light" href="{{route('ventas.create')}}"> <i class="mdi mdi-cash"></i>
                        </a></li>
                    @endif
                </ul>

                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-bell-outline"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Notificación de stock</div>
                            </li>
                            <li>
                                @if(Auth::user()->rol=="jefe compras" || Auth::user()->rol=="administrador" )
                                <div class="message-center">
                                    @foreach(notificacion() as $noti)
                                    <a href="{{route('compras.create')}}">
                                        <div class="mail-contnet">                                            
                                                <h5 class="text-danger">{{$noti->nombre}}<h5>
                                                <span class="mail-desc">Cuenta con {{$noti->stock}} de stock</span>
                                                
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                @endif
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown"> <img src="/ampleadmin/plugins/images/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="/ampleadmin/plugins/images/user.png" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                    <i class="fa fa-power-off"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="/ampleadmin/plugins/images/user.png" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li> <a href="/home" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
                    </li>
                    @if(Auth::user()->rol=="administrador")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Usuarios <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/usuarios"><i class="fa-fw">R</i><span class="hide-menu">Roles</span></a> </li>                        
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->rol=="jefe almacén" || Auth::user()->rol=="administrador" )
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-archive fa-fw" data-icon="v"></i> <span class="hide-menu"> Almacén <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/categorias"><i class="fa-fw">CT</i><span class="hide-menu">Categorías</span></a> </li>
                            <li> <a href="/productos"><i class="fa-fw">P</i><span class="hide-menu">Productos</span></a></li>                           
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol=="jefe compras" || Auth::user()->rol=="administrador" )
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> <span class="hide-menu"> Compras <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/proveedores"><i class="fa-fw">PV</i><span class="hide-menu">Proveedores</span></a> </li>
                            <li> <a href="/compras"><i class="fa-fw">RC</i><span class="hide-menu">Mantenedor Compra</span></a> </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->rol=="vendedor" || Auth::user()->rol=="administrador" )
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple fa-fw" data-icon="v"></i> <span class="hide-menu"> Ventas <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/clientes"><i class="fa-fw">C</i><span class="hide-menu">Clientes</span></a> </li>
                            <li> <a href="/ventas"><i class="fa-fw">RV</i><span class="hide-menu">Mantenedor Venta</span></a> </li>
                        </ul>
                    </li>
                    @endif
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-bar fa-fw" data-icon="v"></i> <span class="hide-menu"> Reportes <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            @if(Auth::user()->rol=="jefe almacén" || Auth::user()->rol=="administrador" )
                            <li> <a href="/almacen"><i class="fa-fw">RA</i><span class="hide-menu">Reporte Almacén </span></a> </li>
                            @endif
                            @if(Auth::user()->rol=="vendedor" || Auth::user()->rol=="administrador" )
                            <li> <a href="{{route('ventas.fecha')}}"><i class="fa-fw">RV</i><span class="hide-menu">Reporte Ventas</span></a> </li>
                            @endif
                            @if(Auth::user()->rol=="jefe compras" || Auth::user()->rol=="administrador" )
                            <li> <a href="{{route('compras.fecha')}}"><i class="fa-fw">RC</i><span class="hide-menu">Reporte Compras</span></a> </li>
                            @endif
                        </ul>
                    </li>

                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <li class="devider"></li>
                    <li><a href="{{route('ayuda')}}" class="waves-effect"><i class="far fa-circle text-danger"></i> <span class="hide-menu">Ayuda</span></a></li>
                    <li><a href="#" class="waves-effect"><i class="far fa-circle text-success"></i> <span class="hide-menu">Faqs</span></a></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('titulo')
                
                @yield('contenido')
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2022 &copy; Colina Terán - Hernández Huangal </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/ampleadmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/ampleadmin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/ampleadmin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/ampleadmin/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/ampleadmin/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="/ampleadmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="/ampleadmin/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="/ampleadmin/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Toastr script -->
    <script src="{{asset('Inspinia/js/plugins/toastr/toastr.min.js')}}"></script>

    @yield('scripts')
</body>

</html>
