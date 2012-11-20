<?php
	session_start();

	if(isset($_SESSION['idusuario']))
		echo 'Bienvenido ',$_SESSION['usuario'],'<br /><a href="php/cerrar_sesion.php">Cerrar sesión</a>';
	else
		echo '<a href="usuarios_formRegistra.php">Iniciar sesión</a>';
?> 
