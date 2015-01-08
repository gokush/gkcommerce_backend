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
Route::group(array('prefix' => 'api', 'namespace' => 'App\Controllers\Api'),
	function() {
		Route::resource('address', 'AddressController');
		Route::resource('product', 'ProductController');
		Route::resource('/user/', 'UserController');
});

// Route::resource('oauth/login', 'App\Controllers\OAuth\LoginController');
Route::get('o2c.html', function() {
	return View::make('oauth/o2c');
});

Route::controller('oauth', 'App\Controllers\OAuth\OAuthController');

// Route::post('oauth/access_token', 'OAuthController@accessToken');
// Route::post('oauth/access_token', 'OAuthController@accessToken');

// Route::get('oauth/authorize', ['before' => 'check-authorization-params|auth', function() {
//     // display a form where the user can authorize the client to access it's data
//     return View::make('oauth/authorization-form', array("params" => Input::all()));
// }]);
//
// Route::post('oauth/authorize', ['as' => 'post oauth authorize',
// 	'before' => 'csrf|check-authorization-params|auth', function() {
//
//     $params['user_id'] = Auth::user()->id;
//
//     $redirectUri = '';
//
//     // if the user has allowed the client to access its data,
// 	// redirect back to the client with an auth code
//     if (Input::get('approve') !== null) {
//         $redirectUri = Authorizer::issueAuthCode('user',
// 			$params['user_id'], $params);
//     }
//
//     // if the user has denied the client to access its data, redirect back to the client with an error message
//     if (Input::get('deny') !== null) {
//         $redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
//     }
//
//     return Redirect::to($redirectUri);
// }]);
//
// Route::post('oauth/access_token', function() {
//     return Response::json(Authorizer::issueAccessToken());
// });
