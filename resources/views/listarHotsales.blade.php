<html>
<head>
</head>
<body>	
<hr>
	<h1> @if (isset($mensaje))
	{{$mensaje}}
	@endif</h1>
	@foreach ($hotsales as $hotsale)
	<h1>{{$hotsale->name($hotsale)->name}}</h1>
	<h2> precio: {{$hotsale->price}} </h2>
	<h3> semana_id: {{$hotsale->semana_id}}</h3>
	<a href="{{route('hotsales.comprar',$hotsale->id)}}" > Comprar hotsale</a> <br>
	<hr>
	@endforeach 
</body>
</html>