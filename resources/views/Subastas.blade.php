
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
     @if($errors->any())
      <div class="alert alert-danger">
    <ul>  
      @foreach ($errors->all() as $error)
        <li><strong>Danger!</strong> {{ $error }}</li>
      @endforeach
    </ul>
    </div>
    @endif
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
    <button onclick="mostrarModal({{$subasta->id}})" class="boton" > PUJAR </button>
@Include('Pujar')
  </ul>
</div>
@endforeach
</body>
</html>