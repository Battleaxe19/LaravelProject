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
		Schema::create('users', function(Blueprint $table)
		{
			//add columns
			$table->increments('id');
			$table->string('name', 50);
			$table->string('password', 64);
			$table->string('email', 50);
			$table->string('type', 20)->default('user');//dealer or user
			$table->timestamps();
			$table->rememberToken(); 
			
			//add indexes
			$table->unique('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::dropIfExists('users');
		});
	}

}
