<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/subastas/finalizar" method="POST" >
    {{csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> Confirmar finalizacion</h1>
      <input type="hidden" value="" id="subastaID" name="subasta_id">
      <div class="clearfix">
        <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtnPuja">Cancelar</button>
        <button type="submit" class="signupbtn ">Finalizar</button>
      </div>
    </div>
  </form>
</div>

<script>
  function mostrarModal(id){
    document.getElementById('subastaID').value=id;
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