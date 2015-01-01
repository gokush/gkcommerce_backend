<?php  namespace App\Controllers\OAuth;

use LucaDegasperi\OAuth2Server\Authorizer;
use \Symfony\Component\HttpFoundation\JsonResponse;

class OAuthController extends \BaseController
{
    protected $authorizer;
    protected $user;
    protected $ownerId;
    static public $mockOwnerId;

    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;

        $this->beforeFilter('auth', ['only' => ['getAuthorize', 'postAuthorize']]);
        // $this->beforeFilter('csrf', ['only' => 'postAuthorize']);
        $this->beforeFilter('check-authorization-params', ['only' => ['getAuthorize', 'postAuthorize']]);
    }

    public function getOwnerId()
    {
        if (OAuthController::$mockOwnerId)
            return OAuthController::$mockOwnerId;
        if (!$this->ownerId)
            $this->ownerId = $this->authorizer
                 ->getChecker()
                 ->getAccessToken()
                 ->getSession()
                 ->getOwnerId();
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    public function getUser()
    {
        if (null == $this->user) {
            $this->setUser(User::find($this->getOwnerId()));
        }
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
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
            $redirectUri = // $this
                // ->authorizer
                // ->issuer
                \App::make('League\OAuth2\Server\AuthorizationServer')
                ->getGrantType("implicit")
                ->completeFlow();
       }
       exit();

        if (\Input::get('deny') !== null) {
            $redirectUri = $this->authorizer->authCodeRequestDeniedRedirectUri();
        }
        var_dump($redirectUri);
        return;
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
