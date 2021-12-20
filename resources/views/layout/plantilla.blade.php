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
                        <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="/ampleadmin/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="/ampleadmin/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="/ampleadmin/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="/ampleadmin/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>

                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/ampleadmin/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Jhonatan</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="/ampleadmin/plugins/images/users/varun.jpg" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>Jhonatan Colina</h4>
                                        <p class="text-muted">admin@gmail.com</p></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/"><i class="fa fa-power-off"></i> Logout</a></li>
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
                        <div><img src="/ampleadmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jhonatan Colina <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="/"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li> <a href="/inicio" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Usuarios <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/categorias"><i class="fa-fw">R</i><span class="hide-menu">Roles</span></a> </li>                        
                        </ul>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-archive fa-fw" data-icon="v"></i> <span class="hide-menu"> Almacén <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/categorias"><i class="fa-fw">CT</i><span class="hide-menu">Categorías</span></a> </li>
                            <li> <a href="/productos"><i class="fa-fw">P</i><span class="hide-menu">Productos</span></a> </li>                           
                        </ul>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> <span class="hide-menu"> Compras <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/proveedores"><i class="fa-fw">PV</i><span class="hide-menu">Proveedores</span></a> </li>
                            <li> <a href="/compras"><i class="fa-fw">RC</i><span class="hide-menu">Registrar Compra</span></a> </li>
                        </ul>
                    </li>

                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple fa-fw" data-icon="v"></i> <span class="hide-menu"> Ventas <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="/clientes"><i class="fa-fw">C</i><span class="hide-menu">Clientes</span></a> </li>
                            <li> <a href="/ventas"><i class="fa-fw">RV</i><span class="hide-menu">Registrar Venta</span></a> </li>
                        </ul>
                    </li>

                    <li><a href="/" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    <li class="devider"></li>
                    <li><a href="#" class="waves-effect"><i class="far fa-circle text-danger"></i> <span class="hide-menu">Ayuda</span></a></li>
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
            <footer class="footer text-center"> 2021 &copy; Colina Terán - Hernández Huangal </footer>
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

    @yield('scripts')
</body>

</html>
