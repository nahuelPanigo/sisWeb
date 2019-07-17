
<html>

<head>

  <title>Slick Playground</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="./slick/slick.css">

  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">

  <style type="text/css">

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

</head>

<body>


<div class="hotsales">

<div class="buscador">
<form>
  <input type="text" name="search" placeholder="Search..">
</form>
  </div>
  <section class="regular slider">

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\propiedad1.jpg">

    </div>

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\propiedad2.jpg">

    </div>

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\propiedad3.jpg">

    </div>

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\propiedad4.jpg">

    </div>

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\marbella-1.jpg">

    </div>

    <div>

      <img src="C:\Users\jimen\OneDrive\Documentos\GitHub\sisWeb\public\css\imagenes\large_Modern-Villa-in-Marbella.jpg">

    </div>

  </section>
</div>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

  <script src="./slick/slick.min.js" type="text/javascript" charset="utf-8"></script>

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



</body>

</html>