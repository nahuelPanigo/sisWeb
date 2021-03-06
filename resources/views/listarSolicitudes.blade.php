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
            <h2>Solicitudes  <b>Premium </b></h2>
          </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>           
						<th>Date </th>
						<th>UserName</th>
                        <th>Email</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if ($usuarios->first()==null)
                    <p class="error"> No hay solicitudes nuevas </p>
                    @else
                  @foreach ($usuarios as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="#">{{$user->name}}{{" "}}{{$user->secondName}}</a></td>
                        <td>{{$user->birthDay}}</td>                        
                        <td>{{$user->userName}}</td>
						<td><span class="status text-success">&bull;</span> {{$user->mail}}</td>
						<td>
						<a href="/aceptarSolicitud/{{$user->id}}" class="settings" title="Aceptar" data-toggle="tooltip"><i class="material-icons">
						how_to_reg
						</i></a>
						<a href="/rechazarSolicitud/{{$user->id}}" class="delete" title="Rechazar" data-toggle="tooltip"><i class="material-icons">		&#xE5C9;</i></a>
						</td>
                    </tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>     
</body>
@endif
</html>                                                               