
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

    <li ><span id="demo" class="far fa-clock"></span>
      <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
    </li>

    <button onclick="document.getElementById('id01').style.display='block'" >¡ PUJAR !</button>
@Include('Pujar')
  </ul>
</div>
@endforeach


</body>
</html>