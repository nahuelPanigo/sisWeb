<html>
	<head>
		<title> Modificar Propiedad </title>
		@include('estilos')
		 <link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
		<script src="/js/modificarPropiedad.js" type="text/javascript"> </script>
	</head>
	<body>
	  @Include('Header')
		<div class="caja">
		<h1 class="registrar_propiedad_h1"> Modificar Propiedad </h1> <br> <br>
			<form action="{{route('propiedades.update',$propiedad)}}" onsubmit="return validarRegistroDePropiedad()" method="PUT"> 
				<div class="registrar_propiedad">
				<input type="text" id="nombre" name="name" placeholder="nombre de la propiedad"value="{{$propiedad->name}}"> <br> <br>
				<div id="error_nombre"> </div>
				<input type="text" id="descripcion" name="description"placeholder="descripcion" value="{{$propiedad->description}}"><br> <br>
				<div id="error_descripcion"> </div>
				
				<input type="text" id="localidad" name="locate" placeholder="localidad" value="{{$propiedad->locate}}"><br> <br>
				<div id="error_localidad"> </div>
				</div>
				    
				<input type="submit" value="Modificar propiedad" class="boton_registrar">
				
			</form>
			</div>

		<footer> <p>Gran grupo de programadores</p> </footer>
	</body>
</html>