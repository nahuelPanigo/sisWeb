<?php session_start()?>
<div class="barra">
   <div class="logo"><img src="/css/imagenes/hsh.png" > </div>
   
   <div class="busqueda"><form action="/propiedades/search" onsubmit=""method="GET">
<div class="input-group mb-3">
  <div class="input-group-prepend">
   <span  id="basic-addon1"></span></span>
  </div>
  <input type="text" class="form-control" placeholder="search location"name="locate" aria-label="locate" aria-describedby="search">
</div>
</form></div>
   <div class="perfil">
   <ul>
    <li class="nav-item dropdown">
            <a href="#" class="nav-link"><span><i class="fas fa-user-circle"></i></span></a>
            <nav class="submenu">
                <ul class="submenu-items">
                    <li class="submenu-item"><a href="#" class="submenu-link"><span ><i class="fas fa-user-cog"></i></span> Modificar Cuenta</a></li>
					<li class="submenu-item"><a href="#" class="submenu-link"><span> <i class="far fa-bell"></i></span> Solicitudes premium</a></li>
					<li class="submenu-item"><a href="#" class="submenu-link"><span> <i class="far fa-star"></i></span> Solicitar premium</a></li>
                    <li class="submenu-item"><hr class="submenu-seperator" /></li>
					<li class="submenu-item"><a  href="/admin/propiedades/create"  class="submenu-link"><span> <i class="far fa-plus-square"></i></span> Agregar Propiedad</a></li>
					<li class="submenu-item"><a href="#" class="submenu-link"><span ><i class="far fa-plus-square"></i></span> Crear Subasta </a></li>
					<li class="submenu-item"><hr class="submenu-seperator" /></li>
                    <li class="submenu-item"><a href="/" class="submenu-link"><span ><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                </ul>
            </nav>
        </li>  
	</div>
	<script src="/js/menu.js"></script>
 </div>
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
				<li><a href="/categorias/subastas" ><span class="xx "><i class="fas fa-bullhorn"></i></span> Subastas</a></li>
				<li><a href="#"><span class="xx"><i class="fas fa-tags"></i></span> Hot Sales</a></li>
				</ul>
				</li>
				<li><a href="#"><span class="cuarto"><i class="fas fa-question"></i></span> Acerca de</a></li>
				<li><a href="#"><span class="quinto"><i class="fas fa-envelope"></i></span> Contacto</a></li>
			</ul>
		</nav>
		</header>