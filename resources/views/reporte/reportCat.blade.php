@extends('reporte.layout')

@section('content')

<div class="row justify-content-center">
	<div class="col-4" style="margin-top: 20px;text-align: center; margin-bottom: 20px;">
		<a href="{{ url('/') }}">
			<img src="/img/lcn2.png" style="width: 200px; height: 50px;">
		</a>
	</div>
	<div class="col-4">
		<caption><strong>Generado el:</strong> {{\Carbon\Carbon::now('-0300 UTC')->format('d/m/Y H:i')}}</caption>
		<br>
		<caption><strong>Descripción:</strong> La siguiente tabla muestra todas las asistencias del evento seleccionado dependiendo su categoría (Normal/VIP).</caption>
		<br>
		<caption><strong>EVENTO:</strong> {{$e->nombre}}</caption>
		<br>
		<caption><strong>Categoría:</strong> @if($cat == 0) NORMAL @else VIP @endif</caption>
	</div>
</div>

<br>
<canvas id="myChart"></canvas>
<br>

<div class="row">
	<div style="text-align: center;" class="col-6">
		<h1>Listado de ASISTENCIAS <strong>@if($cat == 0) NORMAL @else VIP @endif</strong></h1>
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
					<th scope="col">Fecha pago</th>
					<th scope="col">¿Pagado?</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asis as $asi)
				<tr>
					<th scope="row">{{$loop->index+1}}</th>
					@foreach($pers as $per)
					@if($per->idPersona == $asi->idPersona)
					<td>{{$per->nombre}}</td>
					<td>{{$per->nroDNI}}</td>
					@endif
					@endforeach
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

<div style="text-align: center; margin-bottom: 30px;">
	<form action="{{route('descCatRep')}}" method="POST">
		<a class="btn btn-danger" href="{{route('reportes')}}"><i class="fas fa-long-arrow-alt-left"></i> Volver</a> 
		@csrf
		<input type="hidden" name="eventoCategoria" value="{{$e->idEvento}}">
		<input type="hidden" name="categoria" value="{{$cat}}">
		<button type="submit" class="btn btn-success"><i class="fas fa-download"></i> Generar tabla como .pdf</button>
	</form>
</div>

<script>

	var ctx = document.getElementById('myChart').getContext('2d');

	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Normal", "VIP",],
			datasets: [{
				data: [@if($cat == 0) {{$count}} @else {{$total - $count}} @endif,
				@if($cat == 1) {{$count}} @else {{$total - $count}} @endif],
				backgroundColor: [
				'rgba(245, 249, 0, 1)',
				'rgba(16, 207, 20, 1)'
				],
				borderWidth: 1
			},]
		},
		options: {
			title:{
				display: true,
				text: 'Cantidad TOTAL de entredas: {{$total}}'
			},
			responsive:true,
			legend:{
				position: 'top'
			}

		},
	});

	</script>
	@stop