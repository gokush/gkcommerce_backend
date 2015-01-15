<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		$user = new User();
		$user->username = "swagger";
		$user->password = Hash::make("swagger");
		$user->save();

		$this->command->info('User table seeded!');
	}

}
