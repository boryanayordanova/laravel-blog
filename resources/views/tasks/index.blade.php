<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<ul>
    @foreach ($tasks as $t)

		<li>
			<a href="/tasks/{{$t->id}} ">
			{{ $t->body }}
			</a>
		</li>

	@endforeach
</ul>




</body>
</html>