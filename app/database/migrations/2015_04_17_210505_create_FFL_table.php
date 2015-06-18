<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFFLTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ffls', function(Blueprint $table)
		{
			//add columns
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			
			$table->string('lic_regn',10);
			$table->string('lic_dist',10);
			$table->string('lic_cnty',10);
			$table->string('lic_type',10);			
			$table->string('lic_segn',10);			
			$table->string('lic_xprdte',10);	
			
			$table->string('license_name',60);
			
			$table->string('business_name',60);
			
			$table->string('premise_street',60);
			$table->string('premise_city',20);
			$table->char('premise_state',2);
			$table->string('premise_zip_code',20);
			
			$table->string('mail_street',20);
			$table->string('mail_city',20);
			$table->string('mail_state',20);
			$table->string('mail_zip_code',20);
			
			$table->string('bio');
/* 			$table->string('email',50);
			$table->string('password',64); */
			$table->string('website');
			$table->string('phone', 15);
			$table->string('fax', 15);
			$table->char('accept_transfers', 1);//Y or N
			$table->string('transfer_fee');
			/*$table->string('facebookurl');
			$table->string('twitterurl'); */
			$table->timestamps();
/* 			$table->rememberToken();  */
			
			//add indexes
/* 			$table->unique('email'); */
			
			//$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ffls', function(Blueprint $table)
		{
			Schema::dropIfExists('ffls');
		});
	}

}
