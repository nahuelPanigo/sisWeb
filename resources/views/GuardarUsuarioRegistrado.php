<?php
//validar los datos como en javaScript
	session_start();
	include("ConexionING.php");
	$link = conectar();
	$consulta = "SELECT mail FROM users WHERE mail ='$_POST[email]'"; 
	$resultado = mysqli_query($link, $consulta); //envia una consulta 
	if(mysqli_num_rows($resultado) ==1){
		$_SESSION['error'] ="el email ingresado ya existe";
		header("Location: registrarUsuario.php");
		exit;
	}else{
		$contrasenia = $_POST[constrasenia];
		$hash = password_hash($contrasenia, PASSWORD_BCRYPT);
		$consulta = "INSERT INTO users (name secondName	userName creditCard	creditCardNumber creditCardCode	creditCardDate	mail	userType	created_at	updated_at) VALUE('$_POST[nombre]','$_POST[apellido]','$_POST[nombre_usuario]', '$_POST[]','$_POST[email]','$hash', '$_POST[foto]')";
		if(mysqli_query($link,$consulta)){	 
		  header("Location: InicioSesion.php");
		  exit;
		}else{
			echo "error al crear el usuario";
		}
	}
?>