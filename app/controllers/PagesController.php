<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.home');
	}

	public function about()
	{
		return View::make('pages.about');
	}

	public function contact()
	{
		return View::make('pages.contact');
	}

	public function terms()
	{
		return View::make('pages.terms');
	}

	public function privacy()
	{
		return View::make('pages.privacy');
	}

	public function thankyou()
	{

		if(Input::get('payment_reference'))
		{
			$booking = Booking::find(Input::get('payment_reference'));
			$booking->receipt = Input::all();
			$booking->save();

			$tour = Tour::find($booking->id);

			foreach($tour->dates as $date) {
				if($date['id'] == $booking->tour_date) {
					$date['spaces'] = $date['spaces']--;
				}
			}
			$tour->touch();
			$tour->save();
			
		}

		return View::make('pages.thankyou');
	}		

}