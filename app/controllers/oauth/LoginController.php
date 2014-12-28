<?php namespace App\Controllers\OAuth;

class LoginController extends \BaseController
{
    public function index()
    {
        return \View::make('oauth.index');
    }

    public function store()
    {
        $rules = array(
            "username" => "required",
            "password" => "required"
        );

        $validator = \Validator::make(\Input::all(), $rules);
        if ($validator->fails()) {

        } else {

        }
    }
}
