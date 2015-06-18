<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function(Blueprint $table)
		{
			//add columns
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('ffl_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('ffl_id')->references('id')->on('ffls');
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
		Schema::table('favorites', function(Blueprint $table)
		{
			Schema::dropIfExists('favorites');
		});
	}

}
