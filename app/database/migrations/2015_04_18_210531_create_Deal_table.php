<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deals', function(Blueprint $table)
		{
			//add columns
			$table->increments('id');
			$table->integer('ffl_id')->unsigned();
			$table->foreign('ffl_id')->references('id')->on('ffls')->onDelete('cascade');
			$table->string('title',50);
			$table->string('description');
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
		Schema::table('deals', function(Blueprint $table)
		{
			Schema::dropIfExists('deals');
		});
	}

}
