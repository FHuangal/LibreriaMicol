<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="/ampleadmin/plugins/images/favicon.png">
<title>Libreria Micol Login</title>
<!-- Bootstrap Core CSS -->
<link href="/ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="/ampleadmin/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="/ampleadmin/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="/ampleadmin/css/colors/blue.css" id="theme"  rel="stylesheet">

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form method="POST" class="form-horizontal form-material" id="loginform" action="{{route('login')}}">
        <a href="javascript:void(0)" class="text-center db"><br/><img src="/ampleadmin/plugins/images/micol.jpeg" alt="Home" /></a> 
        @csrf
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Recuérdame </label>
            </div> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
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
</body>
</html>