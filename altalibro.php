<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Alta libro</title>
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
else if ($_SESSION['alta']==3){
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$autor = $_POST['autor'];
	$anyo = $_POST['anio'];

	if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$titulo)){
			echo "Error: Titulo invalido<br>";
			$err = 1;
	}

	//Insertar registro en la BD 
	if ($err == 0) {
		//Asignar query 
		$query = ("INSERT INTO libros (titulo,id_autor,año) VALUES ('$titulo','$autor','$anyo')");
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
	//Cerrar la conexion a la bd
	pg_close($conn);
	$_SESSION['estado']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");
}
//Llega externo
else if ($_SESSION['alta']==0){
	$_SESSION['estado']=0;
	header("Location: login.php");
}
}
?>
</body>
</html>