
<html>
<head>
<title> Subastas </title>
@Include('estilos') 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">
<link rel="stylesheet" type="text/css" href="/css/subastas.css">

</head>

<body>
@Include('Header')
<h2 style="text-align:center;font-size: 30px;">Subastas</h2>
@foreach ($subastas as $subasta)
<div class="columns">
  <ul class="price">
    <li class="header">{{$subasta->name($subasta)->name}}</li>
    <li class="grey">{{"$".$subasta->finalPrice}}</li>
    <li> <span class="far fa-calendar-alt"> {{$subasta->date($subasta)}} </span> </li>
    <li> <span class="fas fa-home"> {{$subasta->name($subasta)->name}} </span></li>
    <li><span class="fas fa-map-marker-alt"> {{$subasta->name($subasta)->locate}}</span></li>
    <li><span class="far fa-clock"></span></li>
	@if($subasta->estaActiva($subasta))
	<div class="boton"><button onclick="mostrarModal({{$subasta->id}})"> PUJAR </button></div>
	@else
	<div class="boton inactiva"> Incactiva </div>
	@endif
  </ul>
</div>
@endforeach
@Include('Pujar')
</body>
</html>