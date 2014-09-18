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

	public function inquiry() {

		$rules = array(
			'captcha' => 'required|captcha',
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'message' => 'required'
		);

		$messages = array(
		    'captcha' => 'Please provide the captcha code.',
		);

		$input = Input::all();

		$validator = Validator::make($input, $rules, $messages);

		if ( $validator->fails() )
		{
		   return Redirect::route('contact')->withErrors($validator)->withInput(Input::except('captcha'));
		}

		Mail::queue('emails.inquiry', compact('input'), function($message)
		{
		    $message->to('mick@5150studios.com.au', 'Not Normal Tours')->subject('Not Normal Tours Inquiry Form Submission');
		});

		Session::flash('message', 'Your message has been sent successfully!');
		return Redirect::route('contact');

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
			$tour = Tour::where('dates.id', (int) $booking->tour_date)->decrement('dates.$.spaces');

			Mail::queue('emails.booking', compact('booking', 'tour'), function($message)
			{
			    $message->to('mick@5150studios.com.au', 'Not Normal Tours')->subject('New Booking at Not Normal Tours');
			});

			

			return View::make('pages.thankyou');
			
		}

		return Redirect::to('/');

		
	}		

}