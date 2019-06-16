<html>
<head>
	<title> Propiedades </title>
	@include ('estilos')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
	<link rel="stylesheet" type="text/css" href="/css/eliminar.css">
	<link rel="stylesheet" type="text/css" href="/css/nuevo.css">
	<link rel="stylesheet" type="text/css" href="/css/zoom.css">
	<meta charset="utf-8">
</head>
<body>
	@Include('Header') 
	
	<h2 style="text-align:center; font-size: 30px;">Propiedades</h2>
	<div class="row">
		@foreach ($propiedades as $propiedad)
		<div class="column">
			<div class="card">
				<h3>{{$propiedad->name}}</h3>
				@Include('submenuPropiedad')
				 @Include('eliminar')
			
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$propiedad -> locate}} </p>
				<p><span class="fas fa-info-circle"></span> {{$propiedad -> description}} </p>
			</div>

			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
		</div>
	</div>
	@endforeach
	</div>
	@include('galeriaDeFotos')
</body>
</html>