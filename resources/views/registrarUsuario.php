<html>
<head>
	<link rel="shortcut icon" type=image/x-icon" href="css/imagenes/hsh.png">
	<link rel="stylesheet" type="text/css" href="css/registrarUsuario.css">
	<script src="js/validarDatosING2.js" type="text/javascript"> </script>
	 <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
</head>
<body>
	<h1 class="RU_h1"> Registrarse </h1>
	<div class="RU_caja">
		<img src="css/imagenes/hsh.png">
		<form class="RU_formulario" method="post" accept-charset="UTF-8" onsubmit="return validar()" action="#">
			<fieldset>
				<div class="input">
					<input type="text" id="nombre"placeholder="Nombre"><br> <br>
					<div id="error_nombre"> </div>
					<input type="text" id="apellido"placeholder="Apellido"><br> <br>
					<div id="error_apellido"> </div>
					<input type="text" id="nombre_usuario"placeholder="Nombre de usuario"><br> <br>
					<div id="error_nombre_usuario"> </div>
					<input type="email" id="email"placeholder="Email"><br> <br>
					<div id="error_email"> </div>
					<input type="password" id="contrasenia"placeholder="Contraseña"><br> <br>
					<div id="error_contrasenia"> </div>
					<input type="password" id="contrasenia2"placeholder="Repita la contraseña"><br> <br>
					<div id="error_contrasenia2"> </div>
					<input type="number" id="dni" placeholder="Ingrese su dni"><br> <br>
					<div id="error_dni"></div>
					Fecha de nacimiento: <input type="date" name="fecha" id="fecha" step="1" min="1900-01-01" max="2001-12-31" ><br><br>
					<div id="error_fecha"> </div>
					<input type="number" id="numero_tarjeta" placeholder="Ingrese numero de tarjeta"><br> <br>
					<div id="error_numero_tarjeta"> </div>
					<input type="number" id="codigo" placeholder="Ingrese codigo de la tarjeta"><br> <br>
					<div id="error_codigo"> </div>
					Vencimiento: <input type="date" id="vencimiento" name="vencimiento" step="1" min="2019-12-12"><br> <br>
				</div>
				<input type="submit" value="registrarse" class="boton_registrarse">
			</fieldset>
		</form>
	</div>
</body>
</html>
		