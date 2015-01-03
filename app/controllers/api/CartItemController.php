<?php  namespace App\Controllers\Api;

/**
* @SWG\Resource(
*     apiVersion="0.1",
*     swaggerVersion="1.2",
*     resourcePath="/cart/item/",
*     basePath="http://127.0.0.1:8000/api",
*     description="管理购物车项数据"
* )
*/
class CartItemController extends \BaseResourceController
{
    /**
    * @SWG\Api(
    *     path="/cart/{cartId}/item",
    *     @SWG\Operation(
    *         method="GET",
    *         summary="获取购物车内所有的项",
    *         notes="购物车内所有的项",
    *         type="array",
    *         items="$ref:CartItem",
    *     )
    * )
    */
    public function index()
    {
    }

    public function store()
    {
    }

    public function show($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
}
