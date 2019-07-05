<!DOCTYPE html>
<html>
<title> Mi Perfil </title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
a {
    color:black;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
.fa-times {
  color: red;
}
</style>
@Include('estilos')
<link rel="stylesheet" type="text/css" href="/css/listaReservas.css">
</head>
<body>
@Include('Header')
<h2 style="font-size: 25px; margin-left: 30px;">Mi Perfil </h2>
<p style="font-size: 25px; margin-left: 30px;">{{$user->name}} {{$user->secondName}}</p>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'datos')" id="defaultOpen">Mis Datos</button>
  <button class="tablinks" onclick="openCity(event, 'reservas')" id="defaultOpen">Mis Reservas</button>
  <button class="tablinks" onclick="openCity(event, 'subastas')">Mis Subastas</button>
  <button class="tablinks" onclick="openCity(event, 'hotsales')">Mis Hot Sales</button>
  <button class="modificar"> <a href="/admin/users/{{session('id')}}/edit" id="defaultOpen">Modificar mis Datos</a></button>
   <button class="modificar"> <a href="/users/{{session('id')}}/delete" id="defaultOpen">Eliminar Cuenta</a></button>
</div>
<div id="datos" class="tabcontent">
  <h3>Mis Datos</h3>
  <p>
      <h3> Nombre: {{$user->name}}</h3>
      <h3> Apellido: {{$user->secondName}} </h3>
      <h3> Nombre de Usuario: {{$user->userName}}</h3>
      <h3> Documento:{{$user->dni}} </h3>
      <h3> Fecha de nacimiento: {{$user->birthDay}}</h3>
      <h3> Email: {{$user->mail}}</h3>
      <h3> Numero de tarjeta de credito: {{$user->creditCardNumber}}</h3>
      <h3> Fecha de vencimiento de la tarjeta: {{$user->creditCardDate}}</h3>
      <h3> Tipo usuario: {{$user->userType}} </h3>

  </p>
  </p>
</div>

<div id="reservas" class="tabcontent">
  <h3 style="font-size: 22px;">Mis Reservas</h3>
  <table style="margin:30px 0px 30px 0px;">
  <tr style="font-size: 20px;">
    <th>Propiedad</th>
    <th>Semana</th>
    <th>Ubicacion</th>
  </tr>

  <p>
    @if($reservas->first()== null)
        <p class="error"> Lo sentimos! En este momento no posee reservas  </p>
        @endif
        @foreach ($reservas as $reserva)
       <tr style="font-size: 15px;">
    
    @php $semana=$reserva->devolverSemana($reserva->semana_id) @endphp
    <td>{{$semana->devolverDatosPropiedad($semana->propiedad_id)->name}}</td>
    <td>{{$semana->date}}</td>
    <td>{{$semana->devolverDatosPropiedad($semana->propiedad_id)->locate}}</td>
    <td><a href="/reservas/{{$reserva->id}}/delete" > Cancelar  <i class="fas fa-times"></i></a><td>
  </tr>

        @endforeach
    </table>     
  </p>

</div>

<div id="subastas" class="tabcontent">
  <h3 style="font-size: 22px;">Mis Subastas</h3>
  <p> @if($subastas->first()== null)
        <p class="error" style="font-size: 20px;"> Lo sentimos! En este momento no esta participando en alguna subasta  </p>
        @endif
          <table style="margin:30px 0px 30px 0px;">
  <tr style="font-size: 20px;">
    <th>Propiedad</th>
    <th>Semana</th>
    <th>Ubicacion</th>
  </tr>
        @foreach ($subastas as $subasta)
           @php $semana=$subasta->devolverSemana($subasta->semana_id) @endphp
     <tr style="font-size: 15px;">      
    <td>{{$semana->devolverDatosPropiedad($semana->propiedad_id)->name}}</td>
    <td>{{$semana->date}}</td>
    <td>{{$semana->devolverDatosPropiedad($semana->propiedad_id)->locate}}</td>
  </tr>
        @endforeach</p> 
         </table> 
</div>

<div id="hotsales" class="tabcontent">
  <h3>Hot Sales</h3>
  <p></p>
</div>

<div id="modificar" class="tabcontent">
  <h3>Modificar mis Datos</h3>
  <p></p>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
