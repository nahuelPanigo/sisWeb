<?php session_start(); ?>
<html>
	<head>
		<title> Inicio de Sesion </title>
		<link rel="shortcut icon" type="image/x-icon" href="/css/imagenes/hsh.png">
		<link rel="stylesheet" type="text/css" href="/css/IniciarSesion.css">
		 @Include('estilos') 
		<script src="/js/validarDatosING2.js" type="text/javascript"> </script>
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
		@Include ('headerIndex')
	</head>
	<body>
		<div class="alert alert-danger">
		<ul>	
				<li><strong>Danger!</strong> 
					<?php if(isset($_SESSION['errorSesion'])){
						echo $_SESSION['errorSesion'];
						unset($_SESSION['errorSesion']);
					}?>
				</li>
		</ul>
		</div>
	@if($errors->any())
			<div class="alert alert-danger">
		<ul>	
				<li><strong>Danger!</strong> {{ $_SESSION['errorSesion'] }}</li>
		</ul>
		</div>
	@endif	
	<h1 class="IS_h1"> Iniciar Sesion </h1>
	<div class="IS_caja">
		<img src="/css/imagenes/hsh.png">
		<form class="IS_formulario" method="POST" accept-charset="UTF-8" onsubmit="return validarInicioDeSesion()" action="/admin/sesion" enctype="multipart/form-data">
			@csrf
			<fieldset>
			{{ csrf_field() }}
				<div class="input">
					<input type="email" id="email" name="mail" placeholder="Email" value="<?php echo (isset($_SESSION['nombreUsuario']))?  $_SESSION['nombreUsuario']:''?>"><br> <br>
					<div id="error_email"> </div>
					<input type="password" id="contrasenia" name="password" placeholder="Contraseña"><br> <br>
					<div id="error_contrasenia"> </div>
					<?php if(isset($_SESSION['error'])){
					echo $_SESSION['error'];
					unset($_SESSION['error']);
					}
					?>  
				</div>
				<input type="submit" value="Iniciar sesion" class="boton_Iniciar">
			</fieldset>
		</form>
	</div>
	</body>
</html>