/* Crea el objeto AJAX. Funcion generica para cualquier utilidad de este tipo*/
function nuevoAjax()
{
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}


function cargaUsuarios(){
	//Obtengo del formulario el campo del tipo de usuario
	//para poder hacer la consulta filtrada
	tipoUsuario = document.getElementById("tipoUsuario").value;

	// Creo el nuevo objeto AJAX
	var ajax=nuevoAjax();

	//Mando a abrir en el servidor el archivo de php que
	//consulta la lista de usuario
	ajax.open("GET", "php/listarUsuarios.php?tipo="+tipoUsuario, true);

	//Acciones para los distintos estados de mi conexión
	//ajax
	ajax.onreadystatechange=function() 
	{ 
		if (ajax.readyState==4)
		{
			document.getElementById("extra").outerHTML = ajax.responseText;
		} 
	}

	ajax.send(null);
}
