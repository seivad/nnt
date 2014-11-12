<?php

//Booking A Tour Page
Route::get('/bookings/complete', array('uses' => 'BookingsController@complete'));
Route::get('/bookings/confirm/{id?}', array('as' => 'bookings.confirm', 'uses' => 'BookingsController@confirm'));
Route::post('/bookings/finish', array('as' => 'bookings.finish', 'uses' => 'BookingsController@finish'));
Route::get('/bookings/{id?}/{tourid?}', array('as' => 'bookings', 'uses' => 'BookingsController@index'));
Route::post('/bookings', array('as' => 'bookings.store', 'before' => 'csrf', 'uses' => 'BookingsController@store'));

//Middle Of The World Tour Page
Route::get('/tours/middle-of-the-world', array('as' => 'middle-of-the-world', 'uses' => 'ToursController@middleOfTheWorld'));

//Pages
Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));
Route::get('/about', array('as' => 'about', 'uses' => 'PagesController@about'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'PagesController@contact'));
Route::post('/contact', array('uses' => 'PagesController@inquiry'));
Route::get('/tours', array('as' => 'tours', 'uses' => 'ToursController@index'));
Route::get('/privacy', array('as' => 'privacy', 'uses' => 'PagesController@privacy'));
Route::get('/terms-and-agreements', array('as' => 'terms', 'uses' => 'PagesController@terms'));
Route::get('/thank-you', array('as' => 'thank-you', 'uses' => 'PagesController@thankyou'));
Route::get('/might-not-be-for-you', array('as' => 'too-old', 'uses' => 'PagesController@old'));


App::missing(function($exception)
{
    return Response::view('pages.404', array(), 404);
});

/*Route::get('/test', function()
{

	$tour = Tour::first();
	$tour->price = array('total' => 248700, 'deposit' => 25000);
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
			'start_date' => '18/12/2014',
			'end_date' => '28/12/2014',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '02/01/2015',
			'end_date' => '12/01/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '15/01/2015',
			'end_date' => '25/01/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '29/01/2015',
			'end_date' => '08/02/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '12/02/2015',
			'end_date' => '22/02/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '26/02/2015',
			'end_date' => '08/03/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '12/03/2015',
			'end_date' => '22/03/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '26/03/2015',
			'end_date' => '05/04/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '09/04/2015',
			'end_date' => '19/04/2015',
			'price' => 248700,
			'spaces' => 16
		),
		array(
			'id' => mt_rand(),
			'start_date' => '23/04/2015',
			'end_date' => '04/05/2015',
			'price' => 248700,
			'spaces' => 16
		)
	);
	$tour->title = 'Middle Of The World Tour';
	$tour->length = '11 Days';
	$tour->tagline = 'See the "Equator" line, and enjoy the unique ritual standing in both halfs of the world.';
	$tour->description = 'A tour that will offer you a different ways of celebrate the beauty of its own magical site. Night life with the local beautiful "latino" girls will make the tour even more exotic, and joyable. Try the best local drinks while the music trasports you to a real "fiesta" partying in the center of the planet.';
	$tour->reviews = array(
		array('name' => 'Dan S.', 'review' => 'I thoroughly enjoyed my trip, tour guide was great and the atmosphere - just perfect', 'rating' => 4 )
	);

	$tour->gallery = array(
		'/images/tours/middle-of-the-world/mountains.jpg',
		'/images/tours/middle-of-the-world/beach.jpg',
		'/images/tours/middle-of-the-world/night.jpg',
		'/images/tours/middle-of-the-world/girls.jpg',
		'/images/tours/middle-of-the-world/clubbing.jpg',
	);

	$tour->featured_image = '/images/tours/middle-of-the-world/middle-of-the-world-feature.jpg';
	$tour->footer_image = '/images/tours/middle-of-the-world/footer.jpg';
	$tour->additional_trips = array(
		'Galapagos Islands cruises'
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
			'title' => 'Amazing Jungle Journey day',
			'activities' => array('A journey with a local indigenous Shaman, with the option to drink a local Ayahuashca a traditional medicine used in spiritual healing ceremonies. This is a journey unknown by most the western world')
		),
		array(
			'day' => 'Day 8',
			'title' => '"MIDDLE OF THE WORLD"',
			'activities' => array('For centuries the Navy’s of the world have had a rite of passage ritual for passing the over the equator by boat for the first time. You can experience our take on this ceremony, as we cross the worlds equator')
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

	return 'updated';

});*/

