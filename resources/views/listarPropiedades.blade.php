<html>
<head>
	<title> Propiedades </title>
	@include ('estilos')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nuevo.css">
	<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
	<link rel="stylesheet" type="text/css" href="/css/zoom.css">
	<meta charset="utf-8">
</head>
<body>
	@Include('Header') 
	@if($errors->any())
			<div class="alert alert-danger">
		<ul>	
			@foreach ($errors->all() as $error)
				<li><strong>Danger!</strong> {{ $error }}</li>
			@endforeach
		</ul>
		</div>
		@endif	
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
			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
				<button class="reserva"  onclick="document.getElementById('id01').style.display='block'">Reservar</button>
				@include('reserva')
		</div>
	</div>
	@endforeach
	</div>
	@include('galeriaDeFotos')
</body>
</html>