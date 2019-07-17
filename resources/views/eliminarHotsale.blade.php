<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"  method="POST" action="{{route('hotsales.delete')}}">
  	{{ csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> ¿Está seguro que quiere eliminar el hotsale? </h1>
		</div>
      <div class="clearfix reservarBoton">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtnPuja">Cancelar</button>
		<input type="hidden" value="" id="hotsale_id" name="hotsale_id">
        <button type="submit" class="signupbtn boton"> Aceptar </button>
      </div>
    </div>
  </form>
</div>.
<script>
// Get the modal
function mostrarModal(id){
				document.getElementById('hotsale_id').value= id;
				document.getElementById('id01').style.display='block';
			}
var modal = document.getElementById('id01');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>