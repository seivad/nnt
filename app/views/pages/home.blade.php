@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Welcome to Not Normal Tours</h1>

				<div class="half">
					<p><strong>Not Normal Tours welcomes everyone to a different way of enjoying earth, in a spectacular "unconventional" way.</strong></p>

					<p>Discovering the hidden parts of cultural demonstrations, revealing mysteries unknown in the Western World, for example; The "Ayahuasha Journey in the heart of one of the most untouched areas in South America, The Amazon.</p>
					
					<p>Creating a different way of appreciating life and its natural attractions from different perspectives. For most people the sun will always look the same, it won't be different if you see it walking or standing up, however when you combine doing another activity like ride a motorcyle going down the volcanoes and watching the sun as a background while riding, the sun suddenly has a different apperance if we combine diferent elements to make the art of traveling a new experience of joy.</p>
					
					<p>The new innovative way of enjoying life this way of "Not Normal Tours" has brought to our lifes a different concept in traveling. You will do what you always want to do learning and experiencing cultural explortion, rather than just simply viewing it; really tasting what locals taste.</p>

					<p>Enjoying the first tour open for this year. We will open your world of traveling, so you can experience the true nature and lifestyles of Ecuador &amp; South America.</p>
				</div>

				<div class="half half_last">
					<h3>South America</h3>
					<a href="{{ route('middle-of-the-world') }}"><img src="{{ asset('images/tour-logos/middle-of-the-world.png') }}" alt="The Middle Of The World Tour" /></a>
				</div>
			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop