<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"  method="POST" action="/reservas">
  	{{ csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> Comprar Hot Sale </h1>
		</div>
      <div class="clearfix reservarBoton">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn"> Aceptar </button>
      </div>
    </div>
  </form>
</div>.
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


