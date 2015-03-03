<?php

use Carbon\Carbon;

class AccountController extends BaseController {
	
	public function postSignIn()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$data  = array('username'=>$username, 'password'=>$password);
		$remember_me = Input::get('remember_me') === 'yes';	
		if($remember_me == true)
		{
			if(Auth::attempt($data, $remember_me))		
			{
				if(Auth::user()->role <= 1)
				{
					//add session
					$gereja = Gereja::find(Auth::user()->id_gereja);
					Session::put('nama', $gereja->nama);
					Session::put('alamat', $gereja->alamat);
					Session::put('telp', $gereja->telp);
					Session::put('kota', $gereja->kota);
					Session::put('id_gereja', Auth::user()->id_gereja);
					Session::put('role', Auth::user()->role);	
				}				
					
				if(Auth::user()->role == 0)			
				{				
					return Redirect::to('/user');
				}			
				else if(Auth::user()->role == 1)
				{				
					return Redirect::to('/admin');
				}
				else if(Auth::user()->role == 2)
				{	
					return Redirect::to('/superadmin');
				}
				else
				{
					return Redirect::to('/')->with('message', 'username dan password tidak tepat.');
					// return Redirect::back()->withErrors(['msg', 'username dan password tidak tepat.']);
				}
			}
			else
			{
				return Redirect::to('/')->with('message', 'username dan password tidak tepat.');
				// return Redirect::back()->withErrors(['msg', 'username dan password tidak tepat.']);
			}		
		}
		else
		{
			if(Auth::attempt($data, false))		
			{
				if(Auth::user()->role <= 1)
				{
					//add session
					$gereja = Gereja::find(Auth::user()->id_gereja);					
					Session::put('nama', $gereja->nama);					
					Session::put('alamat', $gereja->alamat);					
					Session::put('telp', $gereja->telp);					
					Session::put('kota', $gereja->kota);
					Session::put('id_gereja', Auth::user()->id_gereja);
					Session::put('role', Auth::user()->role);
				}
				
				if(Auth::user()->role == 0)			
				{					
					return Redirect::to('/user');
				}			
				else if(Auth::user()->role == 1)
				{								
					return Redirect::to('/admin');
				}
				else if(Auth::user()->role == 2)
				{	
					return Redirect::to('/superadmin');
				}
				else
				{
					return Redirect::to('/')->with('message', 'username dan password tidak tepat.');
					// return Redirect::back()->withErrors(['msg', 'username dan password tidak tepat.']);
				}
			}
			else
			{
				return Redirect::to('/')->with('message', 'username dan password tidak tepat.');
				// return Redirect::back()->withErrors(['msg', 'username dan password tidak tepat.']);
			}
		}
		
		/*
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
		*/
	}
	
	
	public function postLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/')->with('message', 'Anda telah keluar.');
	}
	
	
	//------------------------------------------------------------------
	
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
			// .
			// .
			// .
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