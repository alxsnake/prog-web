<?php
	//Porque la maestra dijo
	session_start();

	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	//Obtengo mis variables a utilizar
	$id_usr = $_REQUEST["id_usuario"];

	//Limpio las variables
	$id_usr = $con -> real_escape_string($id_usr);

	//Creo la consulta
	$mi_query = "select * 
				 from usuario
				 where idusuario=$id_usr";

	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a un arreglo
	if($result -> num_rows == 1)
		$datos = $result -> fetch_array(MYSQLI_ASSOC);
	
	//Porque la maestra dijo
	$_SESSION["datos"] = $datos;

	//Me voy a la página del formulario que falta completar
	header("Location: ../usuario_completa.php");
?>
