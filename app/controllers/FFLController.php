<?php

class FFLController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
			return Redirect::to('/ffls/'.Auth::id());
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
		$id = Input::get('id');
		if(!empty($id)){
			if(Auth::check()){
				Auth::logout();
			}
			//TODO if logged in, force logout to create new ffls profile
			$ffls = FFL::find($id);
			if(empty($ffls->user_id)){
				return View::make('ffls.create', ['ffls' => $ffls]);
			}
		}
		return Redirect::back();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!Auth::check()){
			$id = Input::get('id');
			if(!empty($id)){
				$ffls = FFL::where('id','=',$id)->first();				
				if(empty($ffls->user_id)){
					$user = new User;
					$user->email = Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					$user->type = 'ffls';
					$user->save(); 

					$ffls->user_id = $user->id;
					$ffls->save();	

					//force user login and redirect to profile
					Auth::login($user);
					$id = $ffls->id;
				}
			}
		}
		return $this->show($id);//route to the show method after update
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::check() && Auth::id() == $id && Auth::user()->type == 'ffls'){
			$user = Auth::user();
			$ffls = FFL::where('user_id','=', $id)->firstOrFail();
		}else{
			$ffls = FFL::findOrFail($id);
			$user = User::where('id','=', $ffls->user_id)->first();
		}		
		
		if ($user == null){
			$user = new User();
			$user->email = 'N/A';
		}
		$favorite = Favorite::where('ffl_id', '=', $id)->where('user_id','=',Auth::id())->get();
		$comments = Comment::where('ffl_id', '=', $id)->orderBy('created_at', 'desc')->get();//->orderBy('created_at', 'desc');
		$deals = Deal::where('ffl_id', '=', $id)->get();
		$rating = round(DB::table('comments')->where('ffl_id', '=', $id)->avg('rating'));
		
		return View::make('ffls.profile',['user'=> $user,'ffls'=> $ffls, 'rating'=> $rating, 'deals'=> $deals, 'comments'=>$comments,'favorite'=>$favorite]);
	}                                     

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ffls = FFL::find($id);
		if(Auth::check() && Auth::id() == $ffls->user_id && Auth::user()->type == 'ffls'){
			$user = Auth::user();			
			return View::make('ffls.edit',['user'=> $user,'ffls'=> $ffls] );
		}
		return Redirect::to('ffls');///$id.' '.$ffls->user_id.' '.Auth::id();//Redirect::to('ffls');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::check() && Auth::id() == $id && Auth::user()->type == 'ffls'){
			$user = User::find($id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			if(!empty(Input::get('password'))){//if the password has changed update it
				$user->password = Hash::make(Input::get('password'));
			}
			$user->save(); 
			
			$ffls = FFL::where('user_id','=',$id)->firstOrFail();
			$ffls->phone = Input::get('phone');
			$ffls->fax = Input::get('fax');
			$ffls->website = Input::get('website');
			$ffls->accept_transfers = Input::get('transfers');
			if(Input::get('transfers') == "C"){
				$ffls->transfer_fee = 'Yes, Please Call';
			}else if(Input::get('transfers') == "Y"){
				$ffls->transfer_fee = 'Yes $'.Input::get('transfers_fee');
			}else{
				$ffls->transfer_fee = 'No';
			}			
			$ffls->bio = Input::get('bio');
			$ffls->save();		
			
			

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
