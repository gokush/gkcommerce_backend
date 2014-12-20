<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table) {
                $table->increments('id');
                $table->string('username', 16)->nullable();
                $table->string('password', 64);
                $table->string('name', 100)->nullable();
                $table->string('firstname', 100)->nullable();
                $table->string('middlename', 100)->nullable();
                $table->string('lastname', 100)->nullable();
                $table->string('email', 255)->nullable();
                $table->char('cellphone', 11)->nullable();
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
		Schema::drop('users');
	}

}
