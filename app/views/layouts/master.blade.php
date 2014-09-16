<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Not Normal Tours</title>
		<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
		 @yield('styles')
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		

	</head>
	<body>
		@include('layouts.header')

		@yield('content')

		@include('layouts.footer')

		@yield('scripts')   
	</body>
</html>