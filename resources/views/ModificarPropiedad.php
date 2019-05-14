<html>
	<head>
		<title> Modificar Propiedad </title>
		<?php Include("Estilos.php") ?>
		 <link rel="stylesheet" type="text/css" href="css/registrarPropiedad.css">
		<script src="js/registrarPropiedad.js" type="text/javascript"> </script>
	</head>
	<body>
	  <?php Include("Header.php")?>
		<div class="caja">
		<h1 class="registrar_propiedad_h1"> Modificar Propiedad </h1> <br> <br>
			<form action="validarModificacionDePropiedad.php" onsubmit="return validarRegistroDePropiedad()" method="POST">
			<div class="registrar_propiedad">
				<input type="text" id="nombre" name="nombre" placeholder="Nombre de propiedad"> <br> <br>
				<div id="error_nombre"> </div>
				<input type="text" id="descripcion" name="descripcion"placeholder="Descripción"><br> <br>
				<div id="error_descripcion"> </div>
				<input type="text" id="localidad" name="localidad" placeholder="Localidad"><br> <br>
				<div id="error_localidad"> </div>
				Foto: <input type="file" id="foto" name="foto"><br> <br>
				<div id="error_foto"> </div>
				</div>
				<input type="submit" value="Modificar propiedad" class="boton_registrar">
			</form>
		</div>
		<footer> <p>Gran grupo de programadores</p> </footer>
	</body>
</html>