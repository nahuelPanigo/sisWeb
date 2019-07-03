<html>
<head>
</head>
<body>
	@foreach ($hotsales as $hotsale)
	<a hre="{{route('hotsale.delete',$hotsale->id)}}" > Eliminar Hotsale</a>
	@endforeach 
</body>
</html>