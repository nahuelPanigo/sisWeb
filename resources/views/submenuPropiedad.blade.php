    <button class="btn btn-default dropdown-toggle dropdown" type="button" data-toggle="dropdown" ><i class="fas fa-bars"></i>
    <span class=""></span></button>
    <ul class="dropdown-menu" >
      <li class="submenu-item"><a href="{{ route('propiedades.edit',$propiedad->id)}}" class="submenu-link"><span class="fas fa-pencil-alt"></span> Editar Propiedad </a></li>
					<li class="submenu-item"><a href="{{route('admin.propiedades.delete',$propiedad->id)}}" class="submenu-link"><span class="far fa-trash-alt"></span> Eliminar Propiedad </a></li>
					 <li class="submenu-item"><hr class="submenu-seperator" /></li>
					<li class="submenu-item"><a href="{{route('categorias.subastas.create',$propiedad->id)}}" class="submenu-link"><span class="far fa-flag"></span> Subastar </a></li>
					<li class="submenu-item"><a href="{{route('categorias.hotsales.create',$propiedad->id)}}" class="submenu-link"><span class="fas fa-thumbtack"></span> Hot Sale </a></li>
    </ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

