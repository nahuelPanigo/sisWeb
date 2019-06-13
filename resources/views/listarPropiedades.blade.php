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
	<script src="/js/menu.js"></script>
		<form action="{{ route('reservas.store')}}" method="post" >
			fecha: <input type="date" name="date" >
			<input type="hidden" name="propiedad_id" value="1">
			<input type="submit" value="Reservar">
		</form>
	<h2 style="text-align:center;">Propiedades</h2>
	<div class="row">
		@foreach ($propiedades as $propiedad)
		<div class="column">
			<div class="card">
				 <button onclick="document.getElementById('id01').style.display='block'"> <span class="far fa-trash-alt"></span> </button>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link"><span><i class="fas fa-bars"></i></span></a>
				<nav class="submenu">
					<ul class="submenu-items">
                    <li class="submenu-item"><a href="{{ route('propiedades.edit',$propiedad->id)}}" class="submenu-link"><span class="fas fa-pencil-alt"></span> Editar Propiedad </a></li>
					<li class="submenu-item"><a href="{{route('admin.propiedades.delete',$propiedad->id)}}" class="submenu-link"><span class="far fa-trash-alt"></span> Eliminar Propiedad </a></li>
					 <li class="submenu-item"><hr class="submenu-seperator" /></li>
					<li class="submenu-item"><a href="{{route('categorias.subastas.create',$propiedad->id)}}" class="submenu-link"><span class="far fa-flag"></span> Subastar </a></li>
					<li class="submenu-item"><a href="#" class="submenu-link"><span class="fas fa-thumbtack"></span> Hot Sale </a></li>
					</ul>
				</nav>
				<script src="/js/menu.js"></script>
			</div>
			<h3>{{$propiedad->name}}</h3>
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