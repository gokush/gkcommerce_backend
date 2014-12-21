<?php

class AddressControllerTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->seed();
	}

	public function testAddressCreate()
	{
		$user = new User(array("username" => "goku", "id" => 1));
		$user->id = 1;
		$this->be($user);
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
		$response = $crawler->getContent();
		$this->assertGreaterThan(1, json_decode($response)->id);
	}

}
