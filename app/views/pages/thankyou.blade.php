@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Thank You</h1>
				<p>Thanks for making a booking request with Not Normal Tours. We will be in touch shortly to confirm your bookings details and travel itinerary.</p>

				<p>Feel free to continue to browser our website by visiting the <a href="{{ route('home') }}">Home page</a>.</p>
			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop