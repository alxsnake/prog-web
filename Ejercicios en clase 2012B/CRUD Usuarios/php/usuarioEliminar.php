<?php

	//Cargar el archivo de funciones
	require_once("usuariosFunciones.php");

	//Limpiar las entradas
	$id = $_GET["id"];

	//Si el id es un número, elimino, sino, POS NO

	//Ejecutar la función que obtiene
	//los datos de los usuarios
	eliminarUsuario($id);

	header("Location: ".$_SERVER["HTTP_REFERER"]);

?>
