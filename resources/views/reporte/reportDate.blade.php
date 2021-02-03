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
		<caption><strong>Descripción:</strong> La siguiente tabla muestra todos los eventos comprendidos en las siguientes fechas:.</caption>
		<br>
		<caption><strong>Desde: </strong> {{\Carbon\Carbon::parse($desde)->format('d/m/Y')}} , <strong>hasta:</strong> {{\Carbon\Carbon::parse($hasta)->format('d/m/Y')}}</caption>
	</div>
</div>

<br>
<canvas id="myChart"></canvas>
<br>


<div class="row">
	<div style="text-align: center;" class="col-6">
		<h1>Listado de <strong>EVENTOS</strong></h1>
	</div>
</div>

<div class="row justify-content-start">
	<div class="col">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre evento</th>
					<th scope="col">Cantidad de Asistencias</th>
					<th scope="col">Fecha</th>
					<th scope="col">Lugar</th>
					<th scope="col">Artista</th>
					<th scope="col">Precio VIP ($)</th>
					<th scope="col">Precio Normal ($)</th>
				</tr>
			</thead>
			<tbody>
				@foreach($es as $e)
				<tr>
					<th scope="row">{{$loop->index+1}}</th>
					<td>{{$e->nombre}}</td>
					<td>{{$e->cA}}</td>
					<td>{{\Carbon\Carbon::parse($e->fecha)->format('d/m/Y')}}</td>
					<td>{{$e->lugar->nombre}}</td>
					<td>{{$e->nombreArtista}}</td>
					<td>{{$e->preNormal}}</td>
					<td>{{$e->preVip}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col">
		<a class="btn btn-danger" href="{{route('reportes')}}"><i class="fas fa-long-arrow-alt-left"></i> Volver</a> 
	</div>
</div>

<script>
	random = function(array) {
		return Math.floor(Math.random()*this.length);
	}
	var colors = ['rgba(255,5,5,1)','rgba(255,130,5,1)','rgba(255,255,5,1)','rgba(130,255,5,1)','rgba()','rgba(120,100,51,1)','rgba(150,100,51,1)','rgba(180,100,51,1)','rgba(210,10,51,1)','rgba(240,100,51,1)','rgba(270,100,51,1)','rgba(300,100,51,1)','rgba(330,100,51)','rgba(330,100,6)'];
	
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data:{
			labels: ['Eventos desde: {{$desde}} hasta: {{$hasta}}'],
			datasets: [@foreach($es as $e){
				label: '{{$e->nombre}}',
				data: [{{$e->cA}}],
				backgroundColor: colors[Math.floor(Math.random()*colors.length)],
				borderWidth:1
			},@endforeach]	
		},
		options: {
			title: {
				display: true,
				text: 'Cantidad de entradas de los EVENTOS.'
			},
			responsive: true,
			legend: {
				position: 'top',
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		},
	});

</script>

@stop