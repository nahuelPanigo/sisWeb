<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"  method="POST" action="{{ route('admin.subastas.delete')}}">
    	{{ csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> Eliminar subastas </h1>
		</div>
      <div style="margin-left:280px;"class="clearfix reservarBoton">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtnPuja">Cancelar</button>
		<input type="hidden" value="" id="subasta_id" name="subasta_id">
        <button type="submit" class="signupbtn"> Aceptar </button>
      </div>
    </div>
  </form>
</div>.
<script>

function mostrarModal2(id){
				document.getElementById('subasta_id').value= id;
				document.getElementById('id02').style.display='block';
			}
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
