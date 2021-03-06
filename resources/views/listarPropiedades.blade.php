<html>
<head>
	<title> Propiedades </title>
	@include ('estilos')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nuevo.css">
	<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
	<meta charset="utf-8">
</head>
<body>
	@Include('Header') 
	<h2 style="text-align:center; font-size: 30px;">Propiedades</h2>
	<div class="row">
		@if($propiedades->first()== null)
		<p class="error"> Lo sentimos! En este momento no hay propiedades </p>
		@endif
		@foreach ($propiedades as $propiedad)
		<div class="column">
			<div class="card">
			<h3>{{$propiedad->name}}</h3>
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$propiedad -> locate}} </p>
				<p><span class="fas fa-info-circle"></span> {{$propiedad -> description}} </p>
			</div>
			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" class="hover-shadow cursor">
			<button class="reserva"  onclick="mostrarModal({{$propiedad->id}})">Reservar</button>
		</div>
	</div>
	@endforeach
	@include('reserva')
	</div>
</body>
</html>