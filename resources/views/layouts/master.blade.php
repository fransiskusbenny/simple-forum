<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Simple Forum Discussion</title>

	{{-- styles --}}
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	{{-- font awesome --}}
	<script src="https://use.fontawesome.com/e4ed1aa155.js"></script>
	
	@yield('css')
</head>
<body>
	{{-- navigation --}}
	@include('partials._navbar')

	<div class="container">
		<div class="row">
			@yield('content')
		</div>
	</div>

	{{-- script --}}
	<script src="/js/all.js"></script>

	@yield('js')
</body>
</html>