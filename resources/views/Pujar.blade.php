<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="{{route('pujas.store')}}">
    <div class="container">
      <h1 style="text-align:center;"> ¡ PUJAR !  </h1>
      <p>Por favor para participar en la subasta complete los siguientes datos.</p>
      <hr>
      <label for="email"><b> Monto </b></label>
      <input type="text" placeholder="monto" name="monto" required>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn">? PUJAR !</button>
      </div>
    </div>
  </form>
</div>

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