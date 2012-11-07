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
	if ($_GET["status"]==1)
		echo 'Felicidades, has sido registrado';
?>
		<h3>Registro de Nuevo Usuario</h3>
		<p>Bienvenido a nuestra página, llena el siguiente formulario para que quedes registrado</p><br />
		<form name="formulario" method="get" action="php/registraUsuario.php" accept-charset="utf-8">
		<fieldset>
			<legend>Datos de Registro</legend>
			<div>
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="usuario" required  placeholder="Escribe tu 					usuario"/>
			</div>
			<div id="error_usuario" class="div_error">
				<p>Campo obligatorio debe contener letras y numéros mínimo 6 máximo 12 caracteres</p>
			</div>
			<div>
				<label for="mail">Correo</label>
				<input type="email" id="mail" name="mail" required placeholder="Ejemplo@hotmail.com"/>
			</div>
			<div id="error_mail" class="div_error">
				<p>Campo obligatorio con formato usuario@dominio.com</p>
			</div>
			<div>
				<label for="cont">Contraseña</label>
				<input type="password" id="cont" name="cont" />
			</div>
			<div id="error_cont" class="div_error">
				<p>Campo obligatorio de mínimo 6 y máximo 8 caracteres</p>
			</div>
			<div>
				<label for="conf">Confirma tu contraseña</label>
				<input type="password" id="conf" name="conf"/>
			</div>
			<div id="error_conf" class="div_error">
				<p>Las contraseñas no coinciden, verifica tu contraseña</p>
			</div>
		</fieldset><br />
			<p>Da click en el botón para terminar el registro</p><br />
			<input type="hidden" name="md5" id="md5"/>
			<button type="button" onclick="validaForm()">Registrar</button>
			<button type="submit" id="enviar" name="enviar" style="display:none">Enviar</button>
		</form>
	</body>
</html>
