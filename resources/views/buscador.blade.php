<div class="buscador">
    <form action="/propiedades/search" method="GET">
       <div class="fecha">
      <label> Fecha </label>
       @Include('fechas')
     </div>
      <div class="localidad">
      <label> Localidad (opcional)</label>
      <input type="text" placeholder="Search.." name="search">
    </div>
     <button type="submit" class="boton"><i class="fa fa-search"></i></button>
    </form>
   
</div>
     
