<?php

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

	// public function showWelcome()
	// {
		// return View::make('hello');
	// }
	
	public function view_index()
	{		
		return View::make('pages.login');
	}

	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data  = array('username'=>$username, 'password'=>$password);
		
		if(Auth::attempt($data, false))		
		{
			if(Auth::user()->role == 0)			
			{
				return Redirect::to('/user');
			}			
			else
			{
				return Redirect::to('/admin');
			}
		}
		else
		{
			return Redirect::to('/');
		}
	}
		
}
