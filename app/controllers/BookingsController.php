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

		$tour = Tour::find($id)->first();

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


	public function confirm($id) {

		$booking = Booking::find($id)->first();

		return View::make('bookings.confirm', compact('booking'));

	}

	public function complete() {

		$booking = Booking::find(Input::get('payment_reference'))->first();
		$booking->payment = Input::all();
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