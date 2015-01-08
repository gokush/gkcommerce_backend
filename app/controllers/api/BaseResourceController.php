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

    /**
     * 构造方法
     * @param LucaDegasperi\OAuth2Server\Authorizer $authorizer
     * @see AddressControllerTest::setUp
    */
    public function __construct(Authorizer $authorizer)
    {
        // 如果没有注册userFactory，注册一个默认的UserFactory
        // 单元测试的时候可以
        if (!\App::bound('userFactory')) {
            \App::bind('userFactory', function() use ($authorizer) {

                if (null == $authorizer->getChecker()->getAccessToken())
                    return null;
                $userId = $authorizer->getResourceOwnerId();
                return \User::find($userId);
            });
        }

        $this->user = \App::make('userFactory');
    }

    public function getUser()
    {

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
