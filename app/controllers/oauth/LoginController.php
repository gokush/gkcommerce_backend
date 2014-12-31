<?php namespace App\Controllers\OAuth;

use \Symfony\Component\HttpFoundation\JsonResponse;

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
            return new JsonResponse($validator->toJson(), 401);
        } else {
            $authencated = \Auth::attempt(
                array('username' => \Input::get('username'),
                      'password' => \Input::get('password')));
            if ($authencated)
                return new JsonResponse(array(), 200);
            else
                return new JsonResponse(
                    array("message" => "错误的用户名或密码，请重新输入。"),
                    401);
        }
    }
}
