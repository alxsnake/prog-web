<?php
	//Cargar el archivo de funciones
	require_once("php/usuariosFunciones.php");

	//Ejecutar la función que obtiene
	//los datos de los usuarios
	$usuarios = listarUsuarios();
	
	//Recorro mi arreglo para dibujar la tabla
	echo '<table border="1">';
	echo '<caption>Datos de los usuarios</caption>';
	
	//Obtener los titulos
	$fila = $usuarios[0];
	$titulos = array_keys($fila);
	echo '<thead><tr>';
	foreach($titulos as $th)
		echo '<th>',$th,'</th>';
	echo '</tr></thead>';
		
	echo '<tbody>';
	
	//Por cada fila
	foreach($usuarios as $fila => $arr){
		echo '<tr>';
		//Todos los campos de cada fila
		foreach($arr as $campo => $valor){
			if($campo == 'idusuario'){
				//Una opción es generar un link y mandar el id por get			
				//La otra opción es un form				
				echo '<td>
					  <a href="php/usuarioEliminar.php?id=',$valor,'">
						<img src="img/eliminar.png" />
					  </a>
					  <form action="usuarios_formEdita.php" method="post">
						<input type="hidden" name="id" value="',$valor,'" />
						<input type="image" src="img/editar.png" />
					  </form>
					  </td>';
				//En lugar de brincar dos veces para editar como en la linea de abajo,
				//puedo buscar directo en el archivo del formulario como en la linea de arriba
				//<form action="php/usuarioEditar.php" method="post">
			}
			else
				echo '<td>',$valor,'</td>'; 
		}
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';

?>
