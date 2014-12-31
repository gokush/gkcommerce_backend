<?php

class AddressControllerTest extends TestCase
{
    public $form;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->seed();

        $user = User::take(1)->first();
        OAuthController::$mockOwnerId = $user->id;
        $this->be($user);

        $this->form = array(
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
        $response = $this->call('POST', '/api/address', $this->form);
        $responseText = $response->getContent();
        $this->assertGreaterThan(1, json_decode($responseText)->id);
    }

    public function testAddressCreateFail()
    {
        $this->call('POST', '/api/address', array());
        $this->assertResponseStatus(422);
    }

    public function testAddressUpdate()
    {
        $address = \Address::first()->toArray();
        $address['street'] = "new street";

        $response = $this->call('PUT', '/api/address/' . $address['id'],
            $address);
        $addressJSON = json_decode($response->getContent());
        $this->assertEquals("new street", $addressJSON->street);
    }

    public function testAddressDelete()
    {
        $address = \Address::first();
        $response = $this->call('DELETE',
            sprintf('/api/address/%d', $address->id), array());
        $this->assertResponseStatus(204);
    }

    public function testAddressShow()
    {
        $address = \Address::first();
        $response = $this->call('GET',
            sprintf('/api/address/%d/', $address->id), array());
        $responseJSON = json_decode($response->getContent());
        $this->assertEquals($responseJSON->id, $address->id);
        $this->assertResponseStatus(200);
    }

    public function testAddressList()
    {
        $response = $this->call('GET', '/api/address/', array());
        $addresses = json_decode($response->getContent());

        $this->assertEquals(true, count($addresses) > 0);
    }
}
