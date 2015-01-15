<?php namespace App\Controllers\Api;

use \Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @SWG\Resource(
 *     apiVersion="0.1",
 *     swaggerVersion="1.2",
 *     resourcePath="/user",
 *     basePath="http://127.0.0.1:8000/api",
 *     description="用户"
 * )
 */
class UserController extends BaseResourceController
{
	public function index()
	{

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

	/**
	 * @SWG\Api(
	 *     path="/user/{userId?}",
	 *     @SWG\Operation(
	 *         method="GET",
	 *         summary="通过地址的id查找用户信息",
	 *         notes="",
	 *         type="User",
	 *         @SWG\Parameter(
	 *             name="userId",
	 *             description="要查找的用户的id",
	 *             type="integer",
	 *             paramType="path",
	 *             allowMultiple=false
	 *         ),
	 *         authorizations="oauth2.read:user",
	 *         @SWG\ResponseMessage(code=200, message="Success"),
	 *         @SWG\ResponseMessage(code=404, message="失败，用户不存在")
	 *     )
	 * )
	 */
	public function show($id)
	{
		return new JsonResponse($this->getUser());
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