<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Solicitudes Premium</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/listarSolicitud.css">
@include('estilos')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    @include('adminHeader')
    <div class="">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2>Lista de <b>Usuarios </b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>           
						<th>Nacimiento </th>
						<th>Nombre de usuario</th>
                        <th>Email</th>
						<th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                @if ($usuarios->first()==null)
                    <p class="error"> No hay solicitudes nuevas </p>
                @else
                @foreach ($usuarios as $user)
					<tr>
						<td>{{$user->id}}</td>
                        <td>{{$user->name}}{{" "}}{{$user->secondName}}</td>
                        <td>{{$user->birthDay}}</td>                        
                        <td>{{$user->userName}}</td>
						<td><span class="status text-success">&bull;</span> {{$user->mail}}</td>
						<td> {{$user->userType}}</td>
                    </tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div>     
</body>
@endif
</html>   