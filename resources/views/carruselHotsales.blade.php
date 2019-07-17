<div class="hotsales">
  <section class="regular slider">
	@foreach($hotsales as $hotsale)
	@php
		 $semana=$hotsale->devolverSemana($hotsale->semana_id);
		 $propiedad=$semana->devolverDatosPropiedad($semana->propiedad_id) 
	@endphp
    <div>
      <img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}">
    </div>
	@endforeach
  </section>
</div>
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
