<html>
<head>
	<title> Modificar usuario </title>
		@include('estilos')
		<link rel="stylesheet" type="text/css" href="/css/registrarUsuario.css">
		<link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
		<script src="/js/validarDatosING2.js" type="text/javascript"> </script>
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
	<h1 class="RU_h1"> Modificar datos del usuario </h1>
	<div class="RU_caja">
		<img src="/css/imagenes/hsh.png">
		<form class="RU_formulario" method="POST" accept-charset="UTF-8" onsubmit="return validar()" action="{{route('users.update',$user-> id)}}">
			@csrf
			<fieldset>
				<div class="input">
					<input type="text" id="nombre" name="name" placeholder="Nombre" value="{{$user->name}}"><br> <br>
					<input type="text" id="apellido" name="secondName" placeholder="Apellido" value="{{$user->secondName}}"><br> <br>
					<input type="text" id="nombre_usuario" name="userName" placeholder="Nombre de usuario" value="{{$user->userName}}"><br> <br>
					<input type="email" id="email" name="mail" placeholder="Email" value="{{$user->mail}}"><br> <br>	
					<input type="password" id="contrasenia" name="password" placeholder="Contraseña" ><br> <br>
					<input type="password" id="contrasenia2"placeholder="Repita la contraseña"><br> <br>
					<input type="number" id="dni" name="dni" placeholder="Ingrese su dni" value="{{$user->dni}}"><br> <br>
					Fecha de nacimiento: <input type="date" name="birthDay" id="fecha" step="1" min="1900-01-01" max="2001-5-23" value="{{$user->birthDay}}" ><br><br>
					<input type="number" id="numero_tarjeta" name="creditCardNumber" placeholder="Ingrese numero de tarjeta" value="{{$user->creditCardNumber}}"><br> <br>
					<input type="number" id="codigo" name="creditCardCode"placeholder="Ingrese codigo de la tarjeta" value="{{$user->creditCardCode}}"><br> <br>
					Vencimiento: <input type="date" id="vencimiento" name="creditCardDate" step="1" min="2019-12-12" value="{{$user->creditCardDate}}"><br> <br>
				</div>
				<input type="submit" value="Modificar" class="boton_registrarse">
			</fieldset>
            <input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</body>
</html>