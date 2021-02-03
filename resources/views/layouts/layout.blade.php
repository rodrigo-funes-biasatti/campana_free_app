<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Eventos Campana Free</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
	integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
	crossorigin=""/>
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" href="/css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<style type="text/css">
	html, body {
		background-color: #fff;
		color: #636b6f;
		font-family: 'Raleway', sans-serif;
		font-weight: 100;s
		height: 100vh;
		margin: 0;
	}

	footer{
		margin-bottom: 30px;
	}

	a.footer{
		text-decoration: none;
		margin-right: 50px;
	}

	.full-height {
		height: 100vh;
	}

	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
	}

	.position-ref {
		position: relative;
	}

	.top-right {
		position: absolute;
		right: 10px;
		top: 18px;
	}

	.content {
		text-align: center;
	}

	.title {
		font-size: 84px;
	}

	.links > a {
		color: #636b6f;
		padding: 0 25px;
		font-size: 12px;
		font-weight: 600;
		letter-spacing: .1rem;
		text-decoration: none;
		text-transform: uppercase;
	}
	.principal{
		margin-top: 30px;
	}

	.m-b-md {
		margin-bottom: 30px;
	}
</style>

</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel principal">
			<div class="container">
				<a href="{{ url('/') }}">
					<img src="/img/lcn2.png" style="width: 200px; height: 50px;">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar 
					<ul class="navbar-nav mr-auto">

					</ul>
				-->
				@auth
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="{{ route('evento.create') }}"class="btn btn-success"><i class="fas fa-plus"></i>  Crear nuevo evento</a>
					</li>
				</ul>
				@endauth
				@guest
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<form method="get" action="{{route('asistencia.buscarDni')}}">
							<div class="input-group">
								<input type="text" name="nroDni" id="nroDni" class="form-control" placeholder="Buscar asistencia por DNI" aria-label="Número de DNI" aria-describedby="basic-addon2" required>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i>  Buscar</button>
								</div>

							</div>
						</form>
					</li>
				</ul>


				@endguest

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
					</li>
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

							<a class="dropdown-item" href="{{ route('user.index') }}">Administrar usuarios</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="{{ route('lugar.index') }}">Administrar lugares</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="{{ route('persona.index') }}">Listado personas</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="{{ route('asistencia.index') }}">Historial de asistencias</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="{{ route('reportes') }}">Reportes</a>
							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Cerrar sesión') }}
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</a>
					</div>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>

<main class="py-4">
	@yield('contenido')
</main>
</div>

<hr>
<section id="footer">
	<div class="container">
		<div class="row justify-content-center">
			<footer class="page-footer font-small">
				<a class="footer" href="{{ url('/')}}">Inicio</a>

				<a class="footer" target="_blank" href="https://www.youtube.com/channel/UCH2HBoYDue44BIJy09k2iGw">CF2</a>

				<a class="footer" target="_blank" href="https://www.youtube.com/channel/UCr56Bal_fDQGBKHogadnfQw">Ruso+Clover</a>

				<a class="footer" target="_blank" href="https://www.facebook.com/Morevillafane">Fotografía</a>

				<a class="footer" target="_blank" href="https://www.facebook.com/Rodritest">Desarrollador</a>
			</footer>
		</div>
		<div class="row justify-content-center">
			<a class="footer">Copyright ® {{ date('Y') }}, Rodrigo Funes Biasatti.</a>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
crossorigin=""></script>

<script>
	$(document).ready(function(){

		var cap = $('#capacidadTotal');
		var check = $('#libreG');

		check.change(function(){
			if (check.is(':checked')){
				cap.attr('disabled', 'disabled');
			}
			else{
				cap.removeAttr('disabled');
			}
		});

		/*check.change(function(){
			cap.attr('disabled', 'disabled');
		});*/
	});
	
</script>

</body>
</html>