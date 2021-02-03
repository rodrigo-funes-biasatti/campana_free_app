@extends('layouts.layout')

@section('contenido')

<div class="container">

	<div class="row justify-content-center">
		<div class="title m-b-md">
			Adminsitración de USUARIOS
		</div>
	</div>

	@if( session()->has('userEditado'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Editado:</strong> {{ session('userEditado')}}
		</div>
	</div>
	@endif

	@if( session()->has('userEliminado'))
	<div class="row justify-content-center">
		<hr>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-success" role="alert">
			<strong>Eliminado:</strong> {{ session('userEliminado')}}
		</div>
	</div>
	@endif

	<div class="row justify-content-center">
		<a class="btn btn-success btnNuevoLugar" style="margin-bottom: 30px;" href="{{ route('register') }}"><i class="fas fa-plus"></i>  Nuevo usuario</a>	
	</div>
	
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nombre de usuario</th>
				<th scope="col">Email</th>
				<th scope="col" class="lastTH">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<th scope="row">{{$loop->index+1}}</th>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					<div class="row justify-content-center">
						<a style="height: 34px; margin-right: 10px;" class="btn btn-warning" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>
						<form method="POST" action="{{ route('user.destroy', $user->id) }}">	
							@csrf
							{{ method_field('DELETE')}}	
							<button onclick="return confirm('¿Realmente querés borrar el usuario?');" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

@stop