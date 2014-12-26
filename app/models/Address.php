<?php
use Swagger\Annotations as SWG;

/**
 * @SWG\Model(
 *     id="Address",
 *     required="user_id, name, province_id, city_id, district_id, street, postcode, phone")
 */
class Address extends Eloquent
{
	/**
	 * @SWG\Property(name="id", type="integer", format="int64", minimum="1",
	 *     description="地址的自增ID")
	 */
    public $id;

	/**
	 * @SWG\Property(name="name", type="string", description="真实姓名")
	 */
	public $name;

	/**
	* @SWG\Property(name="province_id", type="integer",
	* description="地址所在省的id")
	*/
	public $province_id;

	/**
	* @SWG\Property(name="city_id", type="integer",
	* description="地址所在市的id")
	*/
	public $city_id;

	/**
	* @SWG\Property(name="district_id", type="integer",
	* description="地址所在区的id")
	*/
	public $district_id;

	/**
	* @SWG\Property(name="street", type="string",
	* description="地址所在的街道")
	*/
	public $street;

	/**
	* @SWG\Property(name="postcode", type="string",
	* description="邮政编码")
	*/
	public $postcode;

	/**
	* @SWG\Property(name="phone", type="integer",
	* description="用户的11位手机号码")
	*/
	public $phone;

    protected $table = "addresses";
    protected $fillable = array("user_id", "name", "province_id", "city_id",
        "district_id", "street", "postcode", "phone", "province", "city",
        "district");
}
