@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Oh No!</h1>
				<p>Thanks for trying to make a booking with Not Normal Tours but it seems you are too wise for our tours! Our tours are designed for people aged between 18 and 39 years of age. Sorry for any inconvenience.</p>

				<p>Please visit our {{ link_to_route('home', 'Home Page') }} to view our other tours.</p>
			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop