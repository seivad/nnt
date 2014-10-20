@extends('layouts.master')

	@section('logo')
			{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
	@stop

	@section('content')
		<div class="container">
			<div class="content inner group">
				<h1>TERMS &AMP; AGREEMENTS</h1>

				<p>Please read these terms and conditions carefully as these conditions incorporate the basis on which bookings for No Normal tours are accepted.</p>

				<h3>BOOKING METHOD</h3>
				<p>Book on line with split payment due 4 weeks prior departure date. $250 dollars is due on booking and final balance is due 4 weeks prior to departure.</p>
				<p>Credit Card - Visa and Mastercard 2% credit card fee applies (3 % international), Amex 3.5%.</p>

				<h3>HOW TO BOOK / QUOTES AND RESERVATIONS</h3>
				<p>Bookings can be made over at: {{ URL('/') }} or by calling Central Reservations on 1300 669 664. if calling.</p>
				<p>Reservations are subject to availability and actual pricing at the time of booking.</p>
				<p>Verbal quotes are valid for 24 hours only. Any verbal quote given is an estimate only of price, which will be subject to a written advice on confirmation of the reservation.</p>
				<p>A 2% - 3.5 % surcharge will apply to all credit card and debit card transactions.</p>
				<p>A deposit of $250 per person must be received immediately by credit card to confirm the booking. Payment will indicate acceptance of these booking conditions.</p>

				<h3>BOOKING TERMS &amp; CONDITIONS - DEPOSIT</h3>
				<p>A 2% up to 3.5 % surcharge will apply to all credit card and debit card transactions.</p>
				<p>A $250 no refundable deposit per person must be received immediately by credit card to confirm the booking. Payment will indicate acceptance of these booking conditions.</p>


				<h3>FINAL PAYMENT</h3>
				<ul>
					<li>2% up to 3.5 % surcharge will apply to all credit card and debit card transactions.</li>
					<li>Full payment must be received at least 30 days prior departure.</li>
					<li>Full payment is required at time via credit card for booking within 30 days prior departure.</li>
					<li>All prices exclude GST.</li>
				</ul>
				<p>If deposit or final payment is not received by the due date, No Normal Tours reserves the rights to cancel the booking.</p>

				<h3>AMENDMENTS TERMS AND CHARGES</h3>
				<p>
				<ul>
					<li>All amendments to dates and tours are subject to availability.</li>
					<li>Rates are subject to changes.</li>
					<li>$100 Amendment fee will apply when changes are made via our call centre.</li>
					<li>All amendments made within 30 days prior to arrival, will be treated as a cancellation incurring a 100% cancellation fee.</li>
				</ul>
				</p>

				<h3>CANCELLATION TERMS AND CHARGES</h3>
				<p><strong>CANCELLATION POLICY: REFUNDS AND TERMINATING YOUR BOOKING</strong></p>

				<p>
					<ul>
						<li>Cancellation if caused by the client: a $250 cancellation fee will apply.</li>
						<li>If Cancellation occurs within 4 weeks from traveling (or 6 weeks prior to Xmas period) 100% of the total booking will be forfeited by you. No refunds will be given.</li>
						<li>Refunds cannot be made for bookings cancelled due to inclement weather or illness. We recommend that you take out a travel insurance to protect you in this regard.</li>
					</ul>
				</p>

				<p>Bookings may be transferred to a future date: at a cost of $100, provided that:
				<ul>
					<li>the request to transfer by the guest: Is made at least one (1) calendar month before departure.</li>
					<li>is for the same type of tour, and is for the same duration of time;</li>
					<li>the applicable tariff for that season is correctly applied.</li>
				</ul>
				</p>

				<h3>REFUND POLICY</h3>
				<p>No shows and cancellations after departure date - will be subject to a 100% cancellation fee.</p>

				<p>Once full payment has been made, there will be no refund. Any residual balance paid (after the applicable fees are deducted) may be held in credit towards future bookings with No Normal Tours. This credit can only be held for a maximum period of twelve months from the day the booking is cancelled.</p>

				<p>To redeem moneys held in credit, customers must call central reservations on 1300 367 376. prior to the expiry of the 12 months to rebook another Tour. Moneys not redeemed at the expiry of the 6 months will be forfeited in their entirety to No Normal Tours.</p>

				<h3>BOOKING TERMS &amp; CONDITIONS - GENERAL</h3>
				<p>
					<strong>Payment Options</strong>
					<ul>
						<li>Standard Payments accepted include;
						<li>Mastercard - Credit and Debit Cards.
						<li>Visa - Credit and Debit Cards
						<li>American Express Credit Cards
						<li>Telegraphic Transfer (Allow 7 Days Transaction time)
					</ul>
				</p>
				<p>A 2% up to 3.5 % surcharge will apply to all credit card and debit card transactions</p>

				<h3>RATES AND CHANGES</h3>
				<p>Rates quoted on this website are in Australian Dollars local currency and are subject to change at any time. No Normal Tours do not include transport from your home port to holiday destination and return, items of a personal nature, meals (unless specified), transfers and existing or proposed taxes and government charges, unless otherwise indicated.</p>

				<p>Any verbal quote given is an estimate only of price, which will be subject to a written advice on confirmation of the reservation.</p>
				<p>Minimum length of stay restrictions may apply to certain rates during special event periods.</p>

				<p>The price of your holiday cannot be guaranteed until full payment is received. All prices and other payments and conditions should be confirmed at the time of booking.</p>

				<h3>TRAVEL INSURANCE</h3>
				<p>We strongly recommend you purchase comprehensive travel insurance at time of booking. We suggest that the policy should include, but not be limited to, the following cover: Loss of deposit through cancellation; loss or damage to personal baggage and loss of money and medical expenses.</p>

				<h3>NOT INCLUDED IN PRICE OF HOLIDAY</h3>
				<p>Airport taxes, costs of a personal nature e.g. laundry, taxis, telephone calls, room service. - Any extras.</p>

				<h3>BOOKING ARRANGEMENTS</h3>
				<p>The person affecting a booking shall be deemed to have accepted the booking conditions on behalf of all persons named in the booking. The person who makes/confirms a booking is the only one who can make changes or cancelling a booking.</p>

				<h3>DOCUMENTATION</h3>
				<p>Travel documents will be available to view and print off the website or will be forwarded by post or email when full payment is received. Once a reservation is confirmed and your deposit or full payment has been made, confirmation will be sent via email or post to the address provided in the booking.</p>

				<p>If your reservation has been made on our website, booking details are able to be viewed in the 'My Bookings' area. To access please use your log in details you created when booking.</p>




			</div><!-- /content -->
		</div><!-- /container -->
	@stop

@stop