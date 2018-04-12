<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="css/estilos.css">
 <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<h1> Alta de Libros</h1>

<div>
<FORM ACTION="altalibro.php" METHOD="post">
<label class="etiquetas" for="titulo">Titulo:</label> <input class="cajas" type="text" size=36 name="titulo"></input><br/>
<label class="etiquetas" for="autor">Autor:</label> <input class="cajas" type="text" size=36 name="autor"></input><br/>
<label class="etiquetas" for="anio">Año de publicación:</label> <input class="cajas" type="text" size=36 name="anio"></input><br/>


<INPUT type="submit" value="Enviar">
</div>
</FORM>
<div class="footer">
	<h2>Créditos</h2>

	
	<p>Autor: Edgar Paskinel Reséndiz Camacho</p>
	<p id="fecha">Fecha: 11/04/2018</p>

	<a href="login.php">Regresa a inicio de sesión</a>

</div>
</body>
</html>