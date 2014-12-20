<?php

class CustomerAddressModelTest extends TestCase
{
	public function testBasicExample()
	{
		$address = new CustomerAddress();
		$address->name = "CJ";
		$address->save();
		$this->assertTrue(false);
		// $crawler = $this->client->request('GET', '/');

		// $this->assertTrue($this->client->getResponse()->isOk());
	}

}
