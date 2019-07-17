<html>
<head>
<title> HSH Inicio </title>
@Include('estilos')

   <link rel="stylesheet" type="text/css" href="/css/imags.css">

   </head>

  <body>  
    @Include('Header')
	@php use sisWeb\Hotsale ;$hotsales = Hotsale::where('user_id','=',NULL)->get() @endphp
	<h1 class="cartel" style="font-size: 30px;"> Ultimos hotsales </h1>
	<div class="main">
		<div class="slides">
			@foreach  ($hotsales as $hotsale)
				@php
					$semana=$hotsale->devolverSemana($hotsale->semana_id);
					$propiedad=$semana->devolverDatosPropiedad($semana->propiedad_id) 
				@endphp
				<div>
					<div class="hotsales">
						<h1> Propiedad:  {{$propiedad->name}}</h1>
						<h3>Precio:   <span class="fas fa-dollar-sign"></span> {{$hotsale -> price}} </h3>
					</div>
					<a href="">
						<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick=""alt="">
					</a>
				</div>
			@endforeach
		</div>
	</div>

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