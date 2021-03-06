<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Como esta página es la base para las demás páginas hijas 
colocaremos un titulo por defecto -->
	<title>@yield('title','App Shop')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/material-kit.css')}}" rel="stylesheet" />

</head>
<!-- Invocamos por medio de yiel el contenido de body-class -->

<body class="@yield('body-class')">
	<nav class="navbar navbar-transparent navbar-absolute">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Redirigimos a la ruta raíz por medio de un helper -->
				<a class="navbar-brand" href="{{url('/')}}">App shop</a>
			</div>

			<div class="collapse navbar-collapse" id="navigation-example">
				<ul class="nav navbar-nav navbar-right">


					<!-- Authentication Links -->
					@guest
					@if (Route::has('login'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
					</li>
					@endif  

					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item">
						<a class="nav-link">{{ Auth::user()->name }}</a>
					</li>

		
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" type="button">{{ __('Cerrar sesión') }}</a>
					</li>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>

					@endguest

				</ul>
			</div>
		</div>
	</nav>
<!-- Dentro de este div se ubicarán la ruta que seleccionemos en este caso la ruta que invoca es 
la llamada con content -->
	<div class="wrapper">
		@yield('content')
	</div>


</body>
<!--   Core JS Files   -->

<script src="{{asset('/bootstrap/js/bootstrap.bundle.js')}}" type="text/javascript"></script>

<script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/material.min.js')}}"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{asset('/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>



</html>