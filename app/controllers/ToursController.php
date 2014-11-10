<?php

class ToursController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tours
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('tours.index');
	}


	public function middleOfTheWorld()
	{


		$tour = Cache::rememberForever('middleOfTheWorld', function()
		{
		  return Tour::first();
		});

		//$tour = Tour::first();

		return View::make('tours.middle-of-the-world', compact('tour'));
	}


}