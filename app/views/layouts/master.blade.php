<!doctype html>
<html lang="en">
	<head>
		<title>
			@yield('title', 'Not Normal Tours')
		</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Not Normal Tours">
		@yield('meta')
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
		<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
		@yield('styles')
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		@include('layouts.header')

		@yield('content')

		@include('layouts.footer')

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55080226-1', 'auto');
		  ga('send', 'pageview');

		</script>
		@yield('scripts')   
	</body>
</html>