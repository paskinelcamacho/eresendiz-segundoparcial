<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/footer.css">
<title>Menu</title>
</head>
<body>
<div class="header">
<h2>Menu</h2>
</div>

<div class="contenido">
<?php
session_start();
if ($_SESSION['estado']==1) {
	if ($_SESSION['bd']==1){
		echo "<font color="red">No se pudo realizar el registro<br><br></font>";
		$_SESSION['bd']=0;
	}
	else if ($_SESSION['bd']==2){
		echo "<font color="green">El registro se ha realizado exitosamente<br><br></font>";
<?php
		$_SESSION['bd']=0;
	}
	?>
	<ul>
		<li><a href="alta_usuario.php">Usuarios</a></li>
		<li><a href="alta_autor.php">Autores</a></li>
		<li><a href="alta_libro.php">Libros</a></li>
	</ul>	
</div>
<div class="footer">
        <h2>Créditos</h2>


        <p>Autor: Edgar Paskinel Reséndiz Camacho</p>
        <p id="fecha">Fecha: 11/04/2018</p>

        <a href="login.php">Regresa a inicio de sesión</a>

</div>
	
	
	<?php
}
else{
	header("Location: login.php");
}
?>
</body>
</html>
