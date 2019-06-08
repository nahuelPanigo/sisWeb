<html>
	<head>
		<title> Modificar Propiedad </title>
		@include('estilos')
		 <link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
		<script src="/js/registrarPropiedad.js" type="text/javascript"> </script>
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
		<div class="caja">
		<h1 class="registrar_propiedad_h1"> Modificar Propiedad </h1> <br> <br>
			<form action="{{route('propiedades.update',$propiedad->id)}}" onsubmit="return validarModificacionDePropiedad()" method="POST"> 
				<div class="registrar_propiedad">
				<input type="text" id="nombre" name="name" placeholder="nombre de la propiedad"value="{{$propiedad->name}}"> <br> <br>
				<input type="text" id="descripcion" name="description"placeholder="descripcion" value="{{$propiedad->description}}"><br> <br>
				<input type="text" id="localidad" name="locate" placeholder="localidad" value="{{$propiedad->locate}}"><br> <br>
				</div>
				<input type="submit" value="Modificar propiedad" class="boton_registrar">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
			</div>

		<footer> <p>Gran grupo de programadores</p> </footer>
	</body>
</html>