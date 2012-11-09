<?php
	//Cargar el archivo de funciones
	require_once("php/usuariosFunciones.php");

	//Limpiar las entradas
	$id = $_REQUEST["id"];
	if(!isset($id))
		die("No se puede editar un usuario sin conocer su id");
	
	preg_match("",$id);

	//Si el id no es valido, no hago la busqueda

	//Ejecutar la función que obtiene
	//los datos de los usuarios
	$usuario = consultaUsuario($id);
	
	//Obtener los datos, para escribir menos en el form
	$nick = $usuario["nick"];
	$email = $usuario["email"];
	$razones = $usuario["razon_registro"];
	$image = $usuario["path_image"];
	
if(isset($usuario)):
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Formulario de completar registro de usuario</title>
		<script type="text/javascript" src="js/validacion6.js"></script>
		<link type="text/css" href="css/start/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
		<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>
        <noscript>Tu browser no soporta javaScript</noscript>
        <link href="css/completarRegistro.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    	<div id='wrapper'>
    		<div id='contenido'>
        <h1>Formulario de completar registro de usuario</h1>
		<form method="post" name="contacto" action="php/usuarioEditar.php" >
		
		<!-- este input es para tener el id al momento de hacer el update -->		
		<input type="hidden" name="idusuario" value="<?= $id; ?>" />

		<fieldset>
		<legend>Usuario y Correo</legend>
			<label id="nombre_u">Nick de usuario</label>
			<input class="form_inputs" type="text" disabled="disabled" id="nombre_Us" name="nombre_Us" value="<?= $nick; ?>"/><br />
			<label for="mail">Correo</label>
			<input class="form_inputs" type="email" disabled="disabled" id="mail" name="mail" value="<?= $email; ?>"/>
		</fieldset>
	
	<fieldset id="checkboxes">
		<legend>Razones</legend>
		<label class="error" id="adv_checks">Seleccione al menos una opción</label>
		<p id="razon">¿Porqué desea registrarse en la página?</p>
<?php
//Aqui debes meter las validaciones por cada checkbox para
//saber si ira con la propiedad  checked
?>
		<input type="checkbox" name="razones1" value="1">Me gusta
		<br>
		<input type="checkbox" name="razones2" value="2">Me interesa los temas que tratan
		<br>
		<input type="checkbox" name="razones3" value="3">Me la recomendaron 
		<br>
		<input type="checkbox" name="razones4" value="4">Quiero comentar en un foro
		<br>
		<input type="checkbox" name="razones5" value="5">Me interesa subir información
		<br> 
	</fieldset>
     <fieldset id="avatar-Pass">
     <legend>Avatar y password</legend>
     	<label class="error" id="adv_imagen">Seleccione una imagen</label>
   		<input id="imagen" name="cargarImagen" type="file" accept="image/*" required="required" /><br />
		<img src="<?= $image ?>" alt="" />
   		<label for="pass">Contraseña</label>
   		<label class="error" id="adv_pass">Ingrese contraseña(min 6. Ejem. Hola66)</label>
		<input class="form_inputs" type="password" id="pass" name="pass" required="required"/>
	  </fieldset>
  	  

  <fieldset id="formularioUsuario">
  <legend>Ingresar datos de contacto</legend>
 	<label for="nombre_c">Nombre Completo</label>
 	<label class="error" id="adv_nombre">Ingrese un nombre (min 4)</label>
	<input class="form_inputs" type="text" id="nombre" name="nombre" required="required"  />
	<label for="direccion">Dirección</label>
	<label class="error" id="adv_direccion">Ingrese una dirección</label>
	<input class="form_inputs"type="text" id="dir" name="dir" required="required" /> 
	<label for="phone">Teléfono</label>
	<label class="error" id="adv_phone">Ingrese un teléfono valido</label>
	<input class="form_inputs" type="tel" id="phone" name="phone"  /> <br />
	<label for="direccion">Fecha de Nacimiento</label>
	<label class="error" id="adv_birthday">Ingrese una fecha valida</label> <br /> 
	<input type="text" id="datepicker" class="calendario">
 </fieldset>
 <br /> 
 <label class="error" id="adv_radios">Seleccione una radio</label>
 <label for="sexoLabel">Sexo</label>
 
 <fieldset id="cajaRadios">
	<input class="radios" type="radio" name="sexo" value="Hombre" />Hombre
	<input class="radios" type="radio" name="sexo" value="Mujer" />Mujer
</fieldset>

	<button type="submit" value="enviar" hidden="hidden">Enviar</button>
	<button type="reset" onclick="clearAll()">Limpiar</button>

</form>
<button type="submit" onclick="valida_envia()">Enviar</button>
</div>
</div>
    </body>
</html>
<?php
endif;//en caso de no haber usuario
?>
