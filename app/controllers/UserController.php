<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
			return Redirect::to('/user/'.Auth::id());
		}
		return Redirect::to('login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		//force user login and redirect to profile
		Auth::login($user);
		return Redirect::route('user.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::check() && Auth::id() == $id && Auth::user()->type == 'user'){
			$user = Auth::user();
		}else{
			$user = User::where('id','=', $id)->where('type','=','user')->firstOrFail();
		}		
		$favorites = Favorite::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();;//DB::table('favorites')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->get();
		$comments = Comment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();;//DB::table('comments')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->get();
		return View::make('user.profile',['user'=> $user, 'comments' => $comments, 'favorites' => $favorites]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::check() && Auth::id() == $id && Auth::user()->type == 'user'){
			$user = Auth::user();
			return View::make('user.edit',['user'=> $user]);
		}
		return Redirect::to('user');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::check() && Auth::id() == $id && Auth::user()->type == 'user'){
			$user = User::find($id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->subscribe = Input::get('subscribe');
			if(!empty(Input::get('password'))){//if the password has changed update it
				$user->password = Hash::make(Input::get('password'));
			}
			$user->save(); 

			return $this->show($id);//route to the show method after update
		}
		return $this->index();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
