<?php

	//Cargar el archivo de funciones
	require_once("usuariosFunciones.php");

	//Limpiar las entradas
	$id = $_GET["id"];

	//Ejecutar la función que obtiene
	//los datos de los usuarios
	eliminarUsuario($id);

	header("Location: ".$_SERVER["HTTP_REFERER"]);

?>
