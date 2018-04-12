

<!DOCTYPE html>
<html lang="es">

<head>
<<title>formulario login</title>
 <meta charset="utf-8">
 <link rel="stylesheet" href="css/estilos.css">
 <link rel="stylesheet" href="css/footer.css">
</head>
<?php
//Se reinicia la sesión para evitar acceso no autorizado
session_start();

if (isset($_SESSION['estado'])){// verificar que la sesion no sea nula

	$_SESSION['estado']=0;
	
	//Se revisa si no hubo un error en el usuario y contraseña anteriormente o la consulta a la bd
	if ($_SESSION['error']==1){
		echo "<div style='color:red'>Usuario o contraseña invalido </div>";
		$_SESSION['error']=0;
	}
	else if ($_SESSION['error']==2){
		echo "<div style='color:red'>Error al acceder a la base de datos </div>";
	}
}
?>
<body>
<div class="cabecera">
	<h2>Iniciar sesión</h2>
</div>

<div class="contenido">

<form action="autenticar.php" method="post">
	<h3>Ingrese los siguientes datos</h3>
	<label class="etiquetas" for="usuario">Usuario: <input type="text" name="usuario" autocomplete="off"><br><br>
	<label class="etiquetas" for="contrasenia">Contraseña: <input type="password" name="contrasenia" autocomplete="off"><br><br>
	<input type="submit" value="Ingresar">
</form>
</div>
</body>
<div class="footer">
	<h2>Créditos</h2>

	
	<p>Autor: Edgar Paskinel Reséndiz Camacho</p>
	<p id="fecha">Fecha: 11/04/2018</p>

	<a href="login.php">Regresa a inicio de sesión</a>

</div>

</html>