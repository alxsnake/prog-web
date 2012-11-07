<?php

	//Nos conectamos a la base de datos
	require_once("bd.inc");
	$conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);

	//Verificar que la conexión no haya generado error
	if ($conexion->connect_error) {
		die('Error de Conexión (' . $conexion->connect_errno . ') '
		        . $conexion->connect_error);
	}

	//Obtener mis variables del formulario
	$nick = $_GET['usuario'];
	$pass = $_GET['md5'];
	$mail = $_GET['mail'];

	//Validar las entradas para evitar inyecciones de sql
	//Usar expresiones regulares y la función de mysqli
	$nick = $conexion -> real_escape_string($nick);
	$pass = $conexion -> real_escape_string($pass);
	$mail = $conexion -> real_escape_string($mail);

	//Creo el query
	$query = "
			insert into 
				usuarios 
			values(nick,correo,pass)
				\"$nick\",
				\"$mail\",
				\"$pass\"
			";

	//Ejecutar el query
	$conexion -> query($query);

	//Cerrar la conexion
	$conexion -> close();

?>
