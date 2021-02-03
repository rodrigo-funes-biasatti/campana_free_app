@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div style="font-size: 73px;" class="title m-b-md">
			Listado de PERSONAS registradas
		</div>
	</div>

	@if( session()->has('perEliminada'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			{{ session('lugarEliminado')}}
		</div>
	</div>
	@endif
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">DNI</th>
				<th scope="col">Nombre y Apellido</th>
				<th scope="col">Fecha de nacimiento</th>
				<th scope="col">Domicilio</th>
				<th scope="col" class="lastTH">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pers as $persona)
			<tr>
				<th scope="row">{{$loop->index+1}}</th>
				<td>{{$persona->nroDNI}}</td>
				<td>{{$persona->nombre}}</td>
				<td>{{\Carbon\Carbon::parse($persona->fechaNac)->format('d/m/Y')}}</td>
				<td>{{$persona->direccion}}</td>
				<td>
					<div class="row justify-content-center">
						<form method="POST" action="{{ route('persona.destroy', $persona->idPersona) }}">
							@csrf
							{{ method_field('DELETE')}}	
							<button onclick="return confirm('¿Realmente querés borrar a esta persona?');" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop