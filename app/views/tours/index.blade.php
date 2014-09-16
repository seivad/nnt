@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Available Tours</h1>

				<div class="half">
					<h3>South America</h3>
					<a href="{{ route('middle-of-the-world') }}"><img src="{{ asset('images/tour-logos/middle-of-the-world.png') }}" alt="The Middle Of The World Tour" /></a>
				</div>

				<div class="half half_last">
					<h3>Australia</h3>
					<p>Coming Soon</p>
				</div>

			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop