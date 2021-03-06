<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="/css/imagenes/hsh.png">
	 <link rel="stylesheet" type="text/css" href="/css/headerIndex.css">
	<link rel="stylesheet" type="text/css" href="/css/registrarUsuario.css">
	 @include('estilos') 
	<script src="/js/validarDatosING2.js" type="/text/javascript"> </script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	@include ('headerIndex')
</head>
<body>	
	<h1 class="RU_h1"> Registrarse </h1>
	<div class="RU_caja">
		<img src="/css/imagenes/hsh.png">
		<form class="RU_formulario" method="post" accept-charset="UTF-8" onsubmit="return validar()" action='/admin/users'>
			{{ csrf_field() }}
			<fieldset>
				<div class="input">
					<input type="text" id="nombre" name="name" placeholder="Nombre"value={{old('name')}}><br> <br>
					<input type="text" id="apellido" name="secondName" placeholder="Apellido"value={{old('secondName')}}><br> <br>
					<input type="text" id="nombre_usuario" name="userName" placeholder="Nombre de usuario"value={{old('userName')}}><br> <br>
					<input type="email" id="email" name="mail" placeholder="Email"value={{old('mail')}}><br> <br>
					<input type="password" id="contrasenia" name="password" placeholder="Contraseña"><br> <br>
					<input type="password" id="contrasenia2" name="secondPassword"placeholder="Repita la contraseña"><br> <br>
					<input type="number" id="dni" name="dni" placeholder="Ingrese su dni"value={{old('dni')}}><br> <br>
					Fecha de nacimiento: <input type="date" name="birthDay" id="fecha" step="1" min="1900-01-01" max="2001-5-23" value={{old('birthDay')}} ><br><br>
					<input type="number" id="numero_tarjeta" name="creditCardNumber" placeholder="Ingrese numero de tarjeta"value={{old('creditCardNumber')}}><br> <br>
					<input type="number" id="codigo" name="creditCardCode"placeholder="Ingrese codigo de la tarjeta"value={{old('creditCardCode')}}><br> <br>
					Vencimiento: <input type="date" id="vencimiento" name="creditCardDate" step="1" min="2019-12-12"value={{old('creditCardDate')}}><br> <br>
				</div>
				<input type="submit" value="registrarse" class="boton_registrarse">
			</fieldset>
		</form>
	</div>
</body>
</html>
		