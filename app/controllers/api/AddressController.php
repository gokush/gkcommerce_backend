<?php namespace App\Controllers\Api;

use LucaDegasperi\OAuth2Server\Authorizer;
use Swagger\Annotations as SWG;
use \Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @SWG\Resource(
 *     apiVersion="0.1",
 *     swaggerVersion="1.2",
 *     resourcePath="/address",
 *     basePath="http://127.0.0.1:8000/api",
 *     description="操作用户地址数据"
 * )
 */
class AddressController extends BaseResourceController
{
    public $rules;
    public $user;
    public $columns;

    public function __construct(Authorizer $authorizer)
    {
        parent::__construct($authorizer);
        $this->beforeFilter('oauth');

        $this->rules = array(
            'name' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'street' => 'required',
            'postcode' => 'required',
            'phone' => 'required'
        );
        $this->columns = array(
            "user_id", "name", "province", "city", "district",
            "province_id", "city_id", "district_id", "street", "postcode",
            "phone");
    }

    /**
     * @SWG\Api(
     *     path="/address",
     *     @SWG\Operation(
     *         method="GET",
     *         summary="获取用户的地址",
     *         notes="返回用户的所有地址记录",
     *         type="array",
     *         items="$ref:Address",
     *         authorizations="oauth2.read:address",
     *     )
     * )
     */
    public function index()
    {
        $addresses = \Address::where("user_id", "=", $this->getUser()->id)
            ->orderBy("id", "desc")->get($this->columns);
        return new JsonResponse($addresses);
    }

    /**
     * @SWG\Api(
     *     path="/address",
     *     @SWG\Operation(
     *         method="POST",
     *         summary="保存一个新的地址",
     *         notes="",
     *         @SWG\Produces("application/json"),
     *         @SWG\Consumes("application/x-www-form-urlencoded"),
     *         @SWG\Parameter(
     *             name="name",
     *             description="用户的真实姓名",
     *             required=true,
     *             type="string",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="province_id",
     *             description="地址所在省的id",
     *             required=true,
     *             type="integer",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="city_id",
     *             description="地址所在市的id",
     *             required=true,
     *             type="integer",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="district_id",
     *             description="地址所在地区的id",
     *             required=true,
     *             type="integer",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="street",
     *             description="街道地址",
     *             required=true,
     *             type="string",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="postcode",
     *             description="邮政编码",
     *             required=true,
     *             type="string",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         @SWG\Parameter(
     *             name="phone",
     *             description="手机号码",
     *             required=true,
     *             type="string",
     *             paramType="form",
     *             allowMultiple=false
     *         ),
     *         authorizations="oauth2.write:address",
     *         @SWG\ResponseMessage(code=200, message="保存新增地址成功"),
     *         @SWG\ResponseMessage(code=422, message="表单验证失败")
     *     )
     * )
     */
    public function store()
    {
        $this->beforeFilter('oauth:write:address');
        $validator = \Validator::make(\Input::all(), $this->rules);

        if ($validator->fails()) {
            return new JsonResponse($validator->toJson("Address"), 422);
        } else {
            $address = \Address::create(
                array_merge(\Input::all(),
                            \Region::regionNameAsKey(\Input::all()),
                            array("user_id" => $this->user->id)));

            return new JsonResponse($address);
        }
    }

    /**
     * @SWG\Api(
     *     path="/address/{addressId}",
     *     @SWG\Operation(
     *         method="GET",
     *         summary="通过地址的id查找一条用户的地址",
     *         notes="",
     *         type="Address",
     *         @SWG\Parameter(
     *             name="addressId",
     *             description="要查找的地址的id",
     *             required=true,
     *              type="integer",
     *             paramType="path",
     *             allowMultiple=false
     *         ),
     *         authorizations="oauth2.read:address",
     *         @SWG\ResponseMessage(code=200, message="Success"),
     *         @SWG\ResponseMessage(code=404, message="失败，这条地址不存在")
     *     )
     * )
     */
    public function show($id)
    {
        $this->beforeFilter('oauth:read:address');
        $address = \Address::find($id, $this->columns)
            ->where("user_id", "=", $this->user->id)->first();
        if (null == $address) {
            return $this->responseNotFound('Address', 'id');
        }
        return json_encode($address);
    }

    /**
    * @SWG\Api(
    *     path="/address/{addressId}",
    *     @SWG\Operation(
    *         method="PUT",
    *         summary="更新一个已经存在的地址",
    *         notes="",
    *         type="void",
    *         @SWG\Produces("application/json"),
    *         @SWG\Consumes("application/x-www-form-urlencoded"),
    *         @SWG\Parameter(
    *             name="addressId",
    *             description="地址的id",
    *             required=true,
    *             type="integer",
    *             paramType="path",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="name",
    *             description="用户的真实姓名",
    *             required=true,
    *             type="string",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="province_id",
    *             description="地址所在省的id",
    *             required=true,
    *             type="integer",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="city_id",
    *             description="地址所在市的id",
    *             required=true,
    *             type="integer",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="district_id",
    *             description="地址所在地区的id",
    *             required=true,
    *             type="integer",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="street",
    *             description="街道地址",
    *             required=true,
    *             type="string",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="postcode",
    *             description="邮政编码",
    *             required=true,
    *             type="string",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         @SWG\Parameter(
    *             name="phone",
    *             description="手机号码",
    *             required=true,
    *             type="string",
    *             paramType="form",
    *             allowMultiple=false
    *         ),
    *         authorizations="oauth2.write:address",
    *         @SWG\ResponseMessage(code=200, message="保存新增地址成功"),
    *         @SWG\ResponseMessage(code=422, message="表单验证失败")
    *     )
    * )
    */
    public function update($id)
    {
        $this->beforeFilter('oauth:write:address');
        $address = \Address::find($id);
        if (null == $address) {
            return $this->responseNotFound('Address', 'id');
        }
        $validator = \Validator::make(\Input::all(), $this->rules);

        if ($validator->fails()) {
            return new JsonResponse($validator->toJson("Address"), 422);
        } else {
            $address->update(
                array_merge(\Input::all(),
                            \Region::regionNameAsKey(\Input::all())));

            return new JsonResponse($address);
        }
    }


    /**
     * @SWG\Api(
     *     path="/address/{addressId}",
     *     @SWG\Operation(
     *         method="DELETE",
     *         summary="删除一条用户的地址",
     *         notes="",
     *         type="void",
     *         @SWG\Parameter(
     *             name="addressId",
     *             description="要删除的地址的id",
     *             required=true,
     *             type="integer",
     *             paramType="path",
     *             allowMultiple=false
     *         ),
     *         authorizations="oauth2.write:address",
     *         @SWG\ResponseMessage(code=204, message="成功删除用户的地址"),
     *         @SWG\ResponseMessage(code=404, message="删除失败，这条地址不存在")
     *     )
     * )
     */
    public function destroy($id)
    {
        $this->beforeFilter('oauth:write:address');
        $address = \Address::find($id);
        if (null == $address) {
            return $this->responseNotFound('Address', 'id');
        }
        \Address::destroy($id);
        return new JsonResponse("", 204);
    }
}
