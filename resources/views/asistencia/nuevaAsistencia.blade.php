@extends('layouts.layout')

@section('contenido')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card" style="width: 50vw;">
				<div class="card-header">{{ __('Nueva asistencia') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('asistencia.store') }}" aria-label="{{ __('Nueva asistencia') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="evento" class="col-sm-4 col-form-label text-md-right">{{ __('Evento') }}</label>
							<div class="col-md-6">
								<input id="evento" type="text" class="form-control{{ $errors->has('evento') ? ' is-invalid' : '' }}" name="evento" placeholder="{{$even->nombre}}" required autofocus readonly>
								<input type="hidden" name="idEvento" value="{{$even->idEvento}}">

								@if ($errors->has('evento'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('evento') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="nomPer" class="col-sm-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

							<div class="col-md-6">
								<input id="nomPer" type="text" class="form-control{{ $errors->has('nomPer') ? ' is-invalid' : '' }}" name="nomPer" placeholder="{{$pers->nombre}}" required autofocus readonly>
								<input type="hidden" name="nroDNI" value="{{$pers->nroDNI}}">

								@if ($errors->has('nomPer'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nomPer') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label style="padding-right: 30px;" for="tipos" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
							<div style="padding-left: 35px;" class="tipos" >
								<input class="form-check-input" type="radio" name="tipo" id="tipoNorm" value="0" checked>
								<label style="width: 200px;" class="form-check-label" for="tipoNorm">
									Entrada normal (${{$even->preNormal}})
								</label>
								<div class=" tipos">
									<input class="form-check-input" type="radio" name="tipo" id="tipoVip" value="1">
									<label  style="width: 190px;" class="form-check-label" for="tipoVip">
										Entrada VIP (${{$even->preVip}})
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="fechaPago" class="col-sm-4 col-form-label text-md-right">{{ __('Fecha pago') }}</label>
							<div class="col-md-6">
								<input id="fechaPago" type="date" class="form-control{{ $errors->has('fechaPago') ? ' is-invalid' : '' }}" name="fechaPago" value="{{ old('fechaPago') }}" max="{{$even->fecha}}"min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required autofocus>

								@if ($errors->has('fechaPago'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('fechaPago') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row justify-content-center">
							<label class="col-form-label text-md-right"><strong>IMPORTANTE:</strong> Al registraste se te generará un código con el cuál podras realizar algunas acciones. Recuerda guardarlo antes de recargar la página o redirigirte!</label>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-5">
								<button type="submit" class="btn btn-primary">
									{{ __('Registrar') }}
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