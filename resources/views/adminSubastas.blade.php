
<html>
<head>
<title> Subastas </title>
@Include('estilos') 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/subastas.css">
<link rel="stylesheet" type="text/css" href="/css/datosPuja.css">

</head>

<body>
@Include('adminHeader')
<h2 style="text-align:center;font-size: 30px;">Subastas</h2>
@foreach ($subastas as $subasta)
<div class="columns">
  <ul class="price">
    <li class="header">{{$subasta->name($subasta)->name}} <button onclick="mostrarModal2({{$subasta->id}})" class="boton_cancelar"> <span class="fas fa-trash-alt"></span> </button></li>
    <li class="grey">{{"$".$subasta->finalPrice}}</li>
    <li> <span class="far fa-calendar-alt"> {{$subasta->date($subasta)}} </span> </li>
    <li> <span class="fas fa-home"> {{$subasta->name($subasta)->name}} </span></li>
    <li><span class="fas fa-map-marker-alt"> {{$subasta->name($subasta)->locate}}</span></li>
    <li><span class="far fa-clock"></span></li>
	@if($subasta->finish == 1)
		<div class="boton inactiva finalizada" style="margin-left:160px;"> Finalizada </div>
	@else
		@if($subasta->puedeFinalizar2($subasta))
			<div class="boton" style="margin-left:160px;"> <button onclick="mostrarModal({{$subasta->id}})" > Finalizar</button> </div>
		@else	
			<div class="boton inactiva" style="margin-left:160px;"> Incactiva/subasta </div>
		@endif
	@endif
  </ul>
  @Include('FinalizarSubasta')
</div>
@endforeach
@Include('eliminarSubasta')

</body>
</html>