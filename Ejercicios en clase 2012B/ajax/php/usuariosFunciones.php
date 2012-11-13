<?php

/**
 * @return array $datos
 * Esta función busca TODOS los usuarios
 */
function listarUsuarios(){
	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	//Creo la consulta
	$mi_query = "select * 
				 from usuario";

	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a una matriz
	if($result -> num_rows >= 1){
		//Por cada fila obtengo un arreglo
		while($fila = $result -> fetch_assoc())
			$datos[] = $fila;
	}
	
	//Regreso la matriz
	return $datos;
}

/**
 * @return array $datos
 * @param int $tipo de usuario
 * Esta función busca los usuarios que coinciden con un tipo
 */
function listarUsuariosPorTipo($tipo){
	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	//Creo la consulta
	$mi_query = "select idusuario, nick
				 from usuario
				 where tipo=$tipo";

	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//Validar que no genere error la consulta
	if($con -> errno){
		$con -> close();
		die("La consulta no ha podido realizarse");
	}

	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a una matriz
	if($result -> num_rows >= 1){
		//Por cada fila obtengo un arreglo
		while($fila = $result -> fetch_assoc())
			$datos[] = $fila;
	}
	
	//Regreso la matriz
	return $datos;
}


/**
 * @param int $id del usuario
 * Elimina un usuario
 */
function eliminarUsuario($id){
	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	//Creo la consulta
	$mi_query = "delete  
				 from usuario
				 where idusuario = $id";

	//Ejecuto mi consulta
	$con -> query($mi_query);

	//Cierro la conexión
	$con -> close();
}

/**
 * @return array $datos del usuario
 * @param int $id del usuario
 *	Obtiene todos los datos de un usuario en especifico
 */
function consultaUsuario($id){
	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	//Creo la consulta
	$mi_query = "select * 
				 from usuario
				 where idusuario=$id";

	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a un arreglo
	if($result -> num_rows == 1)
		$datos = $result -> fetch_array(MYSQLI_ASSOC);

	return $datos;
}
?>
