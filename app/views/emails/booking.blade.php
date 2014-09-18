<h1>New Booking</h1>

<h3>{{ $booking['tour_name'] }}</h3>
<h4>Total Price: ${{ number_format(($booking->price / 100),2) }} | NAB Payment: ${{ number_format($booking->receipt['payment_amount'],2) }}</h4>

<h2>Booking Info</h2>
<p>
	<strong>Order Date:</strong> {{ Carbon::createFromTimeStampUTC($booking->receipt['payment_date'])->toDayDateTimeString() }}<br />
	<strong>Full Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}<br />
	<strong>Email Address:</strong> {{ $booking->email }}<br />
	<strong>Phone Number:</strong> {{ $booking->phone }}<br />
	<strong>Gender:</strong> {{ $booking->gender }}<br />
	<strong>DOB:</strong> {{ Carbon::createFromDate($booking->year, $booking->month, $booking->day)->toFormattedDateString() }}<br />
	<strong>Address:</strong><br />
		{{ $booking->street_address }},<br />
		{{ $booking->suburb }}, {{ $booking->state }},<br />
		{{ $booking->postcode }}, {{ $booking->country }}<br />
	<strong>NAB Payment Number:</strong> {{ $booking->receipt['payment_number'] }}<br />
	<strong>Card Type:</strong> {{ $booking->receipt['card_type'] }}<br />
	<strong>Remote IP Address:</strong> {{ $booking->receipt['remote_ip'] }}
</p>
