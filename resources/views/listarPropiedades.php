
<html>
<head>
<title> Propiedades </title>
<?php Include("estilos.php") ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/nuevo.css">
<link rel="stylesheet" type="text/css" href="/css/zoom.css">

</head>

<body>
<?php Include("Header.php") ?>
<script src="/js/menu.js"></script>
<h2 style="text-align:center;">Propiedades</h2>
<div class="row">
<?php Include("submenu.php") ?>
	   <h3>Propiedad 1</h3>
	  <div class="datos">
      <p><span class="fas fa-map-marker-alt"></span> Villa La Angustura, Argentina </p>
      <p><span class="fas fa-info-circle"></span> una casa muy linda con 3 ambientes, 2 banios , hermosa vista xd </p>
		</div>
	 <img src="/css/imagenes/propiedad4.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
	</div>
  </div>

  <?php Include("submenu.php") ?>
      <h3>Propiedad 2</h3>
	  <div class="datos">
       <p><span class="fas fa-map-marker-alt"></span> Ubicacion</p>
      <p><span class="fas fa-info-circle"></span> Descripcion</p>
		 </div>
		 <img src="/css/imagenes/propiedad1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
   </div>
  </div>
  
    <?php Include("submenu.php") ?>
      <h3>Propiedad 3</h3>
	   <div class="datos">
       <p><span class="fas fa-map-marker-alt"></span> Ubicacion</p>
      <p><span class="fas fa-info-circle"></span> Descripcion</p>
		</div>
	<img src="/css/imagenes/propiedad2.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
	</div>
  </div>
  
  <?php Include("submenu.php") ?>
      <h3>Propiedad 4</h3>
	   <div class="datos">
     <p><span class="fas fa-map-marker-alt"></span> Ubicacion</p>
      <p><span class="fas fa-info-circle"></span> Descripcion</p>
    </div>
	 <img src="/css/imagenes/propiedad3.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
	 </div>
  </div>

    <?php Include("submenu.php") ?>
      <h3>Propiedad 4</h3>
	   <div class="datos">
    <p><span class="fas fa-map-marker-alt"></span> Ubicacion</p>
      <p><span class="fas fa-info-circle"></span> Descripcion</p>
    </div>
	 <img src="/css/imagenes/propiedad3.jpg"onclick="openModal();currentSlide(1)" class="hover-shadow cursor"></div>
  </div>
</div>
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="/css/imagenes/propiedad1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="/css/imagenes/propiedad2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="/css/imagenes/propiedad3.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="/css/imagenes/propiedad4.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="css/imagenes/propiedad1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
    </div>
    <div class="column">
      <img class="demo cursor" src="css/imagenes/propiedad2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
    </div>
    <div class="column">
      <img class="demo cursor" src="css/imagenes/propiedad3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="css/imagenes/propiedad4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
  </div>
</div>

<script
src="/js/zoom.js">
</script>

</body>
</html>