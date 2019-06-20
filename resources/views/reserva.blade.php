<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"  method="POST" action="/reservas">
  	{{ csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> Reservar  </h1>
      <p>Ingrese la semana de la fecha que quiere reservar.</p>
      <hr>
      <input type="hidden" name="propiedad_id" value="{{$propiedad->id}}">
	  <div class="datePicker">
			@Include('calendarpicker')
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


