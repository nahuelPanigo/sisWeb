<html>
<head>
  <title> Busqueda </title>
  @include ('estilos')
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/nuevo.css">
  <link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
  <link rel="stylesheet" type="text/css" href="/css/zoom.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/carruselHotsales.css">
  <link rel="stylesheet" type="text/css" href="/css/busqueda.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
  @Include('Header') 
  @if($errors->any())
      <div class="alert alert-danger">
    <ul>  
      @foreach ($errors->all() as $error)
        <li><strong>Danger!</strong> {{ $error }}</li>
      @endforeach
    </ul>
    </div>
    @endif  <h2>Resultados de la busqueda </h2>
    <script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true
});
});

</script>
</head>
<body>
<div class="container">
</div>
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Ver todo  </button>
  <button class="btn" onclick="filterSelection('subastas')"> Subastas </button>
  <button class="btn" onclick="filterSelection('propiedades')"> Propiedades libres </button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="propiedades"> <h1 style="text-align:center"> Propiedades libres </h1> </div>
<div class="row">
	@if($propiedades->first()== null)
	<p class="error"> Lo sentimos! En este momento no hay propiedades </p>
	@endif
	@foreach ($propiedades as $propiedad)
	<div class="column propiedades">
		<div class="card">
			<h3>{{$propiedad->name}}</h3>
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$propiedad -> locate}} </p>
				<p><span class="fas fa-info-circle"></span> {{$propiedad -> description}} </p>
			</div>
			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
			<button class="reserva"  onclick="">Mostrar semanas disponibles</button>
		</div>
	</div>
	@endforeach	
</div>
<div class="subastas"> <h1 style="text-align:center"> Proximas subastas </h1> </div>
<div class="row">
	@if($subastas->first()== null)
	<p class="error"> Lo sentimos! En este momento no hay subastas </p>
	@endif
	@foreach ($subastas as $subasta)
	<div class="column subastas">
		<div class="card">
			<h3>{{$subasta->name($subasta)->name}}</h3>
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$subasta->name($subasta)->locate}} </p>
				<p><span class="far fa-calendar-alt"> {{$subasta->date($subasta)}} </span></p>
			</div>
			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
		</div>
	</div>
	@endforeach
</div>
<!--<div class="row">
  <div class="column subastas">
    <div class="content">
      <img src="/w3images/lights.jpg" alt="Subasta" style="width:100%">
      <h4>Subasta </h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
 @foreach ($propiedades as $propiedad)
  <div class="column propiedades">
    <div class="content">
      <img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" alt="Propiedad" style="width:100%">
      <h4>{{$propiedad->name}}</h4>
      <p>{{$propiedad->locate}}</p>
    </div>
  </div>
@endforeach
</div> 
</div> -->
<script>
filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

<h1 style="text-align:center"> Algunos Hot sales disponibles </h1>
 @Include('carruselHotsales')
</body>
</html>