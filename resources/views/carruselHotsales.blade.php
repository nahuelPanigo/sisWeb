<style>
    html, body {

      margin: 0;

      padding: 0;

    }



    * {

      box-sizing: border-box;

    }



    .slider {

        width: 50%;

        margin: 100px auto;

    }



    .slick-slide {

      margin: 0px 20px;

    }



    .slick-slide img {

      width: 100%;

    }



    .slick-prev:before,

    .slick-next:before {

      color: black;

    }





    .slick-slide {

      transition: all ease-in-out .3s;

      opacity: .2;

    }

.slick-list {
  height: 130px;
}

    .slick-active {

      opacity: .5;

    }



    .slick-current {

      opacity: 1;

    }
    input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
.hotsales {
  width: 100%;
}
.hotsales .buscador{
      width: 47%;
    height: 0px;
    margin-left: 337px;
    margin-bottom: -40px;
}

  </style>

<div class="hotsales">

  <section class="regular slider">

    <div>

      <img src="/css/imagenes/propiedad3.jpg">

    </div>

    <div>


      <img src="/css/imagenes/propiedad3.jpg">


    </div>

    <div>


      <img src="/css/imagenes/propiedad3.jpg">


    </div>

    <div>


      <img src="/css/imagenes/propiedad3.jpg">


    </div>

    <div>

      <img src="/css/imagenes/propiedad3.jpg">


    </div>

    <div>


      <img src="/css/imagenes/propiedad3.jpg">


    </div>
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


