<div class="buscador">
    <form action="/propiedades/search" method="GET">
		<div class="localidad">
			<label> Localidad (opcional)</label> <br>
			<input type="text" placeholder="Search.." name="locate">
		</div>
		<div class="fecha">
			<label> Fecha </label><br>
			@Include('fechas')
		</div>
     <button type="submit" class="boton_lupa"><i class="fa fa-search"></i></button>
    </form>
</div>
     
