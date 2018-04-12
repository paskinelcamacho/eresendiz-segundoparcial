<?php
//Declarar funcion que devuelva la conexion a la bd
function conectando(){
	$conn = pg_connect("host=127.0.0.1 port=5432 dbname=segundoexamenbd user=usuario_admin password=paskinel");
	return $conn;
}
?>
