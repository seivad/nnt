<?php

class BookingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /bookings
	 *
	 * @return Response
	 */
	public function index($id = null, $tourid = null)
	{

		if(!$id || !$tourid) {
			return Redirect::route('tours');
		}

		$tour = Tour::find($id);

		$tourdates = array();
		foreach($tour->dates as $dates) {
			if($dates['spaces'] > 0) {
				$value = $dates['start_date'] . ' - ' . $dates['end_date'];
				$tourdates = array_add($tourdates, $dates['id'], $value);		
			}
		}

		return View::make('bookings.index', compact('tour', 'tourid', 'tourdates'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /bookings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /bookings
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), Booking::$rules, Booking::$messages);

		if(Input::get('year') <= 1974) {
			return Redirect::route('too-old');
		}

		if ( $validator->fails() )
		{
		   return Redirect::route('bookings', array(Input::get('id'), Input::get('tour_date')))->withErrors($validator)->withInput(Input::except('captcha'));
		}

		//Store into database
		$booking = Booking::create(Input::all());

		//redirect to final confirmation page
		return Redirect::route('bookings.confirm', array($booking->_id));

		//redirect to NABTransact

		//Add in additional NAB Token to database result $booking->id

		//Email management with new booking details

		//Return user to Thank You page
	}

	public function finish() {
		//dd(Input::all());

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here https://dashboard.stripe.com/account
		Stripe::setApiKey("sk_test_Xt1knCmWusFxi3EbmtOj9R1e");

		// Create the charge on Stripe's servers - this will charge the user's card
		try {

			$payment_reference = Input::get('payment_reference');
			
			$charge = Stripe_Charge::create(array(
			  "amount" => Input::get('amount'), // amount in cents, again
			  "currency" => "AUD",
			  "card" => Input::get('stripeToken'),
			  "description" => $payment_reference
			));	


			if($charge) {

				return Redirect::route('thank-you')
					->with('payment_reference', $payment_reference)
					->with('charge', $charge);

				/*$booking = Booking::find(Input::get('payment_reference'));
				$booking->receipt = array(
										'charge_id' => $charge->id,
										'amount' => $charge->amount,
										'last4' => $charge->card->last4,

									);
				$booking->save();*/

			/*{ ["_apiKey":protected]=> string(32) "sk_test_Xt1knCmWusFxi3EbmtOj9R1e" [
			"_values":protected]=> array(25) { 
			["id"]=> string(27) "ch_14xzNZC5uUJ5MaNh9lgybyVQ" 
			["object"]=> string(6) "charge" 
			["created"]=> int(1415792021) 
			["livemode"]=> bool(false) 
			["paid"]=> bool(true) 
			["amount"]=> int(248700) 
			["currency"]=> string(3) "aud" 
			["refunded"]=> bool(false) 
			["card"]=> object(Stripe_Card)
					{ 
					["_apiKey":protected]=> string(32) "sk_test_Xt1knCmWusFxi3EbmtOj9R1e" 
					["_values":protected]=> array(21) { 
						["id"]=> string(29) "card_14xzNUC5uUJ5MaNhgHKD4sYw" 
						["object"]=> string(4) "card" 
						["last4"]=> string(4) "4242" 
						["brand"]=> string(4) "Visa" 
						["funding"]=> string(6) "credit" 
						["exp_month"]=> int(6) 
						["exp_year"]=> int(2015) 
						["fingerprint"]=> string(16) "IO9nUSb05A6bsUOR" 
						["country"]=> string(2) "US" 
						["name"]=> string(23) "mick@5150studios.com.au" 
						["address_line1"]=> NULL 
						["address_line2"]=> NULL 
						["address_city"]=> NULL 
						["address_state"]=> NULL 
						["address_zip"]=> NULL 
						["address_country"]=> NULL 
						["cvc_check"]=> string(4) "pass" 
						["address_line1_check"]=> NULL 
						["address_zip_check"]=> NULL 
						["dynamic_last4"]=> NULL 
						["customer"]=> NULL } 


				return 'finished';*/

				return Redirect::route('thank-you', array(Input::get('payment_reference')));
			}

			return Redirect::route('bookings.confirm', array($booking->_id));


		} catch(Stripe_CardError $e) {

		  // The card has been declined
			$booking = Booking::find(Input::get('payment_reference'));

			return Redirect::route('bookings.confirm', array($booking->_id))->withErrors('message', $e);

		}
	}


	public function confirm($id) {

		$booking = Booking::find($id);
		return View::make('bookings.confirm', compact('booking'));

	}

	public function complete() {

		$booking = Booking::find(Input::get('payment_reference'));
		$booking->receipt = Input::all();
		$booking->save();

		return true;
	}

	/**
	 * Display the specified resource.
	 * GET /bookings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /bookings/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /bookings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /bookings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}