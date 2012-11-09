window.onload = function(){
			oculta('adv_nombre');
			oculta('adv_birthday');
			oculta('adv_direccion');
			oculta('adv_pass');
			oculta('adv_imagen');
			oculta('adv_checks');
			oculta('adv_radios');
         }

		function clearAll(){
			oculta('adv_nombre');
			oculta('adv_birthday');
			oculta('adv_direccion');
			oculta('adv_pass');
			oculta('adv_imagen');
			oculta('adv_checks');
			oculta('adv_radios');
		}
		
		
		function muestra(id){
			if (document.getElementById){ 
				var elemento = document.getElementById(id); 
				elemento.style.display = 'block';
			}
		}
		
		function oculta(id){
			if (document.getElementById){ 
			  var elemento = document.getElementById(id); 
			  elemento.style.display = 'none';
			}
		}
		
		function valida_envia() {

			//checkboxes
			if(!document.contacto.razones1.checked && !document.contacto.razones2.checked && !document.contacto.razones3.checked &&
				!document.contacto.razones4.checked && !document.contacto.razones5.checked){
				muestra('adv_checks');
			  	/*return 0;*/
				
			}
			else{
				
				oculta('adv_checks');
			}
			
			//input file
			if(document.contacto.imagen.value.length==0){
				muestra('adv_imagen');
				/*document.contacto.imagen.focus();
				return 0;*/
			}
			else{
				oculta('adv_imagen');
			}
			
			//password
			var pass1 = document.getElementById("pass").value;
			if(pass1.length == 0 || !(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(pass1))){
				muestra('adv_pass');
				/*document.contacto.pass.focus();
				return 0;*/
			}
	
			else
				oculta('adv_pass');
			
				
			//nombre
			if(document.contacto.nombre.value.length ==' ' || !/([a-zA-Z]\w*){4,12}/.test(document.contacto.nombre.value)){
				muestra('adv_nombre');
			}
			else{
				oculta('adv_nombre');
			}
			
			
			//direccion
			if(document.contacto.dir.value.length==0){
				muestra('adv_direccion');
			}
			
			else
				oculta('adv_direccion');	
			
			
			//telefono
			var i;
			for(i=1; i<=num; i++){
				var telefonoIngresado = document.getElementById('tel'+i).value; 
				if(!validarTelefono(telefonoIngresado)){
			       document.getElementById('advError'+i).style.display = 'block';
			}
			}
			
			function validarTelefono(obj){
				//telefono = document.contacto.phone.value;
				
				valor = parseInt(obj);
				if (isNaN(valor)) {
					return false;
				}
				else if(!(/^\d{8}$/.test(telefono)) || !(/^\(\d{3}\)\s\d{8}$/) || !(/^\+\d{2,3}\s\d{9}$/)){
					return true;	
				}
				
				else{
					return false;
				}
			}
			
			
			
				
			
			//fecha
			
			
			if($( "#datepicker" ).datepicker("getDate") == null){
				muestra('adv_birthday');
			}
			else{
				var fechaArr = $("#datepicker").val().split('-/');
				var dia = fechaArr[0];
				var mes = fechaArr[1];
				var anio = fechaArr[2];
			
				valorFecha = new Date(anio, mes, dia);
			
				if( !isNaN(valorFecha) ) {
	  				muestra('adv_birthday');
				}
				else{
					oculta('adv_birthday');	
				}

			}	
				
			//radiobutton
			opciones = document.getElementsByName("sexo");
			 
			var seleccionado = false;
			for(var i=0; i<opciones.length; i++) {	
			  if(opciones[i].checked) {
			    seleccionado = true;
			    oculta('adv_radios');
			    break;
			  }
			}
			 
			if(!seleccionado) {
			  muestra('adv_radios');
			  return 0;
			}
			
			
			document.contacto.submit(); 
			
		}