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
		$user->username = "cj";
		$user->password = Hash::make("cj");
		$user->save();

		$this->command->info('User table seeded!');
	}

}
