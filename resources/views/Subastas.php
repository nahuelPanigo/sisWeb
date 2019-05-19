
<html>
<head>
<title> Subastas </title>
<?php Include("estilos.php") ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
<link rel="stylesheet" type="text/css" href="/css/subastas.css">

</head>

<body>
<?php Include("Header.php") ?>
<h2 style="text-align:center">Subastas</h2>


<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
	<div class="opcAdmin">
	<a href="#" title="Eliminar Subasta"><span class="icon-trash"> </span></a>
	
	</div>
    <li class="grey">$ 9.99 / year</li>
    <li> <span class="icon-calendar"> semana </span> </li>
    <li> <span class="icon-home"> propiedad </span></li>
    <li><span class="icon-location-pin"> ubicacion</span></li>
    <li><span class="icon-stopwatch"> termina</span></li>
    <button onclick="document.getElementById('id01').style.display='block'" >¡ PUJAR !</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1 style="text-align:center;"> ¡ PUJAR !  </h1>
      <p>Por favor para participar en la subasta complete los siguientes datos.</p>
      <hr>
      <label for="email"><b> Monto </b></label>
      <input type="text" placeholder="monto" name="monto" required>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn">¡ PUJAR !</button>
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

  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Pro</li>
	<div class="opcAdmin">
	<a href="#" title="Eliminar Subasta"><span class="icon-trash"> </span></a>
	
	</div>
    <li class="grey">$ 24.99 </li>
      <li> <span class="icon-calendar"> semana </span> </li>
    <li> <span class="icon-home"> propiedad </span></li>
    <li><span class="icon-location-pin"> ubicacion</span></li>
    <li><span class="icon-stopwatch"> termina</span></li>
    <li class="grey"><a href="#" class="button">¡ PUJAR !</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
 
    <li class="header">Premium</li>
	 <div class="opcAdmin">
	<a href="#" title="Eliminar Subasta"><span class="icon-trash"> </span></a>

	</div>
    <li class="grey">$ 49.99 </li>
       <li> <span class="icon-calendar"> semana </span> </li>
    <li> <span class="icon-home"> propiedad </span></li>
    <li><span class="icon-location-pin"> ubicacion</span></li>
    <li><span class="icon-stopwatch"> termina</span></li>
    <li class="grey"><a href="#" class="button">¡ PUJAR !</a></li>
  </ul>
</div>

</body>
</html>