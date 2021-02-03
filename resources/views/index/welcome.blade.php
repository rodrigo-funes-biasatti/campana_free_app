@extends('layouts.layout')

@section('contenido')

<div class="row justify-content-center">
	<div class="title m-b-md">
		Eventos Campana Free
	</div>
</div>

@if( session()->has('userCreado'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Creado:</strong> {{ session('userCreado')}}
	</div>
</div>
@endif

@if( session()->has('creado'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Creado:</strong> {{ session('creado')}}
	</div>
</div>
@endif

@if( session()->has('errorDelAsis'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorDelAsis')}}
	</div>
</div>
@endif

@if( session()->has('asisPag'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Registrado:</strong> {{ session('asisPag')}}
	</div>
</div>
@endif

@if( session()->has('asisDel'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Eliminado:</strong> {{ session('asisDel')}}
	</div>
</div>
@endif

@if( session()->has('perCreada'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Registrado:</strong> {{ session('perCreada')}}
	</div>
</div>
@endif

@if( session()->has('perError'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('perError')}}
	</div>
</div>
@endif

@if( session()->has('delPer'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Eliminado:</strong> {{ session('delPer')}}
	</div>
</div>
@endif

@if( session()->has('errorRegPag'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorRegPag')}}
	</div>
</div>
@endif

@if( session()->has('eliminado'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Eliminiado:</strong> {{ session('eliminado')}}
	</div>
</div>
@endif


@if( session()->has('visible'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Visible:</strong> {!! session('visible') !!}
	</div>
</div>
@endif


@if( session()->has('noVisible'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Visible:</strong> {!! session('noVisible') !!}
	</div>
</div>
@endif

@if( session()->has('editado'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Editado:</strong> {{ session('editado')}}
	</div>
</div>
@endif

@if( session()->has('newAsis'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-success" role="alert">
		<strong>Registrado:</strong> {!! session('newAsis')!!}
	</div>
</div>
@endif

@if( session()->has('errorNewAsis'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorNewAsis')}}
	</div>
</div>
@endif

@if( session()->has('errorNewAsisCap'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorNewAsisCap')}}
	</div>
</div>
@endif

@if( session()->has('errorAsis'))
<hr>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorAsis')}}
	</div>
</div>
@endif


<div class="content">

	<!--	
		<div class="row justify-content-center">
		<div class="imagen clearfix" style="">
			<img src="/img/CDAcru.jpg" style="">
		</div>
		<div class="iconos clearfix" style="">
			<ul style="">
				<li class="item-evento" style="">
					<i class="far fa-bookmark" style=""></i>CAMPANA DELUXE
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-user" style=""></i>ACRU
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-map-marker-alt" style=""></i>Plaza de los Próceres
				</li>
				<li class="item-evento" style="">
					<i class="far fa-calendar-alt" style=""></i>21 de Agosto
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-dollar-sign" style=""></i>Precio normal: $50
				</li>
				<li class="item-evento" style="">
					<i class="far fa-money-bill-alt" style=""></i>Precio VIP: $100
				</li>
				@guest
				<li class="item-evento">
					<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#asistencia"><i class="fas fa-check"></i> Asistiré</button>

					<div id="asistencia" class="collapse">
						<br>
						<form action="{{route('asistencia.create')}}">
							<div class="form-group row">
								<label for="nroDNI" class="">Número de documento (DNI):</label>
							</div>
							
							<div class="form-group row">
								<input class="form-control" type="text" name="nroDNI" id="nroDNI" placeholder="Número">
							<div class="form-group row">
								<a href="{{route('persona.index')}}" class="btn btn-link form-control">¿Todavía no registraste tu dni?</a>
							</div>
						
						<div class="form-group row has-danger">
							<input style="width: 50%" class="form-control form-control-danger" type="text" name="nroDNI" id="nroDNI" placeholder="Número"><button type="submit" class="btn btn-primary">Buscar</button>
							<div class="form-control-feedback">No se ha encontrado dni.</div>
						</div>
						<div class="form-group row">
							<a href="{{route('persona.create')}}" class="btn btn-link form-control">¿Todavía no registraste tu dni?</a>
						</div>
					</div>
				</form>
			</div>
		</li>
		@endguest
		@auth
		<li class="item-evento" style="">
			<i class="fas fa-shopping-cart"></i><strong>TOTAL RECAUDADO:</strong><strong style="color:green; font-weight: bold;"> $100
			</strong></li>
			<li class="item-evento">
				<div class="row">
					<div class="col-md-6">
						<a class="btn btn-warning" onclick="return confirm(“Realmente querés borrar el evento?”);" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</a>
					</div>
					<div class="col-md-4">
						<a class="btn btn-danger" onclick="return confirm(“Realmente querés borrar el evento?”);" href="#"><i class="fa fa-trash" aria-hidden="true"></i>Eliminar</a>
					</div>
				</div>
			</li>
			<li class="item-evento">
				<div class="row">
					<div class="col-md-6">
						<a class="btn btn-info" href="">Poner VISIBLE</a>
					</div>
				</div>
			</li>
			<li class="item-evento">
				<div class="row">
					<div class="col-md-6">
						<a class="btn btn-info" href="">Poner NO VISIBLE</a>
					</div>
				</div>
			</li>
			@endif
		</ul>

	</div>
</div>
-->
</div>
@foreach ($eventos as $evento)
<hr width="1000px;">
<div class="content">
	<div class="row justify-content-center">
		<div class="imagen clearfix" style="">
			<img src="{{url('/public/cabalgata_01')}}" style="">
		</div>
		<div class="iconos clearfix" style="">
			<ul style="">
				<li class="item-evento" style="">
					@if($evento->visible == 1)
					<i class="far fa-bookmark" style=""></i><span class="nombreEvento" style="font-weight: bold;">{{ $evento->nombre }}</span>
					@else
					<i class="far fa-bookmark" style=""></i><strong style="color:red; font-weight: bold;">{{ $evento->nombre }} (NO VISIBLE).</strong>
					@endif
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-user" style=""></i>{{ $evento->nombreArtista }}
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-map-marker-alt" style=""></i><a target="_blank"href="{{ $evento->lugar->urlMaps }}">{{ $evento->lugar->nombre }}</a>
				</li>
				<li class="item-evento" style="">
					<i class="far fa-calendar-alt" style=""></i><strong style="font-weight: bold;">
						{{ \Carbon\Carbon::parse($evento->fecha)->day }} {{'de' }} 
						@switch( \Carbon\Carbon::parse($evento->fecha)->month)
						@case(1)
						{{ 'Enero' }}
						@break
						@case(2)
						{{ 'Febrero' }}
						@break
						@case(3)
						{{ 'Marzo' }}
						@break
						@case(4)
						{{ 'Abril' }}
						@break
						@case(5)
						{{ 'Mayo' }}
						@break
						@case(6)
						{{ 'Junio' }}
						@break
						@case(7)
						{{ 'Julio' }}
						@break
						@case(8)
						{{ 'Agosto' }}
						@break
						@case(9)
						{{ 'Septiembre' }}
						@break
						@case(10)
						{{ 'Octubre' }}
						@break
						@case(11)
						{{ 'Noviembre' }}
						@break
						@case(12)
						{{ 'Diciembre' }}
						@break
						@endswitch

						{{ 'del' }} 

						{{ \Carbon\Carbon::parse($evento->fecha)->year }}
					</strong>
				</li>

				<li class="item-evento">
					<i class="far fa-clock"></i>Hora: <strong style="font-weight: bold;">{{$evento->hora}}:@if($evento->minutos == 0)00 @else{{$evento->minutos}} @endif</strong>

				</li>

				<li class="item-evento" style="">
					<i class="fas fa-dollar-sign" style=""></i>Precio normal:<strong style="color:green; font-weight: bold;"> ${{ $evento->preNormal }}</strong>
				</li>
				<li class="item-evento" style="">
					<i class="far fa-money-bill-alt" style=""></i>Precio VIP: <strong style="color:green; font-weight: bold;">${{ $evento->preVip }}</strong>
				</li>
				@guest
				<li class="item-evento" style="">
					<i class="fas fa-ticket-alt"></i><strong>ENTRADAS:</strong>
					@if ($evento->capacidadRestante > 0)
					<strong style=" font-weight: bold; color: green;">DISPONIBLES</strong>
					@else
					@if($evento->capacidadRestante < 0)
					<strong style=" font-weight: bold; color: green;">LIBRE Y GRATUITO</strong>
					@else
					<strong style=" font-weight: bold; color: red;">AGOTADAS</strong>
					@endif
					@endif
				</li>
				<li class="item-evento">
					<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo{{$evento->idEvento}}"><i class="fas fa-check"></i> Asistiré</button>

					<div id="demo{{$evento->idEvento}}" class="collapse">
						<br>
						
						<form method="POST" action="{{ route('nuevaAsis', $evento->idEvento)}}">
							@csrf
							{!! method_field('POST')!!}
							<div class="form-group row">
								<label for="nroDni">Número de documento (DNI):</label>
							</div>
							@if( session()->has('errorBusq'))
							<div class="form-group row has-danger">
								<input style="width: 50%" class="form-control form-control-danger" type="text" name="nroDni" id="nroDni" placeholder="Número"><button type="submit" class="btn btn-primary">Buscar</button>
								<div class="form-control-feedback">{{session('errorBusq')}}</div>
							</div>
							@else
							<div class="form-group row">
								<input style="width: 50%" class="form-control" type="text" name="nroDni" id="nroDni" placeholder="Número"><button type="submit" class="btn btn-primary">Buscar</button>
							</div>
							@endif
						</form>
						<div class="form-group row">
							<a href="{{route('persona.create')}}" class="btn btn-link form-control">¿Todavía no registraste tu dni?</a>
						</div>
					</div>
				</li>
				@endguest
				@auth
				<li class="item-evento" style="">
					<i class="fas fa-shopping-cart"></i><strong>TOTAL RECAUDADO ESTIMADO:</strong><strong style="color:green; font-weight: bold;"> ${{$evento->recaudacion}}
					</strong>
				</li>
				<li class="item-evento" style="">
					<i class="fas fa-ticket-alt"></i><strong>CAPACIDAD RESTANTE:</strong><strong style=" font-weight: bold;"> 
						@if($evento->capacidadRestante < 0)
						LIBRE Y GRATUITO
						@else
						{{$evento->capacidadRestante}}
						@endif
					</strong>
				</li>
				<li class="item-evento">
					<div class="row">
						<div class="col-md-6">
							<a class="btn btn-warning" href="{{ route('evento.edit', $evento->idEvento) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</a>
						</div>
						<div class="col-md-4">
							<form method="POST" action="{{ route('evento.destroy', $evento->idEvento) }}">
								@csrf
								{!! method_field('DELETE') !!}
								<button type="submit" onclick="return confirm('¿Realmente querés borrar el evento?');" class="btn btn-danger">
									<i class="fa fa-trash" aria-hidden="true"></i>Eliminar
								</button>
							</form>
						</div>
					</div>
				</li>

				<li class="item-evento">
					@if($evento->visible == 1)
					<form method="POST" action="{{route('visible')}}">
						@csrf
						<input type="hidden" id="idEvento" name="idEvento" value="{{$evento->idEvento}}"></hidden>
						<button type="submit" onclick="return confirm('¿Seguro que querés poner NO VISIBLE al evento?');" class="btn btn-info"><i class="far fa-eye-slash"></i> Poner NO VISIBLE
						</button>
					</form>
					@endif
					@if ($evento->visible == 0)
					<form method="POST" action="{{route('visible')}}">
						@csrf
						<input type="hidden" id="idEvento" name="idEvento" value="{{$evento->idEvento}}">
						<button type="submit" onclick="return confirm('¿Seguro que querés poner VISIBLE al evento?')" class="btn btn-info"><i class="far fa-eye"></i> Poner VISIBLE
						</button>
					</form>
					@endif
				</li>
				@endif
			</ul>
		</div>
	</div>	
</div>

@endforeach

<script>


</script>

@stop

