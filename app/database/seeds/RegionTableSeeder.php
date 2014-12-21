<?php

class RegionTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('regions')->delete();

		Region::create(array("id" => 1, "parent" => 0, "type" => "country",
			"name" => "中国"));
		Region::create(array("id" => 310000, "parent" => 1,
			"type" => "province", "name" => "上海"));
		Region::create(array("id" => 310100, "parent" => 310000,
			"type" => "city", "name" => "上海"));
		Region::create(array("id" => 310101, "parent" => 310100,
			"type" => "district", "name" => "虹口区"));

		$this->command->info('Region table seeded!');
	}

}
