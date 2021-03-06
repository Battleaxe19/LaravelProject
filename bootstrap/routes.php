<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//CONTROLLERS =================================

Route::resource('user', 'UserController');
Route::resource('ffls', 'FFLController');
Route::resource('comments', 'CommentController');
Route::resource('favorites', 'FavoriteController');
Route::resource('deals', 'DealController');

Route::get('/', function()
{
	return Redirect::to('home');
});

Route::get('/home', function(){
	return View::make('home');
});

Route::get('/search', function(){
	return View::make('search');
});


// ===============================================
// LOGIN SECTION =================================
// ===============================================
Route::group(array('prefix' => 'login'), function()//, 'before' => 'auth'
{
	Route::get('/', array('uses' => 'HomeController@showLogin'));
	Route::post('/', array('uses' => 'HomeController@doLogin'));
});

// ===============================================
// LOGOUT SECTION =================================
// ===============================================
Route::group(array('prefix' => 'logout'), function()//, 'before' => 'auth'
{
	Route::get('/', array('uses' => 'HomeController@doLogout'));
});

// ===============================================
// USER SECTION =================================
// ===============================================
/* Route::group(array('prefix' => 'user'), function()//, 'before' => 'auth'
{
	Route::get('/', function()// array('as' => 'userprofile'), is breaking these methods
  	{
		return "HELLO";//View::make('user.profile');
	});

 	Route::get('edit',array('before' => 'auth', function()
  	{							  
		return "Edit page";//View::make('user.edit');
	})); 
}); */

// ===============================================
// DEALER SECTION =================================
// ===============================================
Route::group(array('prefix' => 'dealer'), function()//, 'before' => 'auth'
{
	Route::get('/', function()
  	{							 
		return View::make('dealer.profile');
	});

	Route::get('edit', function()
  	{						  
		return View::make('dealer.edit');
	});
}); 

// ===============================================
// PASSWORD SECTION =================================
// ===============================================
Route::group(array('prefix' => 'password'), function()//, 'before' => 'auth'
{
	Route::get('/',function()
  	{							  
		return Redirect::to('password/remind');//View::make('user.edit');
	}); 
	Route::get('remind', array('uses' => 'RemindersController@getRemind'));
	Route::post('postRemind', array('uses' => 'RemindersController@postRemind'));
	Route::get('reset/{token}',array('uses' => 'RemindersController@getReset'));
	Route::post('postReset', array('uses' => 'RemindersController@postReset'));
}); 