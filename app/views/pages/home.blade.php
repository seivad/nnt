@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Welcome to Not Normal Tours</h1>

				<div class="half">
					<p>Not Normal Tours, welcomes everyone to a different way of enjoying earth, in a spectacular "unconventional" way.</p>

					<p>Discovering the hidden parts of cultural demostartions, revealing misteries unknown in the western world, like for example; The "Ayahuasha Journey in the heart of one of the most untouch reachest aereas in South America, The Amazon.</p>
					
					<p>Creating a different way of appreciating life an its natural attactions from different perspectives. For most people the sun will always look the same it won't be different if you see it walking or standing up, however when you combine doing another activity like ride a motorcyle going down the volcanoes and watching the sun as a background while riding, the sun suddenly has a different aperience if we combine diferent elements to make the art of traveling a new experience of joy.</p>
					
					<p>The new innovative way of enjoying life this way of "Not Normal tours" has brought to our lifes a different concept in traveling. You will do what you always want to do out of the bubble of been keap outside the cultural explortion and rather be part of it, really tasting what locals taste.</p>

					<p>Enjoying the first tour open for this year. We will make your world of traveling the experience of what you are really looking for.</p>
				</div>

				<div class="half half_last">
					<h3>South America</h3>
					<a href="{{ route('middle-of-the-world') }}"><img src="{{ asset('images/tour-logos/middle-of-the-world.png') }}" alt="The Middle Of The World Tour" /></a>
				</div>
			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop