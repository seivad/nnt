<?php

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Booking extends Eloquent {

	use SoftDeletingTrait;
	
	protected $guarded = [];

	protected $table = 'bookings';

	protected $collection = 'bookings';

	public static $rules = array(
		'captcha' => 'required|captcha',
		'title' => 'required',
	    'first_name' => 'required',
	    'last_name' => 'required',
	    'email' => 'required|email',
	    'phone' => 'required',
	    'gender' => 'required',
	    'day' => 'required',
	    'month' => 'required',
	    'year' => 'required',
	    'tour_date' => 'required',
	    'passport' => 'required',
	    'street_address' => 'required',
	    'suburb' => 'required',
	    'state' => 'required',
	    'country' => 'required',
	    'postcode' => 'required',
	    'terms' => 'required',
	    'price' => 'required'
	);

	public static $messages = array(
	    'captcha' => 'Please provide the captcha code.',
	);
}