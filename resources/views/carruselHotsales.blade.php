<div class="hotsales2">
  <section class="regular slider">
	@foreach($hotsales as $hotsale)
	@php
		 $semana=$hotsale->devolverSemana($hotsale->semana_id);
		 $propiedad=$semana->devolverDatosPropiedad($semana->propiedad_id) 
	@endphp
    <div class="carrusel" >
      <div class="hotsales2">
      <h1 style="font-size: 16px; color:black;"> Propiedad:  {{$propiedad->name}}</h1>
      <h3 style="font-size: 13px; color: black">Semana:  <span class="far fa-calendar-alt"></span> {{$semana->date}} </h3>
            <h3 style="font-size: 13px; color: black">Precio:   <span class="fas fa-dollar-sign"></span> {{$hotsale -> price}} </h3>
          </div>
      <div >
        <div class="dropdown">
 
           <a class="btn btn-secondary dropdown-toggle"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick=""></a>
  
  <div class="dropdown-menu " aria-labelledby="dropdownMenuLink" >
<div class="card" style="width: 18rem;">
  <div class="card-body">
   <form action="{{route('hotsales.comprar')}}" method="POST" >
      {{ csrf_field()}}
    <input type="hidden" value="{{$hotsale->id}}" id="hotsale_id" name="hotsale_id">
    <a class="card-link"><input type="submit" value="Comprar Hotsale">  </a>
  </form>
  </div>
</div>
  </div>
</div>




          </div>
    
  </div>
	@endforeach

  </section>
</div>
 @Include('comprar')
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({

        dots: true,

        infinite: true,

        slidesToShow: 3,

        slidesToScroll: 3

      });
    });
</script>
