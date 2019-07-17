<html>
<head>
  <title> Busqueda </title>
  @include ('estilos')
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/nuevo.css">
  <link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
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
 <h2>Resultados de la busqueda </h2>
    <script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true
});
});
</script>
</head>
<body>
<div class="container" style="width: 0px;">
</div>
<div id="myBtnContainer" style="    width: 350px;
    height: 45px;
    background: #989696;">
  <button class="btn active" style="margin:5px;"onclick="filterSelection('all')"> Ver todo  </button>
  <button class="btn" style="margin:5px;" onclick="filterSelection('subastas')"> Subastas </button>
  <button class="btn" style="margin:5px;" onclick="filterSelection('propiedades')"> Propiedades libres </button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="propiedades"> <h1 style="text-align:center"> Propiedades libres </h1> </div>
<div class="row">
	@if($propiedades->first()== null)
	<p class="error"> Lo sentimos! En este momento no hay propiedades </p>
	@endif
	@foreach ($propiedades as $elemento)
	<div class="column propiedades">
		<div class="card">
			<h3>{{$elemento->propiedad->name}}</h3>
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$elemento->propiedad -> locate}} </p>
				<p><span class="fas fa-info-circle"></span> {{$elemento->propiedad -> description}} </p>
			</div>
			<img src="{{str_replace('public/', '/storage/', $elemento->propiedad->images()->first()->archiveName)}}"  class="hover-shadow cursor">
		
    <div class="fechasDisponibles" style="margin-top:27px;">
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#{{$elemento->propiedad->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
    Ver semanas disponibles
  </a>


</p>
<div class="collapse" id="{{$elemento->propiedad->id}}">
  <div class="card card-body">
   <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Comienzo semana</th>
      <th scope="col">Reservar</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($elemento->fechas as $semana )
    <tr>
     
      <th scope="row"> <span class="far fa-calendar-alt">  </span></th>
      <td>{{$semana}}</td>
      <td><button  style="    background: white;
    color: black;
    border-radius: 6px;" onclick="mostrarModal({{$elemento->propiedad->id, $semana}})">Reservar</button></td>      
    </tr>
    @endforeach
   @include('reservar2')
  </tbody>
</table>
  </div>
</div>
</div>
</div>
	</div>
	@endforeach	
</div>
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
      <img src="{{str_replace('public/', '/storage/', $subasta->name($subasta)->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
    </div>
  </div>
  @endforeach 
</div>
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
<div class="hotsales">
<h1 style="text-align:center"> Algunos Hot sales disponibles </h1>
 @Include('carruselHotsales')
</div>
</div>
</body>
</html>