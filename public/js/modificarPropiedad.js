function validarRegistroDePropiedad(){
	var nombre= document.getElementById('nombre').value;
	var descripcion= document.getElementById('descripcion').value;
	var localidad= document.getElementById('localidad').value;
	if( nombre=="" || descripcion=="" || localidad==""){
		alert("Debe completar todos los campos");
		return false;
   }
   return true;
}