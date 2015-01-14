<?php

use Carbon\Carbon;

class SuperAdminController extends BaseController {
	
	public function superadmin_view_input_auth()
	{
		$list_gereja = $this->getListGereja();
		$data_auth = $this->getDataAuth();
		return View::make('pages.superadmin.input_auth', compact('list_gereja','data_auth'));
	}
	
	public function superadmin_view_input_gereja()
	{
		$list_status_gereja = $this->getListStatusGereja();
		$list_gereja = $this->getListGereja();	
		$data_gereja = $this->getDataGereja();		
		return View::make('pages.superadmin.input_gereja', compact('list_status_gereja','list_gereja','data_gereja'));
	}
	
	public function superadmin_view_input_jenis_baptis()
	{
		$data_jenis_baptis = $this->getDataJenisBaptis();
		return View::make('pages.superadmin.input_jenisbaptis', compact('data_jenis_baptis'));
	}
	
	public function superadmin_view_input_jenis_atestasi()
	{
		$data_jenis_atestasi = $this->getDataJenisAtestasi();
		return View::make('pages.superadmin.input_jenisatestasi', compact('data_jenis_atestasi'));
	}
	
	public function superadmin_view_input_jenis_kegiatan()
	{
		$data_jenis_kegiatan = $this->getDataJenisKegiatan();
		return View::make('pages.superadmin.input_jeniskegiatan', compact('data_jenis_kegiatan'));
	}
	
	public function superadmin_view_input_ubah_password()
	{
		return View::make('pages.superadmin.input_ubah_password');
	}

/*----------------------------------------LIVE SEARCH----------------------------------------*/

	public function admin_search_anggota()
	{	
		/*
		try{
		}catch(Exception $e)
		{
		}
		*/
		return null;
	}
	
/*----------------------------------------GET----------------------------------------*/

	public function getDataAuth()
	{			
		$auth = Account::where('role', '=', 0)->orWhere('role', '=', 1)->get();
		if(count($auth) == 0)
		{
			return null;
		}
		else
		{
			// return $auth;
			foreach($auth as $row)
			{
				$gereja = Gereja::find($row->id_gereja);
				$row->nama_gereja = $gereja->nama;
			}
			return $auth;
		}
	}
	
	public function getDataGereja()
	{
		$gereja = Gereja::all();
		// $gereja = Gereja::paginate(5);
		if(count($gereja) == 0)
		{
			return null;
		}		
		else
		{
			return $gereja;
		}
	}
	
	public function getDataJenisAtestasi()
	{
		$jenis_atestasi = JenisAtestasi::all();		
		if(count($jenis_atestasi) == 0)
		{
			return null;
		}		
		else
		{
			return $jenis_atestasi;
		}
	}
	
	public function getDataJenisBaptis()
	{
		$jenis_baptis = JenisBaptis::all();		
		if(count($jenis_baptis) == 0)
		{
			return null;
		}		
		else
		{
			return $jenis_baptis;
		}
	}
	
	public function getDataJenisKegiatan()
	{
		$jenis_kegiatan = JenisKegiatan::all();
		if(count($jenis_kegiatan) == 0)
		{
			return null;
		}		
		else
		{
			return $jenis_kegiatan;
		}
	}
	
/*----------------------------------------POST----------------------------------------*/	

	public function superadmin_postAuth()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
				
		$username = $input->{'username'};
		$password = $input->{'password'};
		$role = $input->{'role'};
		$gereja = $input->{'gereja'};
		
		$data_valid = array(
			'username' => $username,
			'password' => $password
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, Account::$rules);
		if($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
		}
		
		//validator standar strength password
			/*The requirements:
				Must be a minimum of 8 characters
				Must contain at least 1 number
				Must contain at least one uppercase character
				Must contain at least one lowercase character
			*/
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

		if(!$uppercase || !$lowercase || !$number || strlen(			$password) < 8) {
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data akun. Password tidak memenuhi standar.');
			return json_encode($respond);
		}
		
		$acc = new Account();		
		$acc -> username = $username;	
		$acc -> password = Hash::make($password);		
		$acc -> id_gereja = $gereja;		
		// $acc -> role = 0;	//untuk user 
		$acc -> role = $role;
		
		try{
			$acc -> save();
			
			$respond = array('code' => '201', 'status' => 'Created', 'messages' => 'Berhasil menyimpan data akun.');
			return json_encode($respond);
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data akun');
			return json_encode($respond);
		}
				
	}
	
	public function superadmin_postGereja()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$nama = $input->{'nama'};
		$alamat = $input->{'alamat'};
		$kota = $input->{'kota'};
		$kodepos = $input->{'kodepos'};
		$telp = $input->{'telp'};		
		$status = $input->{'status'};
		$id_parent_gereja = $input->{'id_parent_gereja'}; //kalo null maka -1
		// deleted
		
		$data_valid = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'kota' => $kota,
			'kodepos' => $kodepos,
			'telp' => $telp,
			'status' => $status
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, Gereja::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$gereja = new Gereja();
		
		$gereja->nama = $nama;
		$gereja->alamat = $alamat;
		$gereja->kota = $kota;
		$gereja->kodepos = $kodepos;
		$gereja->telp = $telp;
		if($id_parent_gereja == -1)
		{
			$gereja->id_parent_gereja = null;
		}
		else
		{
			$gereja->id_parent_gereja = $id_parent_gereja;
		}			
		$gereja->status = $status;
		$gereja->deleted = 0;
		
		try{
			$gereja->save();
			
			$respond = array('code' => '201', 'status' => 'Created', 'messages' => 'Berhasil menyimpan data gereja.');
									
			return json_encode($respond);
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
			return json_encode($respond);
		}
						
	}
	
	public function superadmin_postJenisBaptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$nama_jenis_baptis = $input->{'nama_jenis_baptis'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_jenis_baptis' => $nama_jenis_baptis,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisBaptis::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_baptis = new JenisBaptis();

		$jenis_baptis->nama_jenis_baptis = $nama_jenis_baptis;
		$jenis_baptis->keterangan = $keterangan;
		$jenis_baptis->deleted = 0;
				
		try{
			$jenis_baptis->save();
			
			$respond = array('code' => '201', 'status' => 'Created', 'messages' => 'Berhasil menyimpan data jenis baptis.');
			return json_encode($respond);
		}Catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis baptis');
			return json_encode($respond);
		}
	}
	
	public function superadmin_postJenisAtestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$nama_atestasi = $input->{'nama_atestasi'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_atestasi' => $nama_atestasi,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisAtestasi::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_atestasi = new JenisAtestasi();

		$jenis_atestasi->nama_atestasi = $nama_atestasi;
		$jenis_atestasi->keterangan = $keterangan;
		$jenis_atestasi->deleted = 0;
				
		try{
			$jenis_atestasi->save();
			
			$respond = array('code' => '201', 'status' => 'Created', 'messages' => 'Berhasil menyimpan data jenis atestasi.');
			return json_encode($respond);
		}Catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis atestasi');
			return json_encode($respond);
		}
	}
	
	public function superadmin_postJenisKegiatan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$nama_kegiatan = $input->{'nama_kegiatan'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_kegiatan' => $nama_kegiatan,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisKegiatan::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_kegiatan = new JenisKegiatan();

		$jenis_kegiatan->nama_kegiatan = $nama_kegiatan;
		$jenis_kegiatan->keterangan = $keterangan;
		$jenis_kegiatan->deleted = 0;
				
		try{
			$jenis_kegiatan->save();
			
			$respond = array('code' => '201', 'status' => 'Created', 'messages' => 'Berhasil menyimpan data jenis kegiatan.');
			return json_encode($respond);
		}Catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis kegiatan');
			return json_encode($respond);
		}
	}
	
/*----------------------------------------EDIT----------------------------------------*/	
	
	public function superadmin_edit_password()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$password_baru = $input->{'password_baru'};
		$password_baru_confirm = $input->{'password_baru_confirm'};
		
		$admin = Account::where('role', '=', 2)->first();		
		
		//validator password_baru - password_baru_confirm
		if($password_baru != $password_baru_confirm)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal mengubah password. Password yang diberikan tidak sama.');
			return json_encode($respond);
		}
		
		//validator standar strength password
			/*The requirements:
				Must be a minimum of 8 characters
				Must contain at least 1 number
				Must contain at least one uppercase character
				Must contain at least one lowercase character
			*/
		$uppercase = preg_match('@[A-Z]@', $password_baru);
		$lowercase = preg_match('@[a-z]@', $password_baru);
		$number    = preg_match('@[0-9]@', $password_baru);

		if(!$uppercase || !$lowercase || !$number || strlen(			$password_baru) < 8) {
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal mengubah password. Password tidak memenuhi standar.');
			return json_encode($respond);
		}
		
		//change password
		$admin->password = Hash::make($password_baru_confirm);
		try{
			$admin->save();
			
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil mengubah password.');
			return json_encode($respond);
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal mengubah password.');
			return json_encode($respond);
		}
	}
	
	public function superadmin_edit_auth()
	{	
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$username = $input->{'username'};
		$password = $input->{'password'};
		$role = $input->{'role'};
		$gereja = $input->{'gereja'};
		
		if($password == "") 
		{
			//kalau kosong maka ga ganti password
		}
		else
		{
			$data_valid = array(
				'username' => $username,
				'password' => $password
			);
			
			//validate
			$validator = Validator::make($data = $data_valid, Account::$rules);
			if($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
				return json_encode($respond);
			}
			
			//validator standar strength password
				/*The requirements:
					Must be a minimum of 8 characters
					Must contain at least 1 number
					Must contain at least one uppercase character
					Must contain at least one lowercase character
				*/
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);

			if(!$uppercase || !$lowercase || !$number || strlen(			$password) < 8) {
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data akun. Password tidak memenuhi standar.');
				return json_encode($respond);
			}
		}
		
		$acc = Account::find($id);
		
		if($acc == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{	
			$acc->username = $username;
			if($password == "") 
			{
				//kalau kosong maka ga ganti password
			}
			else
			{
				$acc->password = Hash::make($password);
			}
			$acc->id_gereja = $gereja;
			$acc->role = $role;
			
			try{
				$acc->save();
				
				//add nama_gereja
				$gereja = Gereja::find($acc->id_gereja);
				$acc->nama_gereja = $gereja->nama;
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $acc->toArray());
					
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan data.');
				return json_encode($respond);
			}
		}	
	}
	
	public function superadmin_edit_gereja()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$nama = $input->{'nama'};
		$alamat = $input->{'alamat'};
		$kota = $input->{'kota'};
		$kodepos = $input->{'kodepos'};
		$telp = $input->{'telp'};
		$id_parent_gereja = $input->{'id_parent_gereja'}; //kalo null maka -1
		$status = $input->{'status'};
		// deleted
		
		$data_valid = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'kota' => $kota,
			'kodepos' => $kodepos,
			'telp' => $telp,
			'status' => $status
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, Gereja::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$gereja = Gereja::find($id);
		
		if($gereja == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			$gereja->nama = $nama;
			$gereja->alamat = $alamat;
			$gereja->kota = $kota;
			$gereja->kodepos = $kodepos;
			$gereja->telp = $telp;
			if($id_parent_gereja == -1)
			{
				$gereja->id_parent_gereja = null;
			}
			else
			{
				$gereja->id_parent_gereja = $id_parent_gereja;
			}			
			$gereja->status = $status;
			// $gereja->deleted = 0;
			
			try{
				$gereja->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $gereja->toArray());
				
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
				return json_encode($respond);
			}	
		}
	}
	
	public function superadmin_edit_jenis_baptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$nama_jenis_baptis = $input->{'nama_jenis_baptis'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_jenis_baptis' => $nama_jenis_baptis,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisBaptis::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_baptis = JenisBaptis::find($id);

		if($jenis_baptis == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			$jenis_baptis->nama_jenis_baptis = $nama_jenis_baptis;
			$jenis_baptis->keterangan = $keterangan;
			// $jenis_baptis->deleted = 0;
					
			try{
				$jenis_baptis->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_baptis->toArray());
				
				return json_encode($respond);
			}Catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis baptis');
				return json_encode($respond);
			}
		}	
	}
	
	public function superadmin_edit_jenis_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$nama_atestasi = $input->{'nama_atestasi'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_atestasi' => $nama_atestasi,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisAtestasi::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_atestasi = JenisAtestasi::find($id);

		if($jenis_atestasi == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{
			$jenis_atestasi->nama_atestasi = $nama_atestasi;
			$jenis_atestasi->keterangan = $keterangan;
			// $jenis_atestasi->deleted = 0;
					
			try{
				$jenis_atestasi->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_atestasi->toArray());
								
				return json_encode($respond);
			}Catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis atestasi');
				return json_encode($respond);
			}
		}	
	}
	
	public function superadmin_edit_jenis_kegiatan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$nama_kegiatan = $input->{'nama_kegiatan'};
		$keterangan = $input->{'keterangan'};
		
		$data_valid = array(
			'nama_kegiatan' => $nama_kegiatan,
			'keterangan' =>	$keterangan
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, JenisKegiatan::$rules); 								
		if($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);			
		}
		
		$jenis_kegiatan = JenisKegiatan::find($id);

		if($jenis_kegiatan == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{
			$jenis_kegiatan->nama_kegiatan = $nama_kegiatan;
			$jenis_kegiatan->keterangan = $keterangan;
			// $jenis_kegiatan->deleted = 0;
					
			try{
				$jenis_kegiatan->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_kegiatan->toArray());
				
				return json_encode($respond);
			}Catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data jenis kegiatan');
				return json_encode($respond);
			}
		}
	}
	
/*----------------------------------------VISIBLE----------------------------------------*/		

	public function superadmin_change_visible_gereja()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};				
		
		$gereja = Gereja::find($id);
		
		if($gereja == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			if($gereja->deleted == 0)
			{
				$gereja->deleted = 1;
			}
			else
			{
				$gereja->deleted = 0;
			}			
			
			try{
				$gereja->save();							
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $gereja->toArray());
				
				return json_encode($respond);				
			}catch(Exception $e){				
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
				return json_encode($respond);
			}	
		}
	}
	
	public function superadmin_change_visible_jenis_baptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};				
		
		$jenis_baptis = JenisBaptis::find($id);
		
		if($jenis_baptis == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			if($jenis_baptis->deleted == 0)
			{
				$jenis_baptis->deleted = 1;
			}
			else
			{
				$jenis_baptis->deleted = 0;
			}			
			
			try{
				$jenis_baptis->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_baptis->toArray());
				
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
				return json_encode($respond);
			}	
		}
	}
	
	public function superadmin_change_visible_jenis_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};				
		
		$jenis_atestasi = JenisAtestasi::find($id);
		
		if($jenis_atestasi == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			if($jenis_atestasi->deleted == 0)
			{
				$jenis_atestasi->deleted = 1;
			}
			else
			{
				$jenis_atestasi->deleted = 0;
			}			
			
			try{
				$jenis_atestasi->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_atestasi->toArray());
				
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
				return json_encode($respond);
			}	
		}
	}
	
	public function superadmin_change_visible_jenis_kegiatan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};				
		
		$jenis_kegiatan = JenisKegiatan::find($id);
		
		if($jenis_kegiatan == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{		
			if($jenis_kegiatan->deleted == 0)
			{
				$jenis_kegiatan->deleted = 1;
			}
			else
			{
				$jenis_kegiatan->deleted = 0;
			}			
			
			try{
				$jenis_kegiatan->save();
				
				// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $jenis_kegiatan->toArray());
				
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan data gereja');
				return json_encode($respond);
			}	
		}
	}

/*----------------------------------------DELETE----------------------------------------*/		
	
	public function superadmin_delete_auth()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$acc = Account::find($id);
		
		try{						
			$acc->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);						
		}
	}
	
	public function superadmin_delete_gereja()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$gereja = Gereja::find($id);
		
		try{						
			$gereja->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);						
		}
	}
	
	public function superadmin_delete_jenis_baptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$jenis_baptis = JenisBaptis::find($id);
		
		try{						
			$jenis_baptis->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);						
		}
	}
	
	public function superadmin_delete_jenis_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$jenis_atestasi = JenisAtestasi::find($id);
		
		try{						
			$jenis_atestasi->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);						
		}
	}
	
	public function superadmin_delete_jenis_kegiatan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		$jenis_kegiatan = JenisKegiatan::find($id);
		
		try{						
			$jenis_kegiatan->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);						
		}
	}
	
}

?>