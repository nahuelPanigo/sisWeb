<html>
<head>
<title> HSH Inicio </title>
@Include('estilos')

   <link rel="stylesheet" type="text/css" href="/css/imags.css">

   </head>

  <body>  
    @Include('Header')
    @if($errors->any())
      <div class="alert alert-danger">
    <ul>  
      @foreach ($errors->all() as $error)
      <li><strong>Solicitud no enviada</strong> {{ $error }}</li>
      @endforeach
    </ul>
    </div>
    @endif
		<div class="main">
		<div class="slides">
	 <img src="/css/imagenes/propiedad3.jpg" alt="">
  <img src="/css/imagenes/propiedad2.jpg" alt="">
  <img src="/css/imagenes/propiedad1.jpg" alt="">
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