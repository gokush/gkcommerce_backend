<?php namespace App\Controllers\Api;

class  UserController extends \BaseController
{
	public function index()
	{
		new \App\Controllers\AddressController();
	}

	public function create()
	{
	}

	public function store()
	{
		$rules = array(
			'username' => 'required_without_all:email,cellphone',
			'email' => 'email|required_without_all:username,cellphone',
			'cellphone' => array('regex:^13[0-9]{1}[0-9]{8}$|15[0189]{1}' . 
				'[0-9]{8}$|189[0-9]{8}$',
				'required_without_all:username,cellphone'),
			'password' => 'required|between:3,50'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			$response = Response::make($validator->toJson("User"), 422);
			$response->header('Content-Type', 'application/json');
			return $response;
		} else {
		}
	}

	public function show($id)
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}
}