<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table) {
			$table->increments('id');
			$table->string('name', 50)->nullable();
			$table->longText('description')->nullable();
			$table->decimal('listingPrice', 10, 2)->nullable();
			$table->decimal('regularPrice', 10, 2)->nullable();
			$table->string('picture', 255)->nullable();
			$table->timestamps();
		});

		Schema::create('product_pictures', function($table) {
			$table->increments('id');
			$table->string('url', 50)->nullable();
			$table->longText('description')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
		Schema::drop('product_pictures');
	}

}
