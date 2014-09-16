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

			<h1>Confirm Your Booking</h1>

			{{ Form::open(array('url' => 'https://transact.nab.com.au/test/hpp/payment', 'class' => 'form')) }}
			<input type="hidden" name="vendor_name" value="GJG0010" />
			<input type="hidden" name="privacy_policy" value="{{ route('privacy') }}" />
			<input type="hidden" name="refund_policy" value="{{ route('terms') }}" />
			<input type="hidden" name="payment_alert" value="mick@5150studios.com.au" />
			<input type="hidden" name="{{ $booking['tour_name'] }}" value="{{ ($booking['price']/100) }}" />
			<input type="hidden" name="payment_reference" value="{{ $booking['_id'] }}" />


			
			<input type="hidden" name="Email" value="{{ $booking['email'] }}" />
			<input type="hidden" name="Address" value="{{ $booking['street_address'] }}" />
			<input type="hidden" name="Name" value="{{ $booking['first_name'] . ' ' . $booking['last_name'] }}" />
			<input type="hidden" name="Suburb" value="{{ $booking['suburb'] }}" />
			<input type="hidden" name="State" value="{{ $booking['state'] }}" />
			<input type="hidden" name="Country" value="{{ $booking['country'] }}" />
			<input type="hidden" name="Postcode" value="{{ $booking['postcode'] }}" />
			<input type="hidden" name="Phone" value="{{ $booking['phone'] }}" />

			
			<input type="hidden" name="information_fields" value="Email,Name,Address,Suburb,State,Country,Postcode,Phone" />			
			<input type="hidden" name="suppress_field_names" value="Suburb,State,Country,Postcode" />	
			<input type="hidden" name="receipt_address" value="<<Email>>" />		

			
			<input type="hidden" name="gst_added" value="true" />
			<input type="hidden" name="gst_rate" value="10" />

			<input type="hidden" name="return_link_text" value="Complete Your Booking and Return Back To Not Normal Tours" />
			<input type="hidden" name="return_link_url" value="{{ route('/thank-you') }}" />

			<input type="hidden" name="reply_link_url" value="{{ URL::to('/') }}/bookings/complete?booking_id={{ $booking['_id'] }}&amp;payment_reference=&amp;bank_reference=&amp;payment_amount=&amp;payment_date=&amp;payment_number=&amp;card_type=&amp;remote_ip=" />


				<div class="submit half">
					{{ Form::submit('Confirm Your Booking', array('class' => 'button orange')) }}
				</div>
			</div>

			{{ Form::close() }}
		</div><!-- /content -->
	</div><!-- /container -->
	@stop

@stop



