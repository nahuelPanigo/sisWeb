<html>
	<head>
		<title> Inicio de Sesion </title>
		<link rel="shortcut icon" type=image/x-icon" href="css/imagenes/hsh.png">
		<link rel="stylesheet" type="text/css" href="css/IniciarSesion.css">
		<script src="js/validarInicioSesion.js" type="text/javascript"> </script>
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	</head>
	<body>
	<h1 class="IS_h1"> Iniciar Sesion </h1>
	<div class="IS_caja">
		<img src="css/imagenes/hsh.png">
		<form class="IS_formulario" method="POST" accept-charset="UTF-8" onsubmit="return validarDatos()" action="IndexIngenieria.php">
			<fieldset>
				<div class="input">
					<input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario"><br> <br>
					<input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña"><br> <br>
				</div>
				<input type="submit" value="Iniciar sesion" class="boton_Iniciar">
			</fieldset>
		</form>
	</div>
	</body>
	<!-- este comentario es para que lo vea nahue -->
</html>