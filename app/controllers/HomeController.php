<?php
use Illuminate\Support\MessageBag;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('home');
	}
	
	public function showLogin()
	{
		// Save the previous URL to return to after login
		Session::put('pre_login_url', URL::previous());
		// show the form
		return View::make('login');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// If user attempted to access specific URL before logging in
				if(Auth::user()->type == 'ffls'){
					return Redirect::to('ffls');
				}
				return Redirect::to('user/'.Auth::id());
/* 				else if ( Session::has('pre_login_url') )
				{
					$url = Session::get('pre_login_url');
					Session::forget('pre_login_url');
					//return $url;//Redirect::to($url);
				}
				else
					return Redirect::to('home'); */

			} else {        

				$errors = new MessageBag(['password' => ['Email and/or password invalid.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

				return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));

			}

		}
	}

	// app/controllers/HomeController.php
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('home'); // redirect the user to the login screen
	}
	
	// app/controllers/HomeController.php
	public function showSearch()
	{	
		$zip = Input::get('search');
		$ffls = FFL::where('premise_zip_code','=', $zip);
		//array_push($ffls, FFL::where('premise_city','LIKE',$zip));
		//array_push($ffls, FFL::where('premise_street','LIKE',$zip));
		//array_push($ffls, FFL::where('business_name','LIKE',$zip));
		
		return $ffls;
	}
}