<?php namespace App\Controllers\Seller;

use Illuminate\Routing\Controller;

class ProductController extends \BaseController
{
	protected $layout = 'layouts.seller_base';

	public function index()
	{
		return \View::make('seller.product_list');
	}

	public function create()
	{
		return \View::make('seller.product_create');
	}
}