<?php

	//Nos conectamos a la base de datos
	require_once("bd.inc");
	$conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);

	//Verificar que la conexión no haya generado error
	if ($conexion->connect_error)
		die('Por el momento no hay acceso a la base de datos');

	//Obtener mis variables del formulario
	$nick = $_REQUEST['usuario'];
	$pass = $_REQUEST['cont'];

	//Validar las entradas para evitar inyecciones de sql
	//Usar expresiones regulares y la función de mysqli
	$nick = $conexion -> real_escape_string($nick);
	$pass = $conexion -> real_escape_string($pass);

	//Creo el query
	$query = "SELECT
				idusuario, nick
			  FROM
				usuario
			  WHERE 
				nick like '$nick' 
			  AND
				password like '$pass'";

	//Ejecutar el query
	$resultado = $conexion -> query($query);

	//Verificar que la conexión no haya generado error
	if ($conexion->errno)
		die('No se pudo realizar la consulta');

	//Si obtuve un único resultado lo convierto en arreglo
	if($resultado -> num_rows == 1)
		$usuario = $resultado -> fetch_assoc();
	else
		header('Location: '.$_SERVER["HTTP_REFERER"].'?status=1');

	//Crea o carga una sesión
	session_start();

	//Creo mi variable para definir sesión
	$_SESSION['idusuario']=$usuario['idusuario'];
	$_SESSION['usuario']=$usuario['nick'];
	$_SESSION['hrainicio']=time();

	header('Location: ../index.php');

?>
