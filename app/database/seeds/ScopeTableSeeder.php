<?php
use Carbon\Carbon;

class ScopeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('oauth_scopes')->delete();
        $datetime = Carbon::now();

        DB::table('oauth_scopes')->insert(array(
            "id" => "write:address",
            "description" => "",
            'created_at' => $datetime,
            'updated_at' => $datetime
        ));
        DB::table('oauth_scopes')->insert(array(
            "id" => "read:address",
            "description" => "",
            'created_at' => $datetime,
            'updated_at' => $datetime
        ));
        $this->command->info('OAuth scopes table seeded!');
    }

}
