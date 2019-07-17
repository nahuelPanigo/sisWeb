	@Include('Header') 
	<h2 style="text-align:center; font-size: 30px;">Hot Sales !</h2>
	<div class="">
		@if($hotsales->first()== null)
		<p class="error"> Lo sentimos! En este momento no hay Hot Sales disponibles </p>
		@endif
		@foreach ($hotsales as $hotsale)
		 @php
		 $semana=$hotsale->devolverSemana($hotsale->semana_id);
		 $propiedad=$semana->devolverDatosPropiedad($semana->propiedad_id) 
		 @endphp
		<div class="column">
			<div class="card">
			<h3>{{$propiedad->name}}</h3>
			<div class="datos">
				<p><span class="fas fa-map-marker-alt"></span> {{$propiedad -> locate}} </p>
				<p>   <span class="far fa-calendar-alt">  </span> {{$hotsale->devolverSemana($hotsale->semana_id)->date}} </p>
				<p><span class="fas fa-dollar-sign"></span>   {{$hotsale -> price}}</p> 
			</div>
			<img src="{{str_replace('public/', '/storage/', $propiedad->images()->first()->archiveName)}}" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
				<button class="reserva"  onclick="mostrarModal({{$hotsale->id}}})"> Comprar</button>
				@include('comprar')
		</div>
	</div>
	@endforeach
	</div>
	@include('galeriaDeFotos')
