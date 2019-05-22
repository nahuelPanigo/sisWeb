
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
<h2 style="text-align:center">Subastas</h2>
@foreach ($subastas as $subasta)
<div class="columns">
  <ul class="price">
    <li class="header">{{$subasta->name($subasta)->name}}</li>
	 <div class="opcAdmin">
	   <a href="#" title="Eliminar Subasta"><span class="far fa-trash-alt"> </span></a>
	 </div>
    <li class="grey">{{"$".$subasta->finalPrice}}</li>
    <li> <span class="far fa-calendar-alt"> {{$subasta->date($subasta)}} </span> </li>
    <li> <span class="fas fa-home"> {{$subasta->name($subasta)->name}} </span></li>
    <li><span class="fas fa-map-marker-alt"> {{$subasta->name($subasta)->locate}}</span></li>
    <li><span class="far fa-clock"></span></li>
    <button onclick="document.getElementById('id01').style.display='block'" >¡ PUJAR !</button>
@Include('Pujar')
  </ul>
</div>
@endforeach
<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Pro</li>
	<div class="opcAdmin">
	<a href="#" title="Eliminar Subasta"><span class="icon-trash"> </span></a>
	
	</div>
    <li class="grey">$ 24.99 </li>
      <li> <span class="icon-calendar"> semana </span> </li>
    <li> <span class="icon-home"> propiedad </span></li>
    <li><span class="icon-location-pin"> ubicacion</span></li>
    <li><span class="icon-stopwatch"> termina</span></li>
    <li class="grey"><a href="#" class="button">¡ PUJAR !</a></li>
  </ul>
</div>

</body>
</html>