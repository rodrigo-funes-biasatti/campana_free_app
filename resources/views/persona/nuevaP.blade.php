@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card" style="width: 40vw;">
				<div class="card-header">{{ __('Nuevo registro') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('persona.store') }}" aria-label="{{ __('Nueva persona') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="nroDNI" class="col-sm-4 col-form-label text-md-right">{{ __('Nro. documento') }}</label>
							<div class="col-md-6">
								<input id="nroDNI" type="text" class="form-control{{ $errors->has('nroDNI') ? ' is-invalid' : '' }}" name="nroDNI" value="{{ old('nroDNI') }}" placeholder="Número de DNI" required autofocus>

								@if ($errors->has('nroDNI'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nroDNI') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="nombre" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre y apellido') }}</label>

							<div class="col-md-6">
								<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre y apellido" required autofocus>

								@if ($errors->has('nombre'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nombre') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="fechaNac" class="col-sm-4 col-form-label text-md-right">{{ __('Fecha nacimiento') }}</label>
							<div class="col-md-6">
								<input id="fechaNac" type="date" class="form-control{{ $errors->has('fechaNac') ? ' is-invalid' : '' }}" name="fechaNac" value="{{ old('fechaNac') }}" max="2500-12-31"min="1800-01-01" required autofocus>

								@if ($errors->has('fechaNac'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('fechaNac') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

								@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="direccion" class="col-sm-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
							<div class="col-md-6">
								<input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" placeholder="Direccion (hogar)" required autofocus>

								@if ($errors->has('direccion'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('direccion') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-5">
								<button type="submit" class="btn btn-primary">
									{{ __('Registrarse') }}
								</button>
							</div>
						</div>
						<br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop