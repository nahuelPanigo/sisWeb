<html>
<head>
</head>
<body>	
<hr>
	@foreach ($hotsales as $hotsale)
	<h1>{{$hotsale->name($hotsale)->name}}</h1>
	<h2> precio: {{$hotsale->price}} </h2>
	<h3> semana_id: {{$hotsale->semana_id}}</h3>
	<a href="{{route('hotsale.delete',$hotsale->id)}}" > Eliminar Hotsale</a> <br>
	<hr>
	@endforeach 
</body>
</html>