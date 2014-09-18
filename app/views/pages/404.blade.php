@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>404 - Page Not Found</h1>
				<p>Try going back to the <a href="{{ url('/') }}">Home Page</a> as this page does not exist!</p>


			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop