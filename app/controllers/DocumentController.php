<?php

use Swagger\Annotations as SWG;
use Swagger\Swagger;

class DocumentController extends \BaseController
{
	protected $swagger;
	public function __construct()
	{
		$this->swagger = new Swagger(array(app_path("controllers"))
			/*array(app_path('composer'))*/);
	}

	public function index()
	{
		$response = $this->swagger->getResourceList(array("output" => "array"));
		return Response::json($response);
	}

	public function swagger($resource = '')
	{
		$response = $this->swagger->getResource('/$resource',
			array("output" => "array"));
		return Response::json($response);
	}
}