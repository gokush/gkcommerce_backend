<?php

class AddressControllerTest extends TestCase
{
	public $form;

	public function setUp()
	{
		parent::setUp();
		$this->seed();
		
		$user = User::take(1)->first();
		OAuthController::$mockOwnerId = $user->id;
		$this->be($user);

		$form = array(
			"name" => "goku",
			"street" => "i don't know",
			"postcode" => 000,
			"phone" => "13000000000",
			"province_id" => 310000,
			"city_id" => 310100,
			"district_id" => 310101
		);
	}

	public function testAddressCreate()
	{
		$crawler = $this->call('POST', '/api/address/', $this->form);
		$response = $crawler->getContent();
		$this->assertGreaterThan(1, json_decode($response)->id);
	}

	public function testAddressCreateFail()
	{
		$crawler = $this->call('POST', '/api/address/', array());
		$this->assertResponseStatus(422);
	}

	public function testAddressUpdate()
	{
		$address = \Address::first();
		$address_map = $address->toArray();
		$address_map['street'] = "";

		$crawler = $this->call('PUT', '/api/address/' . $address->id,
			$address_map);
		$response = $crawler->getContent();
		$this->assertGreaterThan(1, json_decode($response)->id);
	}

	public function testAddressDelete()
	{
		$response = $this->call('DELETE', '/api/address/1/', array());
		$this->assertResponseStatus(204);
	}

	public function testAddressShow()
	{
		$address = \Address::first();
		$response = $this->call('GET', 
			sprintf('/api/address/%d/', $address->id), array());
		$responseJson = json_decode($response->getContent());
		$this->assertEquals($responseJson->id, $address->id);
		$this->assertResponseStatus(200);
	}

	public function testAddressList()
	{
		$response = $this->call('GET', '/api/address/', array());
		$addresses = json_decode($response->getContent());

		$this->assertEquals(true, count($addresses) > 0);
	}
}
