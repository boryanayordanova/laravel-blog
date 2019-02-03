<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

 	echo "Hello . $name";


<ul>
    @foreach ($tasksArray as $ta)

		<li>{{ $ta }}</li>

	@endforeach
</ul>




</body>
</html>