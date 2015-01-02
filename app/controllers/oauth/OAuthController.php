<?php  namespace App\Controllers\OAuth;

use LucaDegasperi\OAuth2Server\Authorizer;
use \Symfony\Component\HttpFoundation\JsonResponse;

class OAuthController extends \BaseController
{
    protected $authorizer;

    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;

        $this->beforeFilter('auth', ['only' => ['getAuthorize', 'postAuthorize']]);
        $this->beforeFilter('csrf', ['only' => 'postAuthorize']);
        $this->beforeFilter('check-authorization-params', ['only' => ['getAuthorize', 'postAuthorize']]);
    }

    public function postAccessToken()
    {
         return Response::json($this->authorizer->issueAccessToken());
    }

    public function getAuthorize()
    {
        return \View::make('oauth.authorization-form',
            array("params" => http_build_query(\Input::all())));
    }

    public function postAuthorize()
    {
        // get the user id
        $params['user_id'] = \Auth::user()->id;

        $redirectUri = '';
        if (\Input::get('approve') !== null &&
            "code" == \Input::get("response_type")) {
            $redirectUri = $this->authorizer->issueAuthCode('user',
                $params['user_id'], $params);
        } else if (\Input::get('approve') !== null &&
                   "token" == \Input::get("response_type")) {
            $redirectUri = $this
                ->authorizer
                ->issueAccessTokenWithImplicit($params['user_id']);
       }

        if (\Input::get('deny') !== null) {
            $redirectUri = $this->authorizer->authCodeRequestDeniedRedirectUri();
        }
        return \Redirect::to($redirectUri);
    }

    public function getLogin()
    {
        return \View::make('oauth.login');
    }

    public function postLogin()
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
                      'password' => \Input::get('password')), true
                      );
            if ($authencated)
                return new JsonResponse(array(), 200);
            else
                return new JsonResponse(
                    array("message" => "错误的用户名或密码，请重新输入。"),
                    401);
        }
    }
}
