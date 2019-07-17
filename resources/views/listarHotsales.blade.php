
<html>

<head>

  <title>Slick Playground</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



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
/* Slider */
.slick-slider
{
    position: relative;

    display: block;
    box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
@charset 'UTF-8';
/* Slider */
.slick-loading .slick-list
{
    background: #fff url('./ajax-loader.gif') center center no-repeat;
}

/* Icons */
@font-face
{
    font-family: 'slick';
    font-weight: normal;
    font-style: normal;

    src: url('./fonts/slick.eot');
    src: url('./fonts/slick.eot?#iefix') format('embedded-opentype'), url('./fonts/slick.woff') format('woff'), url('./fonts/slick.ttf') format('truetype'), url('./fonts/slick.svg#slick') format('svg');
}
/* Arrows */
.slick-prev,
.slick-next
{
    font-size: 0;
    line-height: 0;

    position: absolute;
    top: 50%;

    display: block;

    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);

    cursor: pointer;

    color: transparent;
    border: none;
    outline: none;
    background: transparent;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus
{
    color: transparent;
    outline: none;
    background: transparent;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before
{
    opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before
{
    opacity: .25;
}

.slick-prev:before,
.slick-next:before
{
    font-family: 'slick';
    font-size: 20px;
    line-height: 1;

    opacity: .75;
    color: white;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.slick-prev
{
    left: -25px;
}
[dir='rtl'] .slick-prev
{
    right: -25px;
    left: auto;
}
.slick-prev:before
{
    content: '←';
}
[dir='rtl'] .slick-prev:before
{
    content: '→';
}

.slick-next
{
    right: -25px;
}
[dir='rtl'] .slick-next
{
    right: auto;
    left: -25px;
}
.slick-next:before
{
    content: '→';
}
[dir='rtl'] .slick-next:before
{
    content: '←';
}

/* Dots */
.slick-dotted.slick-slider
{
    margin-bottom: 30px;
}

.slick-dots
{
    position: absolute;
    bottom: -25px;

    display: block;

    width: 100%;
    padding: 0;
    margin: 0;

    list-style: none;

    text-align: center;
}
.slick-dots li
{
    position: relative;

    display: inline-block;

    width: 20px;
    height: 20px;
    margin: 0 5px;
    padding: 0;

    cursor: pointer;
}
.slick-dots li button
{
    font-size: 0;
    line-height: 0;

    display: block;

    width: 20px;
    height: 20px;
    padding: 5px;

    cursor: pointer;

    color: transparent;
    border: 0;
    outline: none;
    background: transparent;
}
.slick-dots li button:hover,
.slick-dots li button:focus
{
    outline: none;
}
.slick-dots li button:hover:before,
.slick-dots li button:focus:before
{
    opacity: 1;
}
.slick-dots li button:before
{
    font-family: 'slick';
    font-size: 6px;
    line-height: 20px;

    position: absolute;
    top: 0;
    left: 0;

    width: 20px;
    height: 20px;

    content: '•';
    text-align: center;

    opacity: .25;
    color: black;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button:before
{
    opacity: .75;
    color: black;
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