// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Bruce Cerkstone',
			'password' => Hash::make('derp'),
			'email'    => 'brycecrookston@gmail.com',
		));
		User::create(array(
			'name'     => 'Terwer Allyn',
			'password' => Hash::make('coolbeans'),
			'email'    => 'tylerAllen@gmail.com',
		));
		User::create(array(
			'name'     => 'Stefon Broomley',
			'password' => Hash::make('asdf'),
			'email'    => 's.bromley@gmail.com',
		));

		User::create(array(
			'name'     => 'The Mighty Gosling',
			'password' => Hash::make('oldgreg'),
			'email'    => 'deathinacan@msn.com',
			'type'	   => 'ffls',
		));
	}

}
