<?php namespace App\Controllers\Seller;

use Illuminate\Routing\Controller;

class DashboardController extends \BaseController
{
	protected $layout = 'layouts.seller_base';

	public function getIndex()
	{
		$this->layout->content = \View::make('seller.dashboard');
	}
}