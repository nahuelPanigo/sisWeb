<?php 	
	session_start();
	include("ConexionBD.php");
	$link = conectar();
	$_SESSION['mail'] = $_POST['mail'];
	$consulta = "SELECT * WHERE mail = '$_POST[mail]'  and password='$_POST[password]'  "; 
	$resultado = mysqli_query($link, $consulta); 
	if(mysqli_num_rows($resultado)==1){
		$_SESSION['user'] = mysqli_fetch_array ($resultado); 
		header("Location: IndexIngenieria.php");
		exit;
	}else{
		$_SESSION['error'] ="El nombre de usuario y contrasenia son incorrectos";
		header("Location: IniciarSesion.php");
		exit;
	}
?>