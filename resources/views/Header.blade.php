
<div class="barra">
   <div class="logo"><img src="/css/imagenes/hsh.png" > </div>
   @include('buscador')
</div>
<div class="container">
  <div class="dropdown dropleft float-right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle"></i>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href=" /admin/users/{{session('id')}}"><span><i class="fas fa-user-cog"></i></span> Perfil</a>
		 @if(session('user')->misDatos(session('id'))->userType == "comun")
      	<a class="dropdown-item" href="/enviarSolicitud/{{session('id')}}"><span><i class="far fa-star"></i></span> Solicitar premium</a>
      <a class="dropdown-item" href="/logout"><span ><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a>
    </div>
  </div>
</div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <header>

		<nav class="menu">
			<ul>
				<li><a href="/inicio" ><span class="primero"><i class="fas fa-home"></i></span> Inicio</a></li>
				<li><a href="#" class="servicios"><span class="segundo"><i class="fas fa-suitcase"></i></span> Servicios</a>
					<ul>
						<li><a href="/admin/propiedades"><span class="xx"><i class="fas fa-list-ul"></i></span> Propiedades</a></li>
					</ul>
				</li>
				<li><a href="#" class="tercero"><span class="tercero "><i class="fas fa-th"></i></span> Categorias</a>
				<ul>
				<li><a href="/subastas" ><span class="xx "><i class="fas fa-bullhorn"></i></span> Subastas</a></li>
				<li><a href="/hotsales"><span class="xx"><i class="fas fa-tags"></i></span> Hot Sales</a></li>
				</ul>
				</li>
				<li><a href="#"><span class="cuarto"><i class="fas fa-question"></i></span> Acerca de</a></li>
				<li><a href="#"><span class="quinto"><i class="fas fa-envelope"></i></span> Contacto</a></li>
			</ul>
		</nav>
		</header>
		