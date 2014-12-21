<?php

class AddressControllerTest extends TestCase
{
	public function testAddressCreate()
	{
		$crawler = $this->call('POST', '/api/address/',
			array(
				"name" => "goku",
				"street" => "i don't know",
				"postcode" => 000,
				"phone" => "13000000000",
				"province_id" => 310000,
				"city_id" => 310100,
				"district_id" => 310101
			));

		var_dump($crawler);

		// $this->assertTrue($this->client->getResponse()->isOk());
	}

}
