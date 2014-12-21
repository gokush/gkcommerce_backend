<?php namespace App\Controllers\Api;

class AddressController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'province_id' => 'required',
			'city_id' => 'required',
			'district_id' => 'required',
			'street' => 'required',
			'postcode' => 'required',
			'phone' => 'required'
		);

		$validator = \Validator::make(\Input::all(), $rules);

		if ($validator->fails()) {
			$response = \Response::make($validator->toJson("Address"), 422);
			$response->header('Content-Type', 'application/json');
			return $response;
		} else {
		}
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
