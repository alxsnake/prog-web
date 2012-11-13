<?php
	//Cargo el archivo de funciones
	require_once("usuariosFunciones.php");

	$tipo = $_REQUEST["tipo"];
	
	//Limpiar la variable

	//Ejecuto la función que obtiene los usuarios
	$usuarios = listarUsuariosPorTipo($tipo);	

	//Proceso el arreglo dibujando el select
	echo '<select name="usuario">';
	if (!$usuarios)
		echo '<option value="0">No hay usuarios</option>';
	else{
		foreach($usuarios as $fila)
			echo '<option value=',$fila["idusuario"],'>',$fila["nick"],'</option>';
	}
	echo '</select>';

?>
