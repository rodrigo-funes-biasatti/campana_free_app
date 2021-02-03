@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card" style="width: 40vw;">
				<div class="card-header">{{ __('Nuevo Lugar') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('lugar.store') }}" aria-label="{{ __('Nuevo Lugar') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="nombre" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre del lugar') }}</label>
							<div class="col-md-6">
								<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus placeholder="Nombre lugar">

								@if ($errors->has('nombre'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nombre') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="urlMaps" class="col-sm-4 col-form-label text-md-right">{{ __('Url GoogleMaps') }}</label>

							<div class="col-md-6">
								<input id="urlMaps" type="text" class="form-control{{ $errors->has('urlMaps') ? ' is-invalid' : '' }}" name="urlMaps" value="{{ old('urlMaps') }}" required autofocus placeholder="Url">

								@if ($errors->has('urlMaps'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('urlMaps') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="capacidadTotal" class="col-sm-4 col-form-label text-md-right">{{ __('Capacidad Total') }}</label>

							<div class="col-md-6">
								<input id="capacidadTotal" type="text" class="form-control{{ $errors->has('capacidadTotal') ? ' is-invalid' : '' }}" name="capacidadTotal" value="{{ old('capacidadTotal') }}" required autofocus placeholder="Capacidad Total">


								@if ($errors->has('capacidadTotal'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('capacidadTotal') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="libreG" class="col-sm-4 col-form-label text-md-right">{{ __('Libre y Gratuito') }}</label>
							<div class="col-md-1">
								<input id="libreG" type="checkbox" class="form-control{{ $errors->has('libreG') ? ' is-invalid' : '' }}" name="libreG" value="true" autofocus>

								@if ($errors->has('libreG'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('libreG') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="descripcion" class="col-sm-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

							<div class="col-md-6">
								<textarea id="descripcion" type="textarea" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripcion"></textarea>
								@if ($errors->has('descripcion'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('descripcion') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-5">
								<button type="submit" class="btn btn-primary">
									{{ __('Crear lugar') }}
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop