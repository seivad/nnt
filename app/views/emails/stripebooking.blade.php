<h1>New Booking</h1>

<h3>{{ $booking->tour_name }}</h3>
<h4>Total Price: ${{ number_format(($booking->price / 100),2) }}</h4>
<p><strong>Booking Reference:</strong> #{{ $booking->receipt['payment_reference'] }}<br />
<strong>Payment Number:</strong> #{{ $booking->receipt['stripe_id'] }}</p>

<h2>Booking Info</h2>
<p>
	<?php /* <strong>Order Date:</strong> {{ Carbon::createFromTimeStampUTC($booking->receipt['payment_date'])->toDayDateTimeString() }}<br /> */ ?>
	<strong>Full Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}<br />
	<strong>Email Address:</strong> {{ $booking->email }}<br />
	<strong>Phone Number:</strong> {{ $booking->phone }}<br />
	<strong>Gender:</strong> {{ $booking->gender }}<br />
	<strong>DOB:</strong> {{ Carbon::createFromDate($booking->year, $booking->month, $booking->day)->toFormattedDateString() }}<br />
	<strong>Passport Number:</strong> {{ $booking->passport }}<br />
	<strong>Address:</strong><br />
		{{ $booking->street_address }},<br />
		{{ $booking->suburb }}, {{ $booking->state }},<br />
		{{ $booking->postcode }}, {{ $booking->country }}<br />
</p>

<h2>Tour Info</h2>

@forelse($tour->dates as $date)

	@if($booking->tour_date == $date['id'])

		<h3>{{ $booking->tour_name }}</h3>
		<p>
			<strong>Total Price:</strong> ${{ number_format(($date['price']/100),2) }}<br />
			<strong>Start Date:</strong> {{ $date['start_date'] }}<br />
			<strong>End Date:</strong> {{ $date['end_date'] }}
		</p>

	@endif

@empty

	<p>No Tour Dates Available</p>

@endforelse