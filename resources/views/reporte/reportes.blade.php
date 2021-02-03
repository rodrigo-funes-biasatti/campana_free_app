@extends('layouts.layout')

@section('contenido')
<div class="container">
	<div class="row justify-content-center">
		<div class="title m-b-md">
			REPORTES
		</div>
	</div>

	@if( session()->has('lugarCreado'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Creado:</strong> {{ session('lugarCreado')}}
		</div>
	</div>
	@endif

	@if( session()->has('errorEvento'))
	<hr>
	<div class="row justify-content-center">
		<div class="alert alert-danger" role="alert">
			<strong>Error:</strong> {{ session('errorEvento')}}
		</div>
	</div>
	@endif

	@if( session()->has('errorDate'))
	<hr>
	<div class="row justify-content-center">
		<div class="alert alert-danger" role="alert">
			<strong>Error:</strong> {{ session('errorDate')}}
		</div>
	</div>
	@endif

	@if( session()->has('errorCategoria'))
	<hr>
	<div class="row justify-content-center">
		<div class="alert alert-danger" role="alert">
			<strong>Error:</strong> {{ session('errorCategoria')}}
		</div>
	</div>
	@endif

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Reporte</th>
				<th scope="col">Descripcion</th>
				<th scope="col" class="lastTH">Criterio</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<th scope="row">Reporte general de asistencias por evento.</th>
				<td >Se generará un .pdf donde se listarán todas las asistencias del evento seleccionado.</td>
				<td>
					<form method="POST" action="{{route('genRep')}}">
						@csrf()
						<label style="margin-right: 10px;">Evento:</label>
						<select id="select_evento" name="evento" requierd>
							<option value="" style="display:none" selected disabled hidden>-Seleccione un evento-</option>
							@foreach($eventos as $evento)
							<option value="{{$evento->idEvento}}">{{$evento->nombre}}</option>
							@endforeach
						</select>
						<button type="submit" id="repGen" class="btn btn-success"><i style="padding-right:5px;" class="far fa-chart-bar"></i></i>Vista previa</button>
					</form>
				</td>
			</tr>

			<tr>
				<th scope="row">Reporte de asistencias de un evento por categoría</th>
				<td >Se generará un .pdf donde se listarán todas las asistencias de un evento específico, filtradas por el tipo de entrada (Normal/VIP).</td>
				<td>
					<form method="POST" action="{{route('catRep')}}">
						@csrf()
						<label style="margin-right: 10px;">Evento:</label>
						<select name="eventoCategoria" id="eventoCategoria">
							<option value="" selected disabled hidden>-Seleccione un evento-</option>
							@foreach($eventos as $evento)
							<option value="{{$evento->idEvento}}">{{$evento->nombre}}</option>
							@endforeach
						</select>
						<label style="margin-right: 10px;">Categoría:</label>
						<select name="categoria" id="categoria">
							<option value="" selected disabled hidden>-Seleccione una categoría-</option>
							<option value="0">Normal</option>
							<option value="1">VIP</option>
						</select>
						<br>
						<button type="submit" class="btn btn-success"><i style="padding-right:5px;" class="far fa-chart-bar"></i></i>Vista previa</button>
					</form>
				</td>
			</tr>

			<tr>
				<th scope="row">Reporte de los eventos en un rango de fechas.</th>
				<td >Se generará un .pdf donde se listarán todos los eventos DESDE una fecha determinada HASTA otra fecha determinada</td>
				<td>
					<form method="POST" action="{{route('dateRep')}}">
						@csrf()
						<label style="margin-right: 10px;" for="desde">Desde:</label>
						<input style="margin-right: 30px;" type="date" name="desde" id="desde">
						<label style="margin-right: 10px;" for="hasta">Hasta: </label>
						<input style="margin-right: 10px;" type="date" name="hasta" id="hasta">
						<br>
						<button type="submit" class="btn btn-success"><i style="padding-right:5px;" class="far fa-chart-bar"></i></i>Vista previa</button>
					</form>
				</td>
			</tr>

		</tbody>
	</table>
</div>

@stop