@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div class="card" style="width: 35vw;">
				<div class="card-header">{{ __('Nueva asistencia') }}</div>

				<div class="card-body">
					<form method="get" action="{{ route('asistencia.buscarDni') }}" aria-label="{{ __('Nueva asistencia') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="nroDni" class="col-sm-4 col-form-label text-md-right">{{ __('Numero de DNI') }}</label>
							<div class="col-md-6">
								<input id="nroDni" type="text" class="form-control{{ $errors->has('nroDni') ? ' is-invalid' : '' }}" name="nroDni" placeholder="DNI" required autofocus>

								@if ($errors->has('nroDni'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nroDni') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="offset-md-5">
								<button type="submit" class="btn btn-primary">
									{{ __('Buscar') }}
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