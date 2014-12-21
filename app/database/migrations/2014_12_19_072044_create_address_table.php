<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function($table) {
			// $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('street', 255);
            $table->string('country', 50);
            $table->unsignedInteger('country_id');
            $table->string('province', 50);
            $table->unsignedInteger('province_id');
            $table->string('city', 50);
            $table->unsignedInteger('city_id');
            $table->string('phone', 100);
            $table->string('postcode', 100)->nullable();
            $table->string('company', 255)->nullable();
            $table->timestamps();
        });

        // Schema::create('customer_addresses', function($table) {
        // 	$table->foreign('country_id')->references('id')->on('region');
        // 	$table->foreign('province_id')->references('id')->on('region');
        // 	$table->foreign('city_id')->references('id')->on('region');
        // });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
