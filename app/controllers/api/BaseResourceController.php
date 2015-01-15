<?php namespace App\Controllers\Api;

use LucaDegasperi\OAuth2Server\Authorizer;
use Illuminate\Routing\Controller;
use SebastianBergmann\Exporter\Exception;

class BaseResourceController extends Controller
{
    /**
     * 当前认证的用户
     * @var User
     */
    public $user;

    protected $authorizer;
    /**
     * 构造方法
     * @param LucaDegasperi\OAuth2Server\Authorizer $authorizer
     * @see AddressControllerTest::setUp
    */
    public function __construct(Authorizer $authorizer)
    {
        // 如果没有注册userFactory，注册一个默认的UserFactory
        // 单元测试的时候可以
        $this->authorizer = $authorizer;
        if (!\App::bound('userFactory')) {
            \App::bind('userFactory', function() use ($authorizer) {
                return $this->getUser();
            });
        }

        $this->user = \App::make('userFactory');
    }

    function getUserId()
    {
        if (null == $this->authorizer->getChecker()->getAccessToken())
            return null;
        return $this->authorizer->getResourceOwnerId();
    }

    public function getUser()
    {
        return \User::find($this->getUserId());
    }

    public function responseNotFound($resource, $field)
    {
        $message = array(
            "message" => "对象不存在。",
            "errors"  => array(
                "resource" => $resource,
                "field"    => $field,
                "message"  => "对象不存在",
                "code"     => "NotExists"
            )
        );
        return new JsonResponse($message, 404);
    }
}
