<?php

class Address extends Eloquent
{
	protected $table = "addresses";
	protected $fillable = array("user_id", "name", "province_id", "city_id", 
		"district_id", "street", "postcode", "phone", "province", "city", 
		"district");
}