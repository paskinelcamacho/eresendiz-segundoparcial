<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Alta autor</title>
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
	header("Location: login.php"); //Redireccionando
}

if ($_SESSION['alta']==1){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);

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
	if ($nacionalidad) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nacionalidad)) {
			$err = 1;
		}
	} else{
		$err = 1;
	}


	//Insertar registro en la BD 
	if ($err == 0) {
		//Asignar query a variable 
		$query = ("INSERT INTO autores (nombre,apaterno,amaterno,nacionalidad) VALUES ('$nombre','$apaterno','$amaterno','$nacionalidad')");
		//Ejecutar query 
		$process = pg_query($conn, $query);
		
		if  (!$process) {
		   $_SESSION['bd']=1;
		}
		else {
		   $_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;

	}
	//Cerrar conexion
	pg_close($conn);
	$_SESSION['estado']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");//Redireccionando
} 
?>
</body>
</html>
