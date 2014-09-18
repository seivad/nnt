<h1>Inquiry Form Submission</h1>

<p>
	<strong>Full Name:</strong> {{ $input['name'] }}<br />
	<strong>Phone Number:</strong> {{ $input['phone'] }}<br />
	<strong>Email Address:</strong> {{ $input['email'] }}<br />
	<strong>Message / Comment:</strong><br />
	{{ $input['message'] }}
</p>

<p>Sent from {{ link_to_route('contact', 'Contact Us page') }}.</p>