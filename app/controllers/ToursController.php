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

	public function middleOfTheWorld() {


		$tour = Tour::first();

		return View::make('tours.middle-of-the-world', compact('tour'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tours/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tours
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tours/{id}
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
	 * GET /tours/{id}/edit
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
	 * PUT /tours/{id}
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
	 * DELETE /tours/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}