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

			//$tour = Tour::find($booking->id);

			//$tour = Tour::where('_id', '=', $booking->id)->get();

			//$tour = Tour::raw()->update(array("dates.id" => 572541906), array( "$inc" => array( "dates.$.spaces" => -1)));
			//$tour = Tour::raw('db.tours.update({ "dates.id": 572541906 }, { $inc: { "dates.$.spaces": -1 } } )');


			//db.tours.update({ "dates.id": 572541906 }, { $inc: { "dates.$.spaces": -1 } } )

			//var_dump($tour);


			/*foreach($tour->dates as &$date) {
				if( $date['id'] == $booking->tour_date ) {
					//echo 'dateID and Tour Date match!';
					if( $date['spaces'] > 0 ) {
						//echo 'Spaces is more than 0';
						$date['spaces'] = $date['spaces']--;
					}
				}
			}*/
			//$tour->save();
			$tour = Tour::find($booking->id);

			Mail::send('emails.booking', compact('booking', 'tour'), function($message) use ($booking)
			{
			    $message->to($booking->email, $booking->first_name . ' ' . $booking->last_name)->subject('New Booking at Not Normal Tours');
			});
			
		}

		return View::make('pages.thankyou');
	}		

}