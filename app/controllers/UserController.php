<?php

use Carbon\Carbon;

class UserController extends BaseController {

	public function view_profile()
	{
		$authId = Auth::user()->id;
		$anggota = Auth::user()->anggota;
		$gereja = Gereja::where('id', '=', $anggota->id_gereja)->first();
			$nama_gereja = $gereja['nama'];
		$alamat = Alamat::where('id_anggota', '=', $anggota->id)->first();
		$list_hp = $this->getListHp($anggota->id);		
		$list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		
		 // return Auth::user()->anggota->id_gereja;
		
		// no_jemaat		
		// nama_depan		
		// nama_tengah				
		// nama_belakang		
			//alamat
			//kota
			//kodepos
		// telp	
		// gender	
		// wilayah	
		// gol_darah	
		// pendidikan	
		// pekerjaan	
		// etnis	
		// kota_lahir	
		// tanggal_lahir	
		// id_gereja ---> anggota gereja mana		
		
		$result = array('data' => $anggota);
		
		return View::make('pages.profile', 
			compact('alamat',
					'list_hp',
					'list_gereja',
					'list_wilayah',
					'list_gol_darah',
					'list_pendidikan',
					'list_pekerjaan',
					'list_etnis',
					'nama_gereja'))
			->with('data', $result);
		
		// return View::make('pages.profile', compact);
	}
	
	public function view_jemaat()
	{
		$list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		
		return View::make('pages.registrasi',		
			compact('list_gereja','list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis'));
	}
	
/*	
	public function postRegis()
	{			
		$username = Input::get('username');
		$password = Input::get('password');
			
		$cekCount = DB::table('auth')->where('username', $username)->first();
		
		if(count($cekCount) == 0)
		{			
			$no_jemaat = Input::get('no_jemaat');			
			$nama_depan = Input::get('nama_depan');			
			$nama_tengah = Input::get('nama_tengah');				
			$nama_belakang = Input::get('nama_belakang');				
			$alamat = Input::get('alamat');			
			$kota = Input::get('kota');				
			$kodepos = Input::get('kodepos');				
			$telp = Input::get('telp');				
			$gender = Input::get('gender');				
			$wilayah = Input::get('wilayah');				
			$gol_darah = Input::get('gol_darah');			
			$pendidikan = Input::get('pendidikan');				
			$pekerjaan = Input::get('pekerjaan');				
			$etnis = Input::get('etnis');				
			$kota_lahir = Input::get('kota_lahir');				
			$tanggal_lahir = Input::get('tanggal_lahir');
				$datepiece = explode('.',$date);
				$tanggal_lahir = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0];
			$id_gereja = Input::get('id_gereja');				
			
			$newJemaat = new Jemaat();
			$newJemaat -> no_jemaat = $no_jemaat;
			$newJemaat -> nama_depan = $nama_depan;
			$newJemaat -> nama_tengah = $nama_tengah;
			$newJemaat -> nama_belakang = $nama_belakang;
			$newJemaat -> telp = $telp;
			$newJemaat -> gender = $gender;
			$newJemaat -> wilayah = $wilayah;
			$newJemaat -> gol_darah = $gol_darah;
			$newJemaat -> pendidikan = $pendidikan;
			$newJemaat -> pekerjaan = $pekerjaan;
			$newJemaat -> etnis = $etnis;
			$newJemaat -> kota_lahir = $kota_lahir;
			$newJemaat -> tanggal_lahir = $tanggal_lahir;
			$newJemaat -> role = 4;
			$newJemaat -> id_gereja = $id_gereja;	
					
			try{
				// $newJemaat -> timestamps = true;
				$newJemaat -> save();
			}catch(Exception $e){
				echo $e->getMessage();
			}			
			
			for($i=1; $i<=5; $i++){
				$hp = Input::get('hp'.$i);
				if($hp != ""){
					$newHp = new Hp();
					$newHp -> id_jemaat = $newJemaat->id;
					$newHp -> no_hp = $hp;
					try{
						// $newHp -> timestamps = true;
						$newHp -> save();
					}catch(Exception $e){
						echo $e->getMessage();
					}
				}
			}
			
			$newAcc = new Account();
			$newAcc -> username = $username;
			$newAcc -> password = Hash::make($password);
			$newAcc -> id_jemaat = $newJemaat->id;
			try{	
				// $newAcc -> timestamps = true;
				$newAcc -> save();
			}catch(Exception $e){
				echo $e->getMessage();
			}						
				
			return Redirect::to('/user')->with('message', 'Terima kasih telah melakukan pendaftar, silahkan menyelesaikan administrasi pembayaran. Keterangan lebih lanjut dapat 
			dilihat pada <a href="/anggota">Anggota</a>');			
		}else
		{
			return Redirect::to('/registrasi')->with('message', 'Error')->withErrors('Username telah terdaftar')->withInput();
		}
	}	
		*/
		
	//get list hp 	
	public function getListHp($id_anggota)
	{
		$count = Hp::where('id_anggota', '=', $id_anggota)->get();
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
		
	//get list gereja
	public function getListGereja()
	{		
		$count = DB::table('gereja')->orderBy('id','asc')->lists('nama','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list wilayah
	public function getListWilayah()
	{
		$arrWilayah = array(
			'' => 'pilih!',
			'I' => 'I',
			'II' => 'II',
			'III' => 'III',
			'IV' => 'IV',
			'V' => 'V',
			'VI' => 'VI',
			'VII' => 'VII',
			'VIII' => 'VIII',
			'IX' => 'IX',
			'X' => 'X',
			'XI' => 'X1',
			'XII' => 'XII',
			'XIII' => 'XIII',
			'XIV' => 'XIV',
			'XV' => 'XI'
		);		
		return $arrWilayah;
	}
	
	//get list gol_darah	
	public function getListGolonganDarah()
	{
		$arrGolonganDarah = array(
			'' => 'pilih!',
			'A +' => 'A +',
			'B +' => 'B +',
			'A B+' => 'AB +',
			'O +' => 'O +',
			'A -' => 'A -',
			'B -' => 'B -',
			'A B-' => 'AB -',
			'O -' => 'O -'	
		);
		return $arrGolonganDarah;
	}
			
	//get list pendidikan
	public function getListPendidikan()
	{
		$arrPendidikan = array(
			'' => 'pilih!',
			'TK' => 'TK',
			'SD' => 'SD',
			'SLTP' => 'SLTP',
			'SMU' => 'SMU',
			'Kejuruan' => 'Kejuruan',
			'D-1' => 'D-1',
			'D-2' => 'D-2',
			'D-3' => 'D-3',
			'S-1' => 'S-1',
			'S-2' => 'S-2',
			'S-3' => 'S-3',
			'Lain-Lain' => 'Lain-Lain'
		);			
		return $arrPendidikan;
	}
	
	//get list pekerjaan
	public function getListPekerjaan()
	{
		$arrPekerjaan = array(
			'' => 'pilih!',
			'Wirausaha' => 'Wirausaha',
			'P.Negeri' => 'P.Negeri',
			'P.Swasta' => 'P.Swasta',
			'Profesional' => 'Profesional',
			'Pensiunan' => 'Pensiunan',
			'Ibu RT' => 'Ibu RT',
			'Petani' => 'Petani',
			'Pel/Mhs' => 'Pel/Mhs',
			'Lain-Lain' => 'Lain-Lain'
		);
		return $arrPekerjaan;
	}
	
	//get list etnis
	public function getListEtnis()
	{	
		$arrEtnis = array(
			'' => 'pilih!',
			'T.Hoa' => 'T.Hoa',
			'Sunda' => 'Sunda',
			'Batak' => 'Batak',
			'Jawa' => 'Jawa',
			'Ambon' => 'Ambon',
			'Minahasa' => 'Minahasa',
			'Nias' => 'Nias',
			'Timor' => 'Timor',
			'Toraja' => 'Toraja',
			'Dayak' => 'Dayak',
			'Papua' => 'Papua',
			'Lain-Lain' => 'Lain-Lain'
		);
		return $arrEtnis;
	}
	
	/*
	public function postLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/')->with('message', 'Anda telah keluar.');
	}
	*/
	
	
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