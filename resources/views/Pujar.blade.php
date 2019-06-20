<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="{{route('pujas.store')}}" method="POST">
    {{csrf_field()}}
    <div class="container">
      <h1 style="text-align:center;"> ¡ PUJAR !  </h1>
      <p>Por favor para participar en la subasta complete los siguientes datos.</p>
      <hr>
      
      <input type="hidden" name="user_id" value="session('id')">
      <label for="email"><b> Monto </b></label>
      <input type="number" placeholder="monto" name="monto" required>
      <input type="hidden" value="" id="subastaID" name="subasta_id">
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn">? PUJAR !</button>
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