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
				@if((old('name'))==null)
					<input type="text" id="nombre" name="name" placeholder="nombre de la propiedad" value="{{$propiedad->name}}"> <br> <br>
				@else
					<input type="text" id="nombre" name="name" placeholder="nombre de la propiedad" value="{{old('name')}}"> <br> <br>
				@endif
				@if((old('description'))==null)
					<input type="text" id="description" name="description" placeholder="descripcion de la propiedad" value="{{$propiedad->description}}"> <br> <br>
				@else
					<input type="text" id="description" name="description" placeholder="descripcion de la propiedad" value="{{old('description')}}"> <br> <br>
				@endif
				@if((old('locate'))==null)
					<input type="text" id="locate" name="locate" placeholder="localidad" value="{{$propiedad->locate}}"> <br> <br>
				@else
					<input type="text" id="locate" name="locate" placeholder="localidad" value="{{old('locate')}}"> <br> <br>
				@endif
				</div>
				<input type="submit" value="Modificar propiedad" class="boton_registrar">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
			</div>

		<footer> <p>Gran grupo de programadores</p> </footer>
	</body>
</html>