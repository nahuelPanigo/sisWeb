<html>
	<head>
		<title> Registrar Propiedad </title>
		@include ('estilos')
		<link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
		<script src="/js/registrarPropiedad.js" type="text/javascript"> </script>
		<meta charset="utf-8">
   		 <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	</head>
	<body>
	  @include ('adminHeader')
	  @if($errors->any())
			<div class="alert alert-danger">
		<ul>	
			@foreach ($errors->all() as $error)
				<li><strong>Atencion!</strong> {{ $error }}</li>
			@endforeach
		</ul>
		</div>
		@endif
		<div class="caja">
		<h1 class="registrar_propiedad_h1"> Registrar Propiedad </h1> <br> <br>
			<form  onsubmit="return validarRegistroDePropiedad()" method="post" action="/admin/propiedades" enctype="multipart/form-data">
				@csrf
				<div class="registrar_propiedad">
				<input type="text" id="nombre" name="name" placeholder="Nombre de propiedad" value="{{old('name')}}" autocomplete="off"> <br> <br>
				<input type="text" id="descripcion" name="description"placeholder="Descripción" value="{{old('description')}}" autocomplete="off"><br> <br>
				<input type="text" id="localidad" name="locate" placeholder="Localidad" value="{{old('locate')}}" autocomplete="off"><br> <br>
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