<?php namespace App\Controllers\Api;

class AddressController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $rules;
	public $user;

	public function __construct()
	{
		$this->rules = array(
			'name' => 'required',
			'province_id' => 'required',
			'city_id' => 'required',
			'district_id' => 'required',
			'street' => 'required',
			'postcode' => 'required',
			'phone' => 'required'
		);
		$this->user = \Auth::user();
	}

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
		$validator = \Validator::make(\Input::all(), $this->rules);

		if ($validator->fails()) {
			return $this->response($validator->toJson("Address"), 422);
		} else {
			$address = \Address::create(
				array_merge(\Input::all(),
					        \Region::regionNameAsKey(\Input::all()), 
					        array("user_id" => $this->user->id)));

			return $this->response($address->toJson());
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$address = \Address::find($id);
		if (null == $address) {
			return $this->response(array(
				"message" => "地址对象不存在。",
				"errors" => array(
					"resource": "Address",
					"field": "id",
					"message": "地址对象不存在",
					"code": "NotExists"
				)
				), 400);
		}
		$validator = \Validator::make(\Input::all(), $this->rules);

		if ($validator->fails()) {
			return $this->response($validator->toJson("Address"), 422);
		} else {
			$address = \Address::create(
				array_merge(\Input::all(),
					        \Region::regionNameAsKey(\Input::all()), 
					        array("user_id" => $this->user->id)));

			return $this->response($address->toJson());
		}
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
