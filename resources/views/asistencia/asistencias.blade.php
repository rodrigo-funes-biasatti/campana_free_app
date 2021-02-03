@extends('layouts.layout')

@section('contenido')
<div class="container">
	<div class="row justify-content-center">
		<div style="font-size: 73px;" class="title m-b-md">
			Historial de ASISTENCIAS de 
		</div>
		<div style="font-size: 73px;" class="title m-b-md">
			<strong>{{$pers->nombre}}</strong>
		</div>
	</div>

	<!--@if( session()->has('asisDel'))
	<hr>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Eliminado:</strong> {{ session('asisDel')}}
		</div>
	</div>
	@endif-->


	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">DNI</th>
				<th scope="col">Evento</th>
				<th scope="col">Tipo entrada</th>
				<th scope="col">Fecha pago</th>
				<th scope="col">¿Pagó?</th>
				<th scope="col">Eliminar</th>
				@auth
				<th scope="col" class="lastTH">Reg. pago</th>
				@endauth
			</tr>
		</thead>
		<tbody>
			@if ($asis->count() == 0)
			<tr>
				<td>
					No hay asistencias registradas
				</td>
			</tr>
			@else
			@foreach ($asis as $asistencia)
			<tr>
				<th scope="row">{{$loop->index+1}}</th>
				@foreach ($eventos as $evento)
				@if($evento->idEvento == $asistencia->idEvento)
				<td>{{$evento->nombre}}</td>
				@endif
				@endforeach
				@if ($asistencia->tipo == 0)
				<td>Normal</td>
				@else
				<td>VIP</td>
				@endif
				<td>{{\Carbon\Carbon::parse($asistencia->fechaPago)->format('d/m/Y')}}</td>
				@if ($asistencia->pagado == 0)
				<td>No pagado</td>
				@else
				<td>Pagado</td>
				@endif
				<td>
					<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo{{$asistencia->idEvento}}"class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
					<div id="demo{{$asistencia->idEvento}}" class="collapse">
						<form method="POST" action="{{ route('asistencia.destroy', $asistencia->idAsistencia) }}">	
							@csrf
							{{ method_field('DELETE')}}
							<input class="form-control" style="width: 90px;" type="text" name="codUnico" id="codUnico" placeholder="Código" required>
							<button onclick="return confirm('¿Realmente querés borrar la asistencia?');" for="codUnico" type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
						</form>
					</div>
				</td>
				<td>
					@auth
					<form method="POST" action="{{ route('asistencia.regPago')}}">
						@csrf
						{{ method_field('PUT')}}
						<input type="hidden" name="idAsistencia" value="{{$asistencia->idAsistencia}}">
						<button onclick="return confirm('¿Confirmás la registración del pago?');" type="submit" class="btn btn-success"><i class="fas fa-hand-holding-usd"></i></button>
					</form>
					@endauth
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</div>

@stop