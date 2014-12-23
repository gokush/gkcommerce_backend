<?php

class AddressTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('addresses')->delete();

		$user = User::take(1)->first();

		Address::create(array(
			"user_id" => $user->id,
			"name" => "goku",
			"street" => "i don't know",
			"postcode" => 000,
			"phone" => "13000000000",
			"province" => "上海",
			"province_id" => 310000,
			"city" => "上海",
			"city_id" => 310100,
			"district" => "虹口",
			"district_id" => 310101
		));

		$this->command->info('Address table seeded!');
	}

}
