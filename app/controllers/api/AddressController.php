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
		$user = \Auth::user();
		$validator = \Validator::make(\Input::all(), $rules);

		if ($validator->fails()) {
			$response = \Response::make($validator->toJson("Address"), 422);
			$response->header('Content-Type', 'application/json');
			return $response;
		} else {
			$address_raw = \Input::all();
			$address_raw['user_id'] = $user->id;
			$regions = \Region::findMany(array(\Input::get("province_id"), 
				\Input::get("city_id"), \Input::get("district_id")));
			list($province, $city, $district) = $regions;
			$address_raw['province'] = $province->name;
			$address_raw['province_id'] = $province->id;
			$address_raw['city'] = $city->name;
			$address_raw['city_id'] = $city->id;
			$address_raw['district'] = $district->name;
			$address_raw['district_id'] = $district->id;
			
			$address = \Address::create($address_raw);

			$response = \Response::make($address->toJson());
			$response->header('Content-Type', 'application/json');
			return $response;
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
