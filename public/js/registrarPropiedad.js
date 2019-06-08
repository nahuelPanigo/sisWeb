function validarRegistroDePropiedad(){
	var nombre= document.getElementById('nombre').value;
	var descripcion= document.getElementById('descripcion').value;
	var localidad= document.getElementById('localidad').value;
	var foto= document.getElementById('foto').value;
	if( nombre=="" || descripcion=="" || localidad=="" || foto ==""){
		alert("Debe completar todos los campos");
		return false;
   }
   if(nombre > 20 || nombre < 2){
	   alert("el nombre debe tener entre 2 y 20 digitos");
	   return false;
   }
   return true;
}
function validarModificacionDePropiedad(){
	var nombre= document.getElementById('nombre').value;
	var descripcion= document.getElementById('descripcion').value;
	var localidad= document.getElementById('localidad').value;
	if( nombre=="" || descripcion=="" || localidad==""){
		alert("Debe completar todos los campos");
		return false;
   }
    if(nombre > 20 || nombre < 2){
	   alert("el nombre debe tener entre 2 y 20 digitos");
	   return false;
	}
   return true;
}