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



	//Recorro mi arreglo para dibujar la tabla
	echo '<table border="1">';
	echo '<caption>Datos de los usuarios</caption>';
	
	/*Obtener los titulos
	$fila = $usuarios[0];
	$titulos = array_keys($fila);
	echo '<thead><tr>';
	foreach($titulos as $th)
		echo '<th>',$th,'</th>';
	echo '</tr></thead>';
	*/	
	echo '<tbody>';
	
	//Por cada fila
	foreach($usuarios as $fila => $arr){
		echo '<tr>';
		//Todos los campos de cada fila
		foreach($arr as $campo => $valor)
			echo '<td>',$valor,'</td>'; 
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';

	

?>
