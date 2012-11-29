<?php
	session_start();

	if(isset($_SESSION['idusuario'])){
		echo 'Bienvenido ',$_SESSION['usuario'],'<br /><a class=\'boton\' href="php/cerrar_sesion.php">Cerrar sesión</a>';
		/*if(time()-$_SESSION['ultimoacceso'] > asdf)
			header('Location: php/cerrar_sesion.php');
		else
			$_SESSION['ultimoacceso']=time();*/
	}
	else
		echo '<a href="usuarios_formRegistra.php">Iniciar sesión</a>';
?> 
