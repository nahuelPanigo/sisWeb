<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"  method="POST" action="/reservas">
  	{{ csrf_field()}}
    <div class="container"  style="width: 102%;">
      <h1 style="text-align:center;"> Reservar  </h1>
      <input type="hidden" id="semana"value="" name="date">
      <input type="hidden" name="propiedad_id" id="propiedad_id"value="">
      <div class="clearfix reservarBoton">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtnPuja">Cancelar</button>
        <button type="submit" class="signupbtn"> Aceptar </button>
      </div>
    </div>
  </form>
</div>
<script>
  function mostrarModal(id, semana){
    document.getElementById('propiedad_id').value=id;
    document.getElementById('semana').value=semana;
    document.getElementById('id01').style.display='block';
  }
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


