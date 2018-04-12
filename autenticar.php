
<!DOCTYPE html>
<html lang="es">
<head>
<<title>Creditos</title>
 <meta charset="utf-8">
 <link rel="stylesheet" href="css/footer.css">
</head>
<body>
	<div>
		<?php
//Incluir conexiòn

include 'conexion.php';

$conn = conectando();


if ($_SESSION['estado']==0){
	header("Location: login.php"); //redirige al usuario
}

//Qutar caracteres especiales
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$password = md5($_POST['contrasenia']);

//Imprimir datos
echo "Usuario: ".$usuario;
echo "<br>Contraseña: ".$password;

//Asignar resultado del query a la variable
 $query = ("SELECT contrasenia FROM usuarios WHERE usuario = '$usuario'");

//Ejecutar query 
$process = pg_query($conn, $query);
//Redirige a la pagina login.php en caso de que la conexion falle
if  (!$process) {
	$_SESSION['error']=2;
	header("Location: login.php");
}
else {
	//Compara la contraseña
	$resultado = pg_fetch_result($process, 0, 0);
	if ($resultado == $password){
		//Redirige a la pagina menu.php cuando la contraseña es correcta
		session_start();
		$_SESSION['estado']=1;
		header("Location: menu.php");
	}
	else {
		session_start();
		$_SESSION['error']=1;
		header("Location: login.php");
	}
}

//Cerrar la conexion a la bd
pg_close($conn);
?>
</div>
<div class="footer">
	<h2>Créditos</h2>

	
	<p>Autor: Edgar Paskinel Reséndiz Camacho</p>
	<p id="fecha">Fecha: 11/04/2018</p>

	<a href="login.php">Regresa a inicio de sesión</a>

</div>

</body>