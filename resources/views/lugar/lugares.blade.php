@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div class="title m-b-md">
			Adminsitración de LUGARES
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

	@if( session()->has('lugarEditado'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Editado:</strong> {{ session('lugarEditado')}}
		</div>
	</div>
	@endif

	@if( session()->has('lugarEliminado'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Eliminado:</strong> {{ session('lugarEliminado')}}
		</div>
	</div>
	@endif

	<div class="row justify-content-center">
		<a class="btn btn-success btnNuevoLugar" style="margin-bottom: 30px;" href="{{ route('lugar.create') }}"><i class="fas fa-plus"></i>  Nuevo lugar</a>	
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Url GoogleMaps</th>
				<th scope="col">Capacidad Total</th>
				<th scope="col">Descripción</th>
				<th scope="col" class="lastTH">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($lugares as $lugar)
			<tr>
				<th scope="row">{{$loop->index+1}}</th>
				<td>{{$lugar->nombre}}</td>
				<td><a href="{{$lugar->urlMaps}}" target="_blank">Ver en Google Maps</a></td>
				@if($lugar->capacidadTotal < 0)
				<td>LIBRE Y GRATUITO</td>
				@else
				<td>{{$lugar->capacidadTotal}}</td>
				@endif
				@if ($lugar->descripcion == "")
				<td>(Sin descripción)</td>
				@else
				<td>{{$lugar->descripcion}}</td>
				@endif
				<td>
					<div class="row justify-content-center">
						<a style="height: 34px; margin-right: 0px;" class="btn btn-warning" href="{{ route('lugar.edit', $lugar->idLugar) }}"><i class="fas fa-pencil-alt"></i></a>
						<form method="POST" action="{{ route('lugar.destroy', $lugar->idLugar) }}">	
							@csrf
							{{ method_field('DELETE')}}	
							<button onclick="return confirm('¿Realmente querés borrar el lugar?');" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop