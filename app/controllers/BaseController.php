<?php

use Illuminate\Routing\Controller;

class BaseController extends Controller
{
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function response($responseText, $statusCode=200)
	{
		$response = Response::make($responseText, $statusCode);
		$response->header('Content-Type', 'application/json');
		return $response;
	}
}
