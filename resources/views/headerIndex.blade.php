<link rel="stylesheet" type="text/css" href="/css/headerIndex.css">
   </head>
 <div class="header">
  <a href="/" class="logo"><img src="/css/imagenes/hsh.png" > </a>
  <div class="header-right">
    <a class="" href="/admin/users/create">Registrarse</a>
    <a class="active" href="/admin/sesion">Login</a>
    <a href="#about">About</a>
  </div>
</div>

<div style="padding-left:20px">
 
</div>
@if($errors->any())
			<div class="alert alert-danger">
		<ul>	
			@foreach ($errors->all() as $error)
				<li><strong>Atencion!</strong> {{ $error }}</li>
			@endforeach
		</ul>
		</div>
		@endif