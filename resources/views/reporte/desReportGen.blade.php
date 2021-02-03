@extends('reporte.layout')

@section('content')

<div class="row justify-content-center">
	<div class="col-4" style="margin-top: 20px;text-align: center; margin-bottom: 20px;">
		<img src="img/lcn2.png" style="width: 200px; height: 50px;">
	</div>
	<div class="col-4">
		<caption>GENERADO EL: {{\Carbon\Carbon::now('-0300 UTC')->format('d/m/Y H:i')}}</caption>
		<br>
		<caption>DESCRIPCIÓN: La siguiente tabla muestra todas las asistencias del evento seleccionado.</caption>
		<br>
		<caption>EVENTO: {{$evento->nombre}}</caption>
	</div>
</div>

<br>

<div class="row">
	<div style="text-align: center;" class="col-6">
		<h1>Listado de ASISTENCIAS</h1>
	</div>
</div>

<div class="row justify-content-start">
	<div class="col">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Número DNI</th>
					<th scope="col">Tipo entrada</th>
					<th scope="col">Fecha pago</th>
					<th scope="col">¿Pagado?</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asistencias as $asi)
				<tr>
					<th scope="row">{{$loop->index+1}}</th>
					@foreach($pers as $per)
					@if($per->idPersona == $asi->idPersona)
					<td>{{$per->nombre}}</td>
					<td>{{$per->nroDNI}}</td>
					@endif
					@endforeach
					<td>{{$asi->hasTipo($asi->tipo)}}</td>
					<td>{{\Carbon\Carbon::parse($asi->fechaPago)->format('d/m/Y')}}</td>
					<td>

						<div class="form-check">
							<input @if($asi->pagado == 1) checked @endif type="checkbox" class="form-check-input" id="noPago" disabled>
							<label class="form-check-label" for="noPago">Pago</label>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!--<footer>
	<div style="float: right;">
		<span class="page-number" style="content: counter(page);">Page {PAGE_NUM}</span>
	</div>
</footer>-->

<script type="text/php">
	if ( isset($pdf) ) {
	$font = $fontMetrics->getFont("TimesNewRoman", "regular"); 
	$pdf->page_text(72, 18, "Hoja nº: {PAGE_NUM} de {PAGE_COUNT}", $font, 6, array(0,0,0));
}
</script> 
@stop