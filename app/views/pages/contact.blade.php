@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>Contact Us</h1>

				<div class="half">
					<h3>Get In Touch</h3>
					<p>We love to hear from our clients, so please get in touch.</p>
					<p>
						<strong>Phone:</strong> 1300 669 664<br />
						<strong>Email:</strong> info@notnormaltours.com<br />
						<strong>Website:</strong> www.notnormaltours.com
					</p>
				</div>

				<div class="half half_last">

					<h3>Quick Inquiry</h3>

					@if (Session::has('message'))
					   <div class="alert alert-success">{{ Session::get('message') }}</div>
					@endif

					{{ Form::open(array('class' => 'form')) }}

					<div class="input @if ($errors->has('name')) has-error @endif">
						{{ Form::label('name', 'Full Name') }}
						{{ Form::text('name') }}
					</div>

					<div class="input @if ($errors->has('phone')) has-error @endif">
						{{ Form::label('phone', 'Phone Number') }}
						{{ Form::text('phone') }}
					</div>

					<div class="input @if ($errors->has('email')) has-error @endif">
						{{ Form::label('name', 'Full Name') }}
						{{ Form::email('email') }}
					</div>

					<div class="input @if ($errors->has('message')) has-error @endif">
						{{ Form::label('message', 'Comment / Message') }}
						{{ Form::textarea('message') }}
					</div>

					<div class="input @if ($errors->has('captcha')) has-error @endif">
						{{ Form::label('captcha', 'Are You Human?') }}
						{{ HTML::image(Captcha::img(), 'Captcha image') }}
						{{ Form::text('captcha') }}
						@if ($errors->has('captcha')) <p class="help-block">{{ $errors->first('captcha') }}</p>@endif
					</div>

					<div class="submit">
						{{ Form::submit('Send Your Message', array('class' => 'button orange', 'name' => 'submit')) }}
					</div>

					{{ Form::close() }}
				</div>


			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop