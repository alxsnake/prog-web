<?php

//Se define el tamaño que se permitirá (en KB por eso lo multiplicamos por 1024)
$tamanioPermitido = 200 * 1024;

//Tenemos una lista con las extensiones que aceptaremos
$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");

//Obtenemos la extensión del archivo
$extension = end(explode(".", $_FILES["file"]["name"]));


//Validamos el tipo de archivo, el tamaño en bytes y que la extensión sea válida
if ((($_FILES["file"]["type"] == "image/gif")
   || ($_FILES["file"]["type"] == "image/jpeg")
   || ($_FILES["file"]["type"] == "image/png")
   || ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < $tamanioPermitido)
&& in_array($extension, $extensionesPermitidas))
{
  //Si no hubo un error al subir el archivo temporalmente
  if ($_FILES["file"]["error"] > 0)
  {
     echo "Código de error: " . $_FILES["file"]["error"] . "<br />";
  }
  else
  {
    //Si el archivo ya existe se muestra el mensaje de error
    if (file_exists("/upload/" . $_FILES["file"]["name"]))
    {
       echo $_FILES["file"]["name"] . " ya existe. ";
    }
    else
    {
		$rutaDestino = getcwd().'/uploads/'.$_FILES["file"]["name"];
        //Se mueve el archivo de su ruta temporal a una ruta establecida
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$rutaDestino))
        	echo "Archivo guardado";
		else
			echo 'Problema con la movida';
    }
  }
}
else
{
  echo "Archivo inválido";
}
?>
