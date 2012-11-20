function buscarUsuariosPorTipo(){
	//Obtener el tipo de usuario seleccionado en el combo
	var select_tipoU = document.getElementById("tipoUsuario");
	var tipoU = select_tipoU.value;

	//Creo el ajax
	var ajax = nuevoAjax();

	//Lo mando al servidor
	ajax.open("GET","php/listaUsuarios.php?tipo="+tipoU,true);

	//Si la accion se completo
	ajax.onreadystatechange=function() 
	{ 
		if (ajax.readyState==4)
		{
			//alert(ajax.responseText);
			document.getElementById("cambiante").outerHTML = ajax.responseText;
		} 
	}

	//Terminamos la conexion ajax
	ajax.send(null);
}



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
