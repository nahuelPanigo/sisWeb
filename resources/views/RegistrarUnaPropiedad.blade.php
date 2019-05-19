<html>
	<head>
		<title> Registrar Propiedad </title>
		@include ('estilos')
		<link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
		<script src="/js/registrarPropiedad.js" type="text/javascript"> </script>
	</head>
	<body>
			@if($errors->any())
			<div class="alert alert-primary" role="alert">
		<ul>	
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		</div>
		@endif
	  @include ('Header')
		<div class="caja">
		<h1 class="registrar_propiedad_h1"> Registrar Propiedad </h1> <br> <br>
			<form  onsubmit="return validarRegistroDePropiedad()" method="post" action='/admin/propiedades'>
				@csrf
			<div class="registrar_propiedad">
				<input type="text" id="nombre" name="name" placeholder="Nombre de propiedad"> <br> <br>
				<div id="error_nombre"> </div>
				<input type="text" id="descripcion" name="description"placeholder="Descripción"><br> <br>
				<div id="error_descripcion"> </div>
				<input type="text" id="localidad" name="locate" placeholder="Localidad"><br> <br>
				<div id="error_localidad"> </div>
				Foto: <input type="file" id="foto" name="archiveName">
				<div id="error_foto"> </div>
				</div>
				<input type="submit" value="Registrar propiedad" class="boton_registrar">
			</form>
		</div>
		<footer> <p>Gran grupo de programadores</p> </footer>
	</body>
</html>