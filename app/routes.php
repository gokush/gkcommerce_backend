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

Route::any('/doc/', array('uses' => 'DocumentController@index'));
Route::any('/doc/(:any)', array('uses' => 'DocumentController@swagger'));
Route::resource('/customer/address/', 'CustomerAddressController');
Route::resource('/user/', 'UserController');

// Route::post('oauth/access_token', 'OAuthController@accessToken');
// Route::post('oauth/access_token', 'OAuthController@accessToken');
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});