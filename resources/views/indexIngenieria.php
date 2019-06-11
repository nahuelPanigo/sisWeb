<html>
<head>
<title> HSH Inicio </title>
<?php Include("estilos.php") ?>

   <link rel="stylesheet" type="text/css" href="/css/imags.css">

   </head>

  <body>  
    <?php Include("Header.blade.php"); ?>
		<div class="main">
		<div class="slides">
			<img src="http://lorempixel.com/output/city-q-c-460-300-5.jpg" alt="">
	<img src="http://lorempixel.com/output/city-q-c-460-300-2.jpg" alt="">
	<img src="http://lorempixel.com/output/city-q-c-460-300-9.jpg" alt="">
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/jquery.slides.js"></script>
	
   	<script>
	$(function(){
  $(".slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 3000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    }
  });
});
	</script>
	</body>
	</html>