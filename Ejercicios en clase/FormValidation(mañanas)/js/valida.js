function validaCorreo(mail,){
    asdfasdfa
    adsfasd
    adsfads
}


function validaForm(){
    //validar el nick
    if(document.registro.nickname.value=='' || !/([a-zA-Z]\w*){6,12}/.test(document.registro.nickname.value))
        document.getElementById("error_nick").style.display='block';
    else
        document.getElementById("error_nick").style.display='none';
        
    //validar el correo
    if(document.registro.mail.value==''){
        document.getElementById("error_mail").style.display='block';
        document.getElementById("mail").class='input_error';
    }
    else
        document.getElementById("error_mail").style.display='none';
        
    //validar el password
    if(document.registro.pass.value=='' || !/\w{6,8}/.test(document.registro.pass.value))
        document.getElementById("error_pass").style.display='block';
    else
        document.getElementById("error_pass").style.display='none';
        
    //validar que sean iguales
    if(document.registro.pass.value!=document.registro.pass2.value)
        document.getElementById("error_conf").style.display='block';
    else
        document.getElementById("error_conf").style.display='none';
        
    document.registro.enviar.click();
}
