<?php namespace App\Controllers\Api;

use Swagger\Annotations as SWG;

/**
 * @SWG\Resource(
 *     apiVersion="0.1",
 *     swaggerVersion="1.2",
 *     resourcePath="/product",
 *     basePath="http://127.0.0.1:8000/api",
 *     description="操作用户地址数据"
 * )
 */
class ProductController extends BaseResourceController
{

	/**
	 * @SWG\Api(
	 *     path="/product",
	 *     @SWG\Operation(
	 *         method="GET",
	 *         summary="获取产品",
	 *         notes="",
	 *         type="array",
	 *         items="$ref:Product",
	 *     )
	 * )
	 */
	public function index()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * @SWG\Api(
	 *     path="/product/{productId}",
	 *     @SWG\Operation(
	 *         method="GET",
	 *         summary="通过产品的id读取产品信息",
	 *         notes="",
	 *         type="Address",
	 *         @SWG\Parameter(
	 *             name="productId",
	 *             description="产品的id",
	 *             required=true,
	 *             type="integer",
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
		$product = \Product::find($id)->first();
		if (null == $product) {
			return $this->responseNotFound('Product', 'id');
		}
		return json_encode($product);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
