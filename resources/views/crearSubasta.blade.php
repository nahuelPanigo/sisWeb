<html>
  <head>
    <title> Registrar Subasta </title>
    @Include('estilos')
    <link rel="stylesheet" type="text/css" href="/css/registrarPropiedad.css">
    <script src="/js/registrarPropiedad.js" type="text/javascript"> </script>
    <meta charset="utf-8">
  </head>
  <body>
     @Include('adminHeader')
    <div class="caja">
    <h1 class="registrar_propiedad_h1"> Crear subasta </h1> <br> <br>
      <form  onsubmit="" method="POST" action="{{route('subastas.store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
       <div class="registrar_propiedad">
	   <input type="hidden" name="propiedad_id" value="{{$id}}">
        <input type="text" id="precio" name="minPrice" placeholder="Precio inicial" autocomplete="off"><br> <br>
		<div class="datePicker">
			@Include('calendarpicker')
		</div>
        </div>
        <br><br>
        <input type="submit" value="Crear subasta" class="boton_registrar">
      </form> 
    </div>
    <footer> <p>Gran grupo de programadores</p> </footer>
  </body>
</html>