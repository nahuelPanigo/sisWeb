function tieneNumeros(texto){
	var numeros="0123456789";
	for (i=0; i< texto.length; i++){
		 if (numeros.indexOf(texto.charAt(i),0)!=-1){
           return true;
	     }
	}
	return false;
}
function validarNombre(){
	var aux = document.getElementById("nombre").value;
    if(aux == ""){
		document.getElementById("error_nombre").innerHTML = "El nombre no puede ser vacío";
		return false;
	 }else if ( tieneNumeros(aux)) {
		document.getElementById("error_nombre").innerHTML = "El nombre contiene numeros";
		return false;
	} 
	document.getElementById("error_nombre").innerHTML ="";
	return true;
}
function validarApellido(){
	var aux = document.getElementById("apellido").value;
    if(aux == ""){
		document.getElementById("error_apellido").innerHTML = "El apellido no puede ser vacío";
		return false;
	 }else if ( tieneNumeros(aux)) {
		document.getElementById("error_apellido").innerHTML = "El apellido contiene numeros";
		return false;
	} 
	document.getElementById("error_apellido").innerHTML ="";
	return true;
}
function validarEmail(){
	var aux = document.getElementById("email").value;
    if(aux == ""){
		document.getElementById("error_email").innerHTML = "El email no puede ser vacío";
		return false;
}
	document.getElementById("error_email").innerHTML ="";
	return true;
}
function tiene6Caracteres(texto){
	if (texto.length < 6){
		return false;
	}
	return true;
}	
function validarNombre_usuario(){
	var aux = document.getElementById("nombre_usuario").value;
    if(aux == ""){
		document.getElementById("error_nombre_usuario").innerHTML = "El nombre de usuario no puede ser vacío";
		return false;
	 }
	 else if (!tiene6Caracteres(aux)) {
		document.getElementById("error_nombre_usuario").innerHTML = "El nombre de usuario debe contener al menos 6 caracteres";
	   return false;
	 }
	document.getElementById("error_nombre_usuario").innerHTML ="";
	return true;
}
function contraseniasIguales(aux){
	var contrasenia1 = document.getElementById("contrasenia").value;
	if( aux == contrasenia1 ){
		return true;
	}
	return false;
}
function validarContra(){
	var aux = document.getElementById("contrasenia2").value;
    if(aux == ""){
		document.getElementById("error_contrasenia2").innerHTML = "ingrese segunda contrasenia";
		return false;
	 }else if ( !contraseniasIguales(aux)) {
		document.getElementById("error_contrasenia2").innerHTML = "Las contrasenias no coinciden";
		return false;
	} 
	document.getElementById("error_contrasenia2").innerHTML ="";
	return true;
}
function validarContrasenia(){
	var contrasenia = document.getElementById("contrasenia").value;
			if(contrasenia.length >= 6){		
				var mayuscula = false;
				var minuscula = false;
				var numeroOSimbolo = false;
				for(var i = 0;i<contrasenia.length;i++){
					if(contrasenia.charCodeAt(i) >= 65 && contrasenia.charCodeAt(i) <= 90){
						mayuscula = true;
					}
					else if(contrasenia.charCodeAt(i) >= 97 && contrasenia.charCodeAt(i) <= 122){
						minuscula = true;
					}
				    else if(contrasenia.charCodeAt(i) >= 48 && contrasenia.charCodeAt(i) <= 57){
						numeroOSimbolo = true;
					}
					else{
						numeroOSimbolo = true;
					}
				}
				if(mayuscula == true && minuscula == true && numeroOSimbolo == true ){
					document.getElementById("error_contrasenia").innerHTML = "";
					return true;
				}else if (!mayuscula){
					document.getElementById("error_contrasenia").innerHTML = "La contrasenia debe contener al menos una mayuscula";
		            return false;
				}else if(!minuscula){
					document.getElementById("error_contrasenia").innerHTML = "La contrasenia debe contener al menos una minuscula";
		            return false;
				}else {
					document.getElementById("error_contrasenia").innerHTML = "La contrasenia debe contener al menos un simbolo o un numero";
		            return false;
				}	
			}else {
			  document.getElementById("error_contrasenia").innerHTML = "La contrasenia debe tener 6 caracteres minimo";
		      return false;
			}
	return false;
}
function validarFormatoFecha(campo) {
      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if ((RegExPattern.test(campo)) && (campo!='')) {
            return true;
      } 
            return false;
      }
}

function validarFecha(){
var fecha = document.getElementById("fecha").value;
	if(!validarFormatoFecha(fecha)){
      /*if(existeFecha(fecha)){
            document.getElementById("error_fecha").innerHTML= "La fecha introducida es correcta.";
			return false;
      }else{
            document.getElementById("error_fecha").innerHTML = "La fecha introducida no existe.";
			return false;
      }
}else{*/
      document.getElementById("error_fecha").innerHTML = " formato de la fecha es incorrecto.";
	  return false;
	}
document.getElementById("error_fecha").innerHTML = "";
return true;
}
function validarDni(){
	var dni = document.getElementById("dni").value;
	if(dni == ""){
		document.getElementById("error_dni").innerHTML = "Ingrese dni";
		return false;
  }
  document.getElementById("error_dni").innerHTML = "";
  return true;
}
function validarNumeroTarjeta(){
	var num = document.getElementById("numero_tarjeta").value;
	alert(num);
	if(num =="") {
		document.getElementById("error_numero_tarjeta").innerHTML = "Ingrese numero de tarjeta";
		return false;
	}
	document.getElementById("error_numero_tarjeta").innerHTML ="";
	return true;
}
function validarCodigo(){
	var num = document.getElementById("codigo").value;
	alert(num);
	if(num =="") {
		document.getElementById("error_codigo").innerHTML = "Ingrese codigo";
		return false;
	}
	document.getElementById("error_codigo").innerHTML ="";
	return true;
}
function validar(){
	if(!validarNombre()){
	  return false;
	}
		if(!validarApellido()){
	  return false;
	}
	if(!validarNombre_usuario()){
	  return false;
	}
		if(!validarEmail()){
	  return false;
	}
		
	if(!validarContrasenia()){
	  return false;
	}
	if(!validarContra()){
	  return false;
	}
	if (!validarDni()){
		return false;
	}
	if (!validarFecha()){
		return false;
	}
	if (!validarNumeroTarjeta()){
		return false;
	}
	if(!validarCodigo()){
		return false;
	}
	if(!validarVencimiento()){
		return false;
	}
	return true;

}