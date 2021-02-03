@extends('layouts.layout')

@section('contenido')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card" style="width: 40vw;">
				<div class="card-header">{{ __('Nuevo Evento') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('evento.store') }}" aria-label="{{ __('Nuevo Evento') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="nombre" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre del evento') }}</label>

							<div class="col-md-6">
								<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

								@if ($errors->has('nombre'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nombre') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="nombreArtista" class="col-sm-4 col-form-label text-md-right">{{ __('Artista') }}</label>

							<div class="col-md-6">
								<input id="nombreArtista" type="text" class="form-control{{ $errors->has('nombreArtista') ? ' is-invalid' : '' }}" name="nombreArtista" value="{{ old('nombreArtista') }}" required autofocus>

								@if ($errors->has('nombreArtista'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nombreArtista') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="lugar" class="col-sm-4 col-form-label text-md-right">{{ __('Lugar') }}</label>

							<div class="col-md-6">
								<select class="form-control" id="lugar" name="lugar" type="text">
									<option value="" selected disabled hidden>-Elige el lugar del evento-</option>
									@foreach ($lugares as $lugar)
									<option value="{{ $lugar->idLugar }}">{{$lugar->nombre}}</option>
									@endforeach
								</select>
								@if ($errors->has('lugar'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('lugar') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="fecha" class="col-sm-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

							<div class="col-md-6">
								<input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('fecha') }}" max="3000-12-31"min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required autofocus>

								@if ($errors->has('fecha'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('fecha') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="hora" class="col-sm-4 col-form-label text-md-right">{{ __('Hora') }}</label>
							<div class="col-md-6">
								
								<input style="width: 70px;" class="form-control" type="number" min="00" max="23" name="hora">

								@if ($errors->has('hora'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('hora') }}</strong></span>
									@endif
								</div>
								<label for="minutos" class="col-sm-4 col-form-label text-md-right">{{ __('Minutos') }}</label>
								<div class="col-md-6">

									<input type="number" min="00" max="59" class="form-control" style="width: 70px;" name="minutos">

									@if ($errors->has('minutos'))
									<span class="invalid-feedback" role="alert"></span>
									<strong>{{ $errors->first('minutos') }}</strong>

									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="preNormal" class="col-md-4 col-form-label text-md-right">
								{{ __('Precio normal') }}</label>
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<div class="col-md-5" style="padding:0px;">		
									<input id="preNormal" type="text" class="form-control{{ $errors->has('preNormal') ? ' is-invalid' : '' }}" name="preNormal" required>
									@if ($errors->has('preNormal'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('preNormal') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="preVIP" class="col-md-4 col-form-label text-md-right">
									{{ __('Precio VIP') }}
								</label>
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<div class="col-md-5" style="padding:0px;">		
									<input id="preVIP" placeholder="(puede ser 0)" type="text" class="form-control{{ $errors->has('preVIP') ? ' is-invalid' : '' }}" name="preVIP" required>
									@if ($errors->has('preVIP'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('preVIP') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="foto" class="col-md-4 col-form-label text-md-right">
									{{ __('Foto') }}
								</label>
								<div class="col-md-6" style="padding:0px;">		
									<input id="foto" placeholder="(puede ser 0)" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" required>
									@if ($errors->has('foto'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('foto') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-5">
									<button type="submit" class="btn btn-primary">
										{{ __('Crear evento') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop