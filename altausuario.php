<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Alta usuario</title>
 <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<?php

//Conexión
include 'conexion.php';
$conn = conectando();

$err = 0;

session_start();

if ($_SESSION['estado']==0){
	header("Location: login.php");
}


if ($_SESSION['alta']==1){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
	if ($_POST['pass']){
		$pass = md5($_POST['pass']);	
	}
	else {
		$pass = "";
		$err = 1;
	}

	if ($nombre) {
		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
			$err = 1;
		}
	} else{
		$err = 1;
	}

	if ($apaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$err = 1;
		}
	} else{
		$err = 1;
	}
	if ($amaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$err = 1;
		}
	}
	if (!$usuario) {
			$err = 1;
	}
	if (!$pass) {
			$err = 1;
	}

	//Insertar datos a db si no hubo errores en caso contrario indicar el error
	if ($err == 0) {
		//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
		$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,usuario,contrasenia) VALUES ('$nombre','$apaterno','$amaterno','$usuario','$pass')");
		//Ejecutar query llamando la variable de conexiòn a la bd
		$process = pg_query($conn, $query);
		//Informar si la query se ejecuto o no
		if  (!$process) {
		   $_SESSION['bd']=1;
		}
		else {
		   $_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;

	}
	//Cerrar la conexion a la bd
	pg_close($conn);
	$_SESSION['estado']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");

}
