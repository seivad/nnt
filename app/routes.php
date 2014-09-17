<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Booking A Tour Page
//Route::get('/bookings', array('uses' => 'BookingsController@index'));
Route::get('/bookings/complete', array('uses' => 'BookingsController@complete'));
Route::get('/bookings/confirm/{id?}', array('as' => 'bookings.confirm', 'uses' => 'BookingsController@confirm'));
Route::get('/bookings/{id?}/{tourid?}', array('as' => 'bookings', 'uses' => 'BookingsController@index'));
Route::post('/bookings', array('as' => 'bookings.store', 'before' => 'csrf', 'uses' => 'BookingsController@store'));

//Middle Of The World Tour Page
Route::get('/tours/middle-of-the-world', array('as' => 'middle-of-the-world', 'uses' => 'ToursController@middleOfTheWorld'));



//Pages
Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));
Route::get('/about', array('as' => 'about', 'uses' => 'PagesController@about'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'PagesController@contact'));
Route::get('/tours', array('as' => 'tours', 'uses' => 'ToursController@index'));
Route::get('/privacy', array('as' => 'privacy', 'uses' => 'PagesController@privacy'));
Route::get('/terms-and-agreements', array('as' => 'terms', 'uses' => 'PagesController@terms'));
Route::get('/thank-you', array('as' => 'thank-you', 'uses' => 'PagesController@thankyou'));


Route::get('/email', function() {

	$booking = Booking::find('541838f7fa4634e1078aa7b8');
	$tour = Tour::find($booking->id);

	Mail::send('emails.booking', compact('booking', 'tour'), function($message) use ($booking)
	{
	    $message->to($booking->email, $booking->first_name . ' ' . $booking->last_name)->subject('New Booking at Not Normal Tours');
	});

	return 'email sent';
});

Route::get('/email/view', array(function() {

	$booking = Booking::find('541838f7fa4634e1078aa7b8');
	$tour = Tour::find($booking->id);

	return View::make('emails.booking', compact('booking', 'tour'));
}));


Route::get('/test', function() {

			$booking = Booking::find('541838f7fa4634e1078aa7b8');

			$tour = Tour::where('dates.id', 572541906)->decrement('dates.$.spaces');

			return 'woo!';

});




/*Route::get('/', array('as' => 'home', function()
{

	$tour = Tour::first();
	$tour->price = array('total' => 175000, 'deposit' => 25000);
	$tour->logo = array('/images/tours/middle-of-the-world/logo.png', '/images/tours/middle-of-the-world/logo@2x.png');
	$tour->text_logo = '/images/tours/middle-of-the-world/text-logo.png';
	$tour->info = array(
		'included' => array('Hotel Accommodation', 'All Transportation', 'Breakfast', 'Tour Guide At All Times'),
		'not_included' => array('Airline Ticket', 'Handicrafts and Drinks'),
		'group_size' => 16,
		'tour' => '11 Days, The Middle Of The World Tour',
		'transport' => array('Plane', 'Bus'),
		'accommodation' => array('Hotel', 'Resort'),
		'begin' => 'Guayaquil, Ecuador',
		'finish' => 'Cali, Colombia',
	);
	$tour->dates = array(
		array(
			'id' => mt_rand(),
			'start_date' => '26/09/2014',
			'end_date' => '07/10/2014',
			'price' => 175000,
			'spaces' => 3
		),
		array(
			'id' => mt_rand(),
			'start_date' => '8/10/2014',
			'end_date' => '19/10/2014',
			'price' => 180000,
			'spaces' => 1
		),
		array(
			'id' => mt_rand(),
			'start_date' => '20/10/2014',
			'end_date' => '31/10/2014',
			'price' => 175000,
			'spaces' => 0
		),
	);
	$tour->title = 'Middle Of The World Tour ';
	$tour->length = '11 Days';
	$tour->tagline = 'See the "EQUATOR" line, and enjoy the unique ritual standing in both halfs of the world.';
	$tour->description = 'A tour that will offer you a different ways of celebrate the beauty of its own magical site. Night life with the local beautiful “latino” girls will make the tour even more exhotic, and joyable. Try the best local drinks while the music trasport you to a real “fiesta” happening in the center of the planet.';
	$tour->reviews = array(
		array('name' => 'Dan S.', 'review' => 'I thoroughly enjoyed my trip, tour guide was great and the atmosphere - just perfect', 'rating' => 4 )
	);
	$tour->gallery = array(
		'/images/tours/middle-of-the-world/ecuador-mountains.jpg',
		'/images/tours/middle-of-the-world/girls.jpg',
		'/images/tours/middle-of-the-world/party.jpg',
	);
	$tour->featured_image = '/images/tours/middle-of-the-world/middle-of-the-world-feature.jpg';
	$tour->footer_image = '/images/tours/middle-of-the-world/footer.jpg';
	$tour->additional_trips = array(
		'Galapagos Islands cruises', 
		'Amazon Jungle “Ayahuashca Journey”',
		'Fun in the volcanoes tour',
	);
	$tour->itinerary = array(
		array(
			'day' => 'Day 1',
			'title' => 'Arrival To Ecuador',
			'activities' => array('Introduction of the tour and the tour guide at the Airport', 'Transfer to the hotel', 'Briefing of the whole tour and next day information', 'Jet lag rest')
		),
		array(
			'day' => 'Day 2',
			'title' => 'Montanita',
			'activities' => array('Breakfast', 'Drive to "Montanita" (Surf laid back party town)', 'Afternnon / evening: Official welcome enjoying music, drinks and the beautiful local experience')
		),
		array(
			'day' => 'Day 3',
			'title' => 'Quito',
			'activities' => array('Breakfast and easy morning resting from welcome party', 'Travel to Quito the capital and "center of the world"', 'Visit night life')
		),
		array(
			'day' => 'Day 4',
			'title' => 'Quito Down Town / Banios',
			'activities' => array('Breakfast', 'Morning : Visit the historical Down Town of Quito', 'Afternoon: Travel to Banios (Cool party town)')
		),
		array(
			'day' => 'Day 5 and 6',
			'title' => 'Bike Day',
			'activities' => array('Breakfast', 'Ride on bike and enjoy the valley, volcanoes and door to the jungle on bicycle', 'Rafting and Cayoning', 'Night life')
		),
		array(
			'day' => 'Day 7',
			'title' => 'Ayahuashca Journey day',
			'activities' => array('(A journey managed by a Shaman local indigenous to transport you anywhere) Journey unknown by the western world')
		),
		array(
			'day' => 'Day 8',
			'title' => '"MIDDLE OF THE WORLD"',
			'activities' => array('Breakfast and travel back to the center of the World', 'Afternoon: Visit the “Equator Line” (Ritual)', 'Celebrate night life')
		),
		array(
			'day' => 'Day 9',
			'title' => 'Cali - Colombia',
			'activities' => array('Flight to Cali', 'Aguardiente Welcome party and hot local latino party girls')
		),
		array(
			'day' => 'Day 10',
			'title' => 'A Day in Cali of celebration',
			'activities' => array('Carrera celebration day')
		),
		array(
			'day' => 'Day 11',
			'title' => 'Departure',
			'activities' => array('Depart back to the Airport or continue on for further travel')
		),
	);
	$tour->save();

	return View::make('hello');
}));*/



