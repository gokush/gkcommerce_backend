<?php namespace App\Controllers\Api;

use LucaDegasperi\OAuth2Server\Authorizer;

class AddressController extends \OAuthController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $rules;
	public $user;
	public $columns;

	public function __construct(Authorizer $authorizer)
	{
		parent::__construct($authorizer);

		$this->rules = array(
			'name' => 'required',
			'province_id' => 'required',
			'city_id' => 'required',
			'district_id' => 'required',
			'street' => 'required',
			'postcode' => 'required',
			'phone' => 'required'
		);
		$this->columns = array(
			"user_id", "name", "province", "city", "district", 
			"province_id", "city_id", "district_id", "street", "postcode", 
			"phone");
	}

	public function index()
	{
		var_dump($this->getUser()->id);
		$addresses = \Address::where("user_id", "=", $this->getUser()->id)
			->orderBy("id", "desc")->get($this->columns);
		return $this->response(json_encode($addresses));
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
		$address = \Address::find($id, $this->columns)
			->where("user_id", "=", $this->getUser()->id)->first();
		if (null == $address) {
			return $this->notFoundResponse();
		}
		return json_encode($address);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo $id;
		$address = \Address::find($id);
		if (null == $address) {
			return $this->notFoundResponse();
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
		echo "here";
		echo $id;
		$address = \Address::find($id);
		if (null == $address) {
			return $this->notFoundResponse();
		}
		\Address::destroy($id);
		return $this->response("", 204);
	}

	protected function notFoundResponse()
	{
		$message = array(
			"message" => "地址对象不存在。",
			"errors"  => array(
				"resource" => "Address",
				"field"    => "id",
				"message"  => "地址对象不存在",
				"code"     => "NotExists"
			)
		);
		return $this->response($message, 404);
	}
}
