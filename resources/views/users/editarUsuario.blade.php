@extends('layouts.layout')

@section('contenido')


@if( session()->has('errorPassword'))
<div class="row justify-content-center">
	<hr>
</div>
<div class="row justify-content-center">
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ session('errorPassword')}}
	</div>
</div>
@endif

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card" style="width: 40vw;">
				<div class="card-header">{{ __('Editar usuario') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('user.update', $u->id) }}" aria-label="{{ __('Editar usuario') }}" enctype="multipart/form-data">
						
						@csrf
						{!! method_field('PUT') !!}

						<div class="form-group row">
							<label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>
							<div class="col-md-6">
								<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="{{ $u->name }}" value="{{ old('username') }}" required autofocus>

								@if ($errors->has('username'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" placeholder="{{ $u->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-sm-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
								@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="confirmPassword" class="col-sm-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

							<div class="col-md-6">
								<input id="confirmPassword" type="password" class="form-control{{ $errors->has('confirmPassword') ? ' is-invalid' : '' }}" name="confirmPassword" value="{{ old('confirmPassword') }}" required>
								@if ($errors->has('confirmPassword'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('confirmPassword') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-5">
								<button onclick="return confirm('¿Confirmás la edición del usuario?');" type="submit" class="btn btn-primary">
									{{ __('Editar usuario') }}
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