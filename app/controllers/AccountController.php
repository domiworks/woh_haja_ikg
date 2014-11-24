<?php

use Carbon\Carbon;

class AccountController extends BaseController {
	
	// public function view_login()
	// {
		// $arr = $this->setHeader();
		// return  View::make('pages.login', compact('arr'));
		// return View::make('pages.login');
	// }
	
	// public function view_registrasi()
	// {
		// $arr = $this->setHeader();
		// return  View::make('pages.registrasi', compact('arr'));
		// $gereja = $this->get_all_gereja();
		// return View::make('pages.registrasi', compact('gereja'));
	// }
	
	// public function postSignIn()
	// {
		// $username = Input::get('username');
		// $password = Input::get('password');
		// $data  = array('username'=>$username, 'password'=>$password);
		
		// if(Auth::attempt($data, false))		
		// {
			// if(Auth::user()->role == 0)			
			// {
				// return Redirect::to('/user');
			// }			
			// else
			// {
				// return Redirect::to('/admin');
			// }
		// }
		// else
		// {
			// return Redirect::to('/login');
		// }
	// }
	
	// public function postLogout()
	// {
		// Auth::logout();
		// return Redirect::to('/login');
	// }
	
	// public function postRegis()
	// {
		// $username = Input::get('username');
		// $password = Input::get('password');
			
		// $cekCount = DB::table('auth')->where('username', $username)->first();
				
		// if(count($cekCount) == 0) //kalo blom ada datanya di table jemaat
		// {
			// $nama = Input::get('nama');
			.
			.
			.
			// return Redirect::to('/');
		// }
		// else
		// {
			// return Redirect::to('/registrasi');
		// }
	// }

	// public function get_all_gereja()
	// {
		// $count = DB::table('gereja')->orderBy('id','asc')->lists('id','nama');
		// if(count($count) != 0)
		// {
			// return $count;
		// }
		// else
		// {
			// return "";
		// }
	// }
	
	
}

?>