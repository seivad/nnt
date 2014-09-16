@extends('layouts.master')

	@section('styles')
		<link rel="stylesheet" href="{{ asset('/css/middle-of-the-world.css') }}">
	@stop

	@section('logo')
		{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
	<div class="container">
		<div class="content inner group">


			<script>
				$(document).ready(function() {

					$('#tour_date').change(function() {
						$('.pricing').hide();
						var value = $('#tour_date').val();
						console.log(value);
						var price = $('#' + value).text().replace('$', '').replace('.', '').replace(',', '').replace(' AUD', '');
						console.log(price);
						$('#' + value).toggle();
						$('#price').val(price);

					}).trigger('change');

				});
			</script>


			<h1>Make Your Booking</h1>

			{{ Form::open(array('route' => 'bookings.store', 'class' => 'form')) }}

			<div class="half">

				<div class="input @if ($errors->has('title')) has-error @endif">
					{{ Form::label('title', 'Title') }}
					<div class="dropdown dropdown-dark">
						{{ Form::select('title', array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Miss' => 'Miss'), null, array('class' => 'dropdown-select')) }}
					</div>
					@if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('first_name')) has-error @endif">
					{{ Form::label('first_name', 'First Name') }}
					{{ Form::text('first_name', null) }}
					@if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('last_name')) has-error @endif">
					{{ Form::label('last_name', 'Last Name') }}
					{{ Form::text('last_name', null) }}
					@if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p>@endif
				</div>	

				<div class="input @if ($errors->has('email')) has-error @endif">
					{{ Form::label('email', 'Email Address') }}
					{{ Form::email('email', null) }}
					@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('phone')) has-error @endif">
					{{ Form::label('phone', 'Phone Number') }}
					{{ Form::text('phone', null) }}
					@if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p>@endif
				</div>

				<div class="input gender @if ($errors->has('gender')) has-error @endif">
					{{ Form::label('gender', 'Gender') }}<br />

					<label for="male">Male
					{{ Form::radio('gender', 'Male', false, array('id' => 'male')) }}</label>

					<label for="female">Female
					{{ Form::radio('gender', 'Female', false, array('id' => 'female')) }}</label>

					@if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p>@endif
				</div>

				<div class="input">
					{{ Form::label('dateofbirth', 'Date of Birth') }}
					<div class="dropdown dropdown-dark @if ($errors->has('day')) has-error @endif">
					{{ Form::selectRange('day', 1, 31, null, array('class' => 'dropdown-select')) }}
					</div>
					<div class="dropdown dropdown-dark @if ($errors->has('month')) has-error @endif">
					{{ Form::selectMonth('month', null, array('class' => 'dropdown-select')) }}
					</div>
					<div class="dropdown dropdown-dark @if ($errors->has('year')) has-error @endif">
					{{ Form::selectRange('year', 2014, 1901, null, array('class' => 'dropdown-select')) }}
					</div>
					@if ($errors->has('day')) <p class="help-block">{{ $errors->first('day') }}</p>@endif
					@if ($errors->has('month')) <p class="help-block">{{ $errors->first('month') }}</p>@endif
					@if ($errors->has('year')) <p class="help-block">{{ $errors->first('year') }}</p>@endif
				</div>				

			</div>

			<div class="half half_last">
				<div class="input @if ($errors->has('street_address')) has-error @endif">
					{{ Form::label('street_address', 'Street Address') }}
					{{ Form::text('street_address') }}
					@if ($errors->has('street_address')) <p class="help-block">{{ $errors->first('street_address') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('suburb')) has-error @endif">
					{{ Form::label('suburb', 'Suburb') }}
					{{ Form::text('suburb') }}
					@if ($errors->has('suburb')) <p class="help-block">{{ $errors->first('suburb') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('state')) has-error @endif">
					{{ Form::label('state', 'State') }}
					{{ Form::text('state') }}
					@if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('postcode')) has-error @endif">
					{{ Form::label('postcode', 'Postcode') }}
					{{ Form::text('postcode') }}
					@if ($errors->has('postcode')) <p class="help-block">{{ $errors->first('postcode') }}</p>@endif
				</div>

				<div class="input @if ($errors->has('country')) has-error @endif">
					{{ Form::label('country', 'Country') }}
					{{ Form::text('country') }}
					@if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p>@endif
				</div>

			</div>

			<div class="full">
				<hr />

				<div class="input">
					{{ Form::label('tour_name', 'Select A Tour') }}
					<img src="{{ asset('images/tour-logos/middle-of-the-world.png') }}" alt="The Middle Of The World Tour" />
					{{ Form::hidden('tour_name', $tour->title ) }}
				</div>

				<div class="input">
					{{ Form::label('tour_date', 'Tour Dates') }}
					<div class="dropdown dropdown-dark @if ($errors->has('tour_date')) has-error @endif">
						{{ Form::select('tour_date', $tourdates, $tourid, array('class' => 'dropdown-select')) }}
					</div>
					@if ($errors->has('tour_date')) <p class="help-block">{{ $errors->first('tour_date') }}</p>@endif
				</div>				

				<hr />

				<h1>Tour Info</h1>
				<h3>{{ $tour->title }}</h3>
				<p>
				<strong>Duration:</strong> {{ $tour->length }}<br />
				<strong>Begins:</strong> {{ $tour->info['begin'] }}<br />
				<strong>Finishes:</strong> {{ $tour->info['finish'] }}<br />
				<strong>Total Price:</strong>
					@foreach($tour->dates as $dates)
						<span class="pricing" id="{{ $dates['id'] }}">${{ number_format(($dates['price']/100),2) }} AUD</span>
					@endforeach
				</p>

				<hr />

				<div class="input @if ($errors->has('terms')) has-error @endif">
					<label for="terms">
						{{ Form::checkbox('terms', 'I agree to the terms and conditions', false, array('id' => 'terms')) }} Yes, I agree to the <a href="#">Terms &amp; Conditions</a>
					</label>
					@if ($errors->has('terms')) <p class="help-block">{{ $errors->first('terms') }}</p>@endif
				</div>

				{{ Form::hidden('price', null, array('id' => 'price')) }}
				{{ Form::hidden('deposit', $tour->price['deposit']) }}
				{{ Form::hidden('id', $tour->id ) }}

				<hr />

			</div>


			<div class="half">

				<div class="input @if ($errors->has('captcha')) has-error @endif">
					{{ Form::label('captcha', 'Are You Human?') }}
					{{ HTML::image(Captcha::img(), 'Captcha image') }}
					{{ Form::text('captcha') }}
					@if ($errors->has('captcha')) <p class="help-block">{{ $errors->first('captcha') }}</p>@endif
				</div>

				<div class="submit">
					{{ Form::submit('Make Your Full Payment', array('class' => 'button orange', 'name' => 'payment')) }}
					{{ Form::submit('Make Your Deposit', array('class' => 'button blue', 'name' => 'payment')) }}
				</div>
			</div>

			{{ Form::close() }}
		</div><!-- /content -->
	</div><!-- /container -->
	@stop

@stop



