<?php  namespace App\Controllers\Api;

use Swagger\Annotations as SWG;

/**
 *
 * @SWG\Resource(resourcePath="/customer/address/")
 */
class CustomerAddressController extends \BaseController {

	/**
	 * @SWG\Api(
	 *   path="/custom/address/",
	 *   @SWG\Operation(
	 *     method="GET",
	 *     summary="查询顾客地址列表",
	 *     notes=""
	 *   )
	 * )
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return "hello";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
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
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
