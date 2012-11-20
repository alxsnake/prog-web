<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="description" content="Creacion de Usuario" />
	<meta name="author" content="usuario" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<title>Creación de Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
  	<script type="text/javascript" src="js/validacion.js"></script>
    </head>
	<body>
<?php
	if($_REQUEST['status']==1):
?>
	<div id="error" class="div_error">El usuario y/o contraseña no coinciden</div>
<?php
	endif;
?>
		<h3>Login</h3>
		<form name="formulario" method="get" action="php/usuariosLogin.php" accept-charset="utf-8">
		<fieldset>
			<legend>Proceso para login</legend>
			<div>
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="usuario" required  placeholder="Escribe tu 					usuario"/>
			</div>
			<div>
				<label for="cont">Contraseña</label>
				<input type="password" id="cont" name="cont" />
			</div>
			
		<br />
			<button type="submit">Enviar</button>
			</fieldset>
		</form>
	</body>
</html>
