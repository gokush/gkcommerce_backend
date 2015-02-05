<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::any('/images/{all}', array('uses' => 'Goku\LaravelResize\ResizeController@show'))->where('all', '.*');
Route::any('/doc/', array('uses' => 'DocumentController@index'));
Route::any('/doc/(:any)', array('uses' => 'DocumentController@swagger'));
Route::group(array('prefix' => 'api', 'namespace' => 'App\Controllers\Api', 'before' => array('oauth')),
	function() {
		Route::resource('address', 'AddressController');
		Route::resource('product', 'ProductController');
		Route::resource('user', 'UserController');
});
Route::group(array('prefix' => 'seller', 
	'namespace' => 'App\Controllers\Seller'),
	function() {
		Route::controller('', 'DashboardController');
		Route::controller('dashboard', 'DashboardController');
		Route::controller('product', 'ProductController');
});

// Route::resource('oauth/login', 'App\Controllers\OAuth\LoginController');
Route::get('o2c.html', function() {
	return View::make('oauth/o2c');
});

Route::post('oauth/access_token', 'App\Controllers\OAuth\OAuthController@postAccessToken');
Route::controller('oauth', 'App\Controllers\OAuth\OAuthController');
