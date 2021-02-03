<!DOCTYPE html>
<html>
<head>
	<title>Tu código es éste:</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-12 justify-content-center" style="text-align: center;">
			<h1>¡Hola, <strong>{{$per->nombre}}</strong>!</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12 justify-content-center" style="text-align: center;">
			<h1>Hemos recibido tu asistencia al evento: <strong>{{$event->nombre}}</strong></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-offset-6">
			<p>Tu código para futuras transacciones es: <strong>{{$code}}</strong></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<p>Cualquier inconvenitente ocurrido, por favor <a href="campana.test">contactarse</a> con la administración.</p>
		</div>
	</div>
	
	<div class="row justify-content-center">
		<a class="footer">Copyright ® {{ date('Y') }}, Rodrigo Funes Biasatti.</a>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="/js/app.js"></script>
	<script src="/js/main.js"></script>
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
	integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
	crossorigin=""></script>
</body>
</html>