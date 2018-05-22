<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Laravel</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- CSS и JavaScript -->
    </head>
    <body>
	<div class="container">
	    <nav class="navbar navbar-default">
		<a href="{{url('/')}}">Home</a>
	    </nav>
	</div>
	@yield('content')
    </body>
</html>