<?php
	session_start();

	//Cargar el archivo de funciones
	require_once("usuariosFunciones.php");

	//Limpiar las entradas
	$id = $_REQUEST["id"];

	//Ejecutar la función que obtiene
	//los datos de los usuarios
	$_SESSION["datos"] = consultaUsuario($id);

	header("Location: ../usuario_edita.php");

?>
