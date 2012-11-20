<?php
	//Cargar el archivo de funciones
	require_once("usuariosFunciones.php");

	//Recibo la variable
	$tipo = $_REQUEST["tipo"];

	//Limpiar la variable
	if(!preg_match("/[0-9]*/",$tipo))
		die("No se puede procesar");

	//Obtengo los usuarios
	$usuarios = listarUsuariosPorTipo($tipo);

	//echo json_encode($usuarios);

	//Proceso los usuarios y dibujo el select
	echo '<select id="cambiante">';
	if(empty($usuarios))
		echo '<option value=0>No hay usuarios</option>';
	else{
		foreach($usuarios as $fila)
			echo '<option value="',$fila["idusuario"],'">',$fila["nick"],'</option>';
	}
	echo '</select>';

