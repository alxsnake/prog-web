<?php
	//Porque la maestra dijo
	session_start();

	//Obtener los datos
	$usuarios = $_SESSION["datos"];

	//Borro el dato de la sesion
	unset($_SESSION["datos"]);
	
	echo '<pre>'; 
	print_r($usuarios);
	echo '<pre>';




	//Recorro mi arreglo para llenar el select
	echo '<select>';
	echo '<option value="0">Selecciona una opcion</option>';
	//Por cada fila
	foreach($usuarios as $fila => $arr)
		echo '<option value="',$arr['idusuario'],'">',$arr['nick'],'</option>';
	echo '</select>';
?>
