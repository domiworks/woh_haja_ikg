<?php

use Carbon\Carbon;

class InputEditController extends BaseController {
	
	public function view_kebaktian()
	{		
		$list_jenis_kegiatan = $this->getListJenisKegiatan();		
		$list_pembicara = $this->getListPendeta();
		$list_gereja = $this->getListGereja();
		return View::make('pages.user_inputdata.kebaktian', 
			compact('list_jenis_kegiatan', 'list_pembicara', 'list_gereja')
		);					
	}
	
	public function view_anggota()
	{
		// $list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		$list_role = $this->getListRoleAnggota();
		return View::make('pages.user_inputdata.anggota', compact('list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis','list_role'));
		// return View::make('pages.user_inputdata.anggota', compact('list_gereja','list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis','list_role'));
		// return null;
	}
	
	public function view_baptis()
	{
		$list_gereja = $this->getListGereja();
		$list_pembaptis = $this->getListPendeta();
		$list_jenis_baptis = $this->getListJenisBaptis();
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.user_inputdata.baptis', compact('list_gereja','list_pembaptis','list_jenis_baptis','list_jemaat'));
		// return null;
	}	
	
	public function view_atestasi()
	{
		$list_jenis_atestasi = $this->getListJenisAtestasi();
		$list_jemaat = $this->getListJemaat();
		$list_gereja = $this->getListGereja();
		return View::make('pages.user_inputdata.atestasi', compact('list_jenis_atestasi','list_jemaat','list_gereja'));
		// return null;
	}
	
	public function view_pernikahan()
	{
		$list_jemaat_pria = $this->getListJemaatPria();
		$list_jemaat_wanita = $this->getListJemaatWanita();
		$list_gereja = $this->getListGereja();
		$list_pendeta = $this->getListPendeta();
		return View::make('pages.user_inputdata.pernikahan', compact('list_jemaat_pria','list_jemaat_wanita','list_gereja','list_pendeta'));
		// return null;
	}
	
	public function view_kedukaan()
	{
		$list_gereja = $this->getListGereja();
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.user_inputdata.kedukaan', compact('list_gereja','list_jemaat'));
		// return null;
	}
	
	public function view_dkh()
	{
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.user_inputdata.dkh', compact('list_jemaat'));
		// return null;
	}

/*----------------------------------------POST----------------------------------------*/	
	
	public function postKebaktian()
	{		
		//NOTE :			
		//masukin data ke persembahan ... 
		
		$input = Input::get('data');			
		
		$kebaktian = new Kegiatan();										
		if($input['id_pendeta'] == '')
		{
			$kebaktian->id_pendeta = null;
		}
		else
		{
			$kebaktian->id_pendeta = $input['id_pendeta'];
		}		
		$kebaktian->nama_pendeta = $input['nama_pendeta'];
		$kebaktian->id_jenis_kegiatan = $input['kebaktian_ke'];				
		$kebaktian->tanggal_mulai = $input['tanggal_mulai'];
		$kebaktian->tanggal_selesai = $input['tanggal_selesai'];
		$kebaktian->jam_mulai = $input['jam_mulai'];
		$kebaktian->jam_selesai = $input['jam_selesai'];
		$kebaktian->banyak_jemaat_pria = $input['banyak_jemaat_pria'];
		$kebaktian->banyak_jemaat_wanita = $input['banyak_jemaat_wanita'];
		$kebaktian->banyak_jemaat = $input['banyak_jemaat'];
		$kebaktian->banyak_simpatisan_pria = $input['banyak_simpatisan_pria'];
		$kebaktian->banyak_simpatisan_wanita = $input['banyak_simpatisan_wanita'];
		$kebaktian->banyak_simpatisan = $input['banyak_simpatisan'];
		$kebaktian->banyak_penatua_pria = $input['banyak_penatua_pria'];
		$kebaktian->banyak_penatua_wanita = $input['banyak_penatua_wanita'];
		$kebaktian->banyak_penatua = $input['banyak_penatua'];
		$kebaktian->banyak_komisi_pria = $input['banyak_komisi_pria'];
		$kebaktian->banyak_komisi_wanita = $input['banyak_komisi_wanita'];
		$kebaktian->banyak_komisi = $input['banyak_komisi'];
		$kebaktian->banyak_pemusik_pria = $input['banyak_pemusik_pria'];
		$kebaktian->banyak_pemusik_wanita = $input['banyak_pemusik_wanita'];
		$kebaktian->banyak_pemusik = $input['banyak_pemusik'];		
		// $kebaktian->id_gereja = $input['id_gereja'];
		$kebaktian->id_gereja = Auth::user()->anggota->id_gereja;		
		$kebaktian->keterangan = $input['keterangan'];					
		
		try{
			$kebaktian->save();
			
			try{
				$persembahan = new Persembahan();
				$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
				$persembahan->jumlah_persembahan = $input['jumlah_persembahan'];
				$persembahan->id_kegiatan = $kebaktian->id;
				$persembahan->jenis = 1;
				
				$persembahan->save();
				
				return "berhasil";
			}catch(Exception $e){
				//delete kebaktian
				$kebaktian->delete();
			
				return $e->getMessage();
			}
						
		}catch(Exception $e){
			return $e->getMessage();
		}
							
	}
		
	public function postAnggota()
	{	
		$anggota = new Anggota();
		$anggota->no_anggota = Input::get('no_anggota');
		$anggota->nama_depan = Input::get('nama_depan');
		$anggota->nama_tengah = Input::get('nama_tengah');
		$anggota->nama_belakang = Input::get('nama_belakang');
		$anggota->telp = Input::get('telp');
		$anggota->gender = Input::get('gender');
		$anggota->wilayah = Input::get('wilayah');
		$anggota->gol_darah = Input::get('gol_darah');
		$anggota->pendidikan = Input::get('pendidikan');
		$anggota->pekerjaan = Input::get('pekerjaan');
		$anggota->etnis = Input::get('etnis');
		$anggota->kota_lahir = Input::get('kota_lahir');
		$anggota->tanggal_lahir = Input::get('tanggal_lahir');		
		// $anggota->id_gereja = Input::get('id_gereja');
		$anggota->id_gereja = Auth::user()->anggota->id_gereja;
		$anggota->role = Input::get('role');
		
		$anggota->id_atestasi = null;
		
		try{
			$anggota->save();
			
			//save no hp
			$ctHp = 0;			
			$temp_arr_hp = Input::get('arr_hp');
			if($temp_arr_hp != "") //kalo ada input hp			
			{
				$arr_hp = explode(",", $temp_arr_hp);
				foreach($arr_hp as $key)
				{
					$hp = new Hp();
					$hp->no_hp = $key;
					$hp->id_anggota = $anggota->id;
					try{
						$hp->save();
						
						$ctHp++;					
					}catch(Exception $e){		
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
					
						return $e->getMessage();
					}
				}
			}
			
			//save alamat
			$alamat = new Alamat();
			$alamat->jalan = Input::get('jalan');
			$alamat->kota = Input::get('kota');
			$alamat->kodepos = Input::get('kodepos');
			$alamat->id_anggota = $anggota->id;
			try{
				$alamat->save();
			}catch(Exception $e){
				//delete anggota
				$anggota->delete();
				
				//delete hp sebelumnya
				for($i = 0; $i < $ctHp ; $i++)
				{
					$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
					$delHp->delete();
				}
			
				return $e->getMessage();
			}
			
			//save foto
			if (Input::hasFile('foto'))
			{
				$file = Input::file('foto');
				$destinationPath = "assets/file_upload/anggota/";
				$fileName = $file->getClientOriginalName();						
				
				$foto_id = $anggota->id;
				$destinationPath .= $foto_id;
				$destinationPath .= "/";
				if(!file_exists($destinationPath))
				{
					File::makeDirectory($destinationPath, $mode = 0777, true, true);
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$anggota->foto = $destinationPath.$fileName;
					try{
						$anggota->save();
					}catch(Exception $e){
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
						
						//delete alamat
						$alamat->delete();
					}					
				}
				else
				{
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$anggota->foto = $destinationPath.$fileName;
					try{
						$anggota->save();
					}catch(Exception $e){
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
						
						//delete alamat
						$alamat->delete();
					}					
				}
			}
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}		
			
	}
	
	public function postBaptis()
	{		
		$input = Input::get('data');
		
		$baptis = new Baptis();
		$baptis->no_baptis = $input['no_baptis'];				
		$baptis->id_jemaat = $input['id_jemaat'];
		$baptis->id_pendeta = $input['id_pendeta'];
		$baptis->tanggal_baptis = $input['tanggal_baptis'];
		$baptis->id_jenis_baptis = $input['id_jenis_baptis'];
		// $baptis->id_gereja = $input['id_gereja'];
		$baptis->id_gereja = Auth::user()->anggota->id_gereja;
		
		try{
			$baptis->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
				
	}
		
	public function postAtestasi()
	{	
		$input = Input::get('data');
		
		$atestasi = new Atestasi();
		$atestasi->no_atestasi = $input['no_atestasi'];
		$atestasi->tanggal_atestasi = $input['tanggal_atestasi'];
		$atestasi->id_jenis_atestasi = $input['id_jenis_atestasi'];
		$atestasi->keterangan = $input['keterangan'];
		$atestasi->nama_gereja_lama = $input['nama_gereja_lama'];
		$atestasi->nama_gereja_baru = $input['nama_gereja_baru'];
		$atestasi->id_atestasi_baru = null;
		if($input['id_gereja_lama'] == '')
		{
			$atestasi->id_gereja_lama = null;
		}
		else
		{
			$atestasi->id_gereja_lama = $input['id_gereja_lama'];
		}
		if($input['id_gereja_baru'] == '')
		{
			$atestasi->id_gereja_baru = null;
		}
		else
		{
			$atestasi->id_gereja_baru = $input['id_gereja_baru'];
		}
		try{
			$atestasi->save();	
				
			$anggota = Anggota::find($input['id_jemaat']);
		
			if($anggota->id_atestasi == null) //anggota masih blom punya id_atestasi
			{													
				//update id_atestasi anggota
				$anggota->id_atestasi = $atestasi->id;
				try{
					$anggota->save();
					
					return "berhasil";
				}catch(Exception $e){
					//delete atestasi
					$atestasi->delete();
					
					return $e->getMessage();
				}			
			}
			else //anggota udh punya id_atestasi
			{
				//looping sampe data atestasi terakhir milik anggota
				$temp_id_atestasi = $anggota->id_atestasi;
				while($temp_id_atestasi != null)
				{
					$temp_atestasi = Atestasi::find($temp_id_atestasi);
					$temp_id_atestasi = $temp_atestasi->id_atestasi_baru;
				}
				
				//update id_atestasi_baru
				$temp_atestasi->id_atestasi_baru = $atestasi->id;
				try{
					$temp_atestasi->save();
					
					return "berhasil";
				}catch(Exception $e){	
					//delete atestasi
					$atestasi->delete();
					
					return $e->getMessage();
				}
			}
		}catch(Exception $e){
			return $e;
		}
		
	}
	
	public function postPernikahan()
	{
		$input = Input::get('data');
		
		$pernikahan = new Pernikahan();
		$pernikahan->no_pernikahan = $input['no_pernikahan'];
		$pernikahan->tanggal_pernikahan = $input['tanggal_pernikahan'];
		$pernikahan->id_pendeta = $input['id_pendeta'];
		$pernikahan->id_gereja = $input['id_gereja'];		
		$pernikahan->nama_pria = $input['nama_pria'];
		$pernikahan->nama_wanita = $input['nama_wanita'];
		if($input['id_jemaat_wanita'] == '')
		{
			$pernikahan->id_jemaat_wanita = null;
		}
		else
		{
			$pernikahan->id_jemaat_wanita = $input['id_jemaat_wanita'];
		}
		if($input['id_jemaat_pria'] == '')
		{
			$pernikahan->id_jemaat_pria = null;
		}
		else
		{
			$pernikahan->id_jemaat_pria = $input['id_jemaat_pria'];
		}
		try{
			$pernikahan->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
				
	}
	
	public function postKedukaan()
	{		
		$input = Input::get('data');
		
		$duka = new Kedukaan();
		$duka->no_kedukaan = $input['no_kedukaan'];
		// $duka->id_gereja = $input['id_gereja'];
		$duka->id_gereja = Auth::user()->anggota->id_gereja;
		$duka->id_jemaat = $input['id_jemaat'];		
		$duka->keterangan = $input['keterangan'];
		
		try{
			$duka->save();
			
			//save tanggal_meninggal anggota
			$anggota = Anggota::find($input['id_jemaat']);
			if(count($anggota) != 0)
			{
				$anggota->tanggal_meninggal = $input['tanggal_meninggal'];
				try{
					$anggota->save();
					
					return "berhasil";
				}catch(Exception $e){
					//delete duka
					$duka->delete();
					
					return $e->getMessage();
				}
			}
			else
			{
				return "gagal";
			}
			
			return "berhasil";			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
		
	public function postDkh()
	{
		$input = Input::get('data');	
		
		$dkh = new Dkh();
		$dkh->no_dkh = $input['no_dkh'];
		$dkh->id_jemaat = $input['id_jemaat'];
		$dkh->keterangan = $input['keterangan'];
		try{
			$dkh->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
							
	}
	
/*----------------------------------------EDIT----------------------------------------*/	
		
	public function editKebaktian()
	{		
		//NOTE :			
		//masukin data ke persembahan ... 
		
		$input = Input::get('data');			
		
		$kebaktian = new Kegiatan();										
		if($input['id_pendeta'] == '')
		{
			$kebaktian->id_pendeta = null;
		}
		else
		{
			$kebaktian->id_pendeta = $input['id_pendeta'];
		}		
		$kebaktian->nama_pendeta = $input['nama_pendeta'];
		$kebaktian->id_jenis_kegiatan = $input['kebaktian_ke'];				
		$kebaktian->tanggal_mulai = $input['tanggal_mulai'];
		$kebaktian->tanggal_selesai = $input['tanggal_selesai'];
		$kebaktian->jam_mulai = $input['jam_mulai'];
		$kebaktian->jam_selesai = $input['jam_selesai'];
		$kebaktian->banyak_jemaat_pria = $input['banyak_jemaat_pria'];
		$kebaktian->banyak_jemaat_wanita = $input['banyak_jemaat_wanita'];
		$kebaktian->banyak_jemaat = $input['banyak_jemaat'];
		$kebaktian->banyak_simpatisan_pria = $input['banyak_simpatisan_pria'];
		$kebaktian->banyak_simpatisan_wanita = $input['banyak_simpatisan_wanita'];
		$kebaktian->banyak_simpatisan = $input['banyak_simpatisan'];
		$kebaktian->banyak_penatua_pria = $input['banyak_penatua_pria'];
		$kebaktian->banyak_penatua_wanita = $input['banyak_penatua_wanita'];
		$kebaktian->banyak_penatua = $input['banyak_penatua'];
		$kebaktian->banyak_komisi_pria = $input['banyak_komisi_pria'];
		$kebaktian->banyak_komisi_wanita = $input['banyak_komisi_wanita'];
		$kebaktian->banyak_komisi = $input['banyak_komisi'];
		$kebaktian->banyak_pemusik_pria = $input['banyak_pemusik_pria'];
		$kebaktian->banyak_pemusik_wanita = $input['banyak_pemusik_wanita'];
		$kebaktian->banyak_pemusik = $input['banyak_pemusik'];		
		// $kebaktian->id_gereja = $input['id_gereja'];
		$kebaktian->id_gereja = Auth::user()->anggota->id_gereja;		
		$kebaktian->keterangan = $input['keterangan'];					
		
		try{
			$kebaktian->save();
			
			try{
				$persembahan = new Persembahan();
				$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
				$persembahan->jumlah_persembahan = $input['jumlah_persembahan'];
				$persembahan->id_kegiatan = $kebaktian->id;
				$persembahan->jenis = 1;
				
				$persembahan->save();
				
				return "berhasil";
			}catch(Exception $e){
				//delete kebaktian
				$kebaktian->delete();
			
				return $e->getMessage();
			}
						
		}catch(Exception $e){
			return $e->getMessage();
		}
							
	}
		
	public function editAnggota()
	{	
		$anggota = new Anggota();
		$anggota->no_anggota = Input::get('no_anggota');
		$anggota->nama_depan = Input::get('nama_depan');
		$anggota->nama_tengah = Input::get('nama_tengah');
		$anggota->nama_belakang = Input::get('nama_belakang');
		$anggota->telp = Input::get('telp');
		$anggota->gender = Input::get('gender');
		$anggota->wilayah = Input::get('wilayah');
		$anggota->gol_darah = Input::get('gol_darah');
		$anggota->pendidikan = Input::get('pendidikan');
		$anggota->pekerjaan = Input::get('pekerjaan');
		$anggota->etnis = Input::get('etnis');
		$anggota->kota_lahir = Input::get('kota_lahir');
		$anggota->tanggal_lahir = Input::get('tanggal_lahir');		
		// $anggota->id_gereja = Input::get('id_gereja');
		$anggota->id_gereja = Auth::user()->anggota->id_gereja;
		$anggota->role = Input::get('role');
		
		$anggota->id_atestasi = null;
		
		try{
			$anggota->save();
			
			//save no hp
			$ctHp = 0;			
			$temp_arr_hp = Input::get('arr_hp');
			if($temp_arr_hp != "") //kalo ada input hp			
			{
				$arr_hp = explode(",", $temp_arr_hp);
				foreach($arr_hp as $key)
				{
					$hp = new Hp();
					$hp->no_hp = $key;
					$hp->id_anggota = $anggota->id;
					try{
						$hp->save();
						
						$ctHp++;					
					}catch(Exception $e){		
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
					
						return $e->getMessage();
					}
				}
			}
			
			//save alamat
			$alamat = new Alamat();
			$alamat->jalan = Input::get('jalan');
			$alamat->kota = Input::get('kota');
			$alamat->kodepos = Input::get('kodepos');
			$alamat->id_anggota = $anggota->id;
			try{
				$alamat->save();
			}catch(Exception $e){
				//delete anggota
				$anggota->delete();
				
				//delete hp sebelumnya
				for($i = 0; $i < $ctHp ; $i++)
				{
					$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
					$delHp->delete();
				}
			
				return $e->getMessage();
			}
			
			//save foto
			if (Input::hasFile('foto'))
			{
				$file = Input::file('foto');
				$destinationPath = "assets/file_upload/anggota/";
				$fileName = $file->getClientOriginalName();						
				
				$foto_id = $anggota->id;
				$destinationPath .= $foto_id;
				$destinationPath .= "/";
				if(!file_exists($destinationPath))
				{
					File::makeDirectory($destinationPath, $mode = 0777, true, true);
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$anggota->foto = $destinationPath.$fileName;
					try{
						$anggota->save();
					}catch(Exception $e){
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
						
						//delete alamat
						$alamat->delete();
					}					
				}
				else
				{
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$anggota->foto = $destinationPath.$fileName;
					try{
						$anggota->save();
					}catch(Exception $e){
						//delete anggota
						$anggota->delete();
						
						//delete hp sebelumnya
						for($i = 0; $i < $ctHp ; $i++)
						{
							$delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							$delHp->delete();
						}
						
						//delete alamat
						$alamat->delete();
					}					
				}
			}
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}		
			
	}
	
	public function editBaptis()
	{		
		$input = Input::get('data');
		
		$baptis = new Baptis();
		$baptis->no_baptis = $input['no_baptis'];				
		$baptis->id_jemaat = $input['id_jemaat'];
		$baptis->id_pendeta = $input['id_pendeta'];
		$baptis->tanggal_baptis = $input['tanggal_baptis'];
		$baptis->id_jenis_baptis = $input['id_jenis_baptis'];
		// $baptis->id_gereja = $input['id_gereja'];
		$baptis->id_gereja = Auth::user()->anggota->id_gereja;
		
		try{
			$baptis->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
				
	}
		
	public function editAtestasi()
	{	
		$input = Input::get('data');
		
		$atestasi = new Atestasi();
		$atestasi->no_atestasi = $input['no_atestasi'];
		$atestasi->tanggal_atestasi = $input['tanggal_atestasi'];
		$atestasi->id_jenis_atestasi = $input['id_jenis_atestasi'];
		$atestasi->keterangan = $input['keterangan'];
		$atestasi->nama_gereja_lama = $input['nama_gereja_lama'];
		$atestasi->nama_gereja_baru = $input['nama_gereja_baru'];
		$atestasi->id_atestasi_baru = null;
		if($input['id_gereja_lama'] == '')
		{
			$atestasi->id_gereja_lama = null;
		}
		else
		{
			$atestasi->id_gereja_lama = $input['id_gereja_lama'];
		}
		if($input['id_gereja_baru'] == '')
		{
			$atestasi->id_gereja_baru = null;
		}
		else
		{
			$atestasi->id_gereja_baru = $input['id_gereja_baru'];
		}
		try{
			$atestasi->save();	
				
			$anggota = Anggota::find($input['id_jemaat']);
		
			if($anggota->id_atestasi == null) //anggota masih blom punya id_atestasi
			{													
				//update id_atestasi anggota
				$anggota->id_atestasi = $atestasi->id;
				try{
					$anggota->save();
					
					return "berhasil";
				}catch(Exception $e){
					//delete atestasi
					$atestasi->delete();
					
					return $e->getMessage();
				}			
			}
			else //anggota udh punya id_atestasi
			{
				//looping sampe data atestasi terakhir milik anggota
				$temp_id_atestasi = $anggota->id_atestasi;
				while($temp_id_atestasi != null)
				{
					$temp_atestasi = Atestasi::find($temp_id_atestasi);
					$temp_id_atestasi = $temp_atestasi->id_atestasi_baru;
				}
				
				//update id_atestasi_baru
				$temp_atestasi->id_atestasi_baru = $atestasi->id;
				try{
					$temp_atestasi->save();
					
					return "berhasil";
				}catch(Exception $e){	
					//delete atestasi
					$atestasi->delete();
					
					return $e->getMessage();
				}
			}
		}catch(Exception $e){
			return $e;
		}
		
	}
	
	public function editPernikahan()
	{
		$input = Input::get('data');
		
		$pernikahan = new Pernikahan();
		$pernikahan->no_pernikahan = $input['no_pernikahan'];
		$pernikahan->tanggal_pernikahan = $input['tanggal_pernikahan'];
		$pernikahan->id_pendeta = $input['id_pendeta'];
		$pernikahan->id_gereja = $input['id_gereja'];		
		$pernikahan->nama_pria = $input['nama_pria'];
		$pernikahan->nama_wanita = $input['nama_wanita'];
		if($input['id_jemaat_wanita'] == '')
		{
			$pernikahan->id_jemaat_wanita = null;
		}
		else
		{
			$pernikahan->id_jemaat_wanita = $input['id_jemaat_wanita'];
		}
		if($input['id_jemaat_pria'] == '')
		{
			$pernikahan->id_jemaat_pria = null;
		}
		else
		{
			$pernikahan->id_jemaat_pria = $input['id_jemaat_pria'];
		}
		try{
			$pernikahan->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
				
	}
	
	public function editKedukaan()
	{		
		$input = Input::get('data');
		
		$duka = new Kedukaan();
		$duka->no_kedukaan = $input['no_kedukaan'];
		// $duka->id_gereja = $input['id_gereja'];
		$duka->id_gereja = Auth::user()->anggota->id_gereja;
		$duka->id_jemaat = $input['id_jemaat'];		
		$duka->keterangan = $input['keterangan'];
		
		try{
			$duka->save();
			
			//save tanggal_meninggal anggota
			$anggota = Anggota::find($input['id_jemaat']);
			if(count($anggota) != 0)
			{
				$anggota->tanggal_meninggal = $input['tanggal_meninggal'];
				try{
					$anggota->save();
					
					return "berhasil";
				}catch(Exception $e){
					//delete duka
					$duka->delete();
					
					return $e->getMessage();
				}
			}
			else
			{
				return "gagal";
			}
			
			return "berhasil";			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
		
	public function editDkh()
	{
		$input = Input::get('data');	
		
		$dkh = new Dkh();
		$dkh->no_dkh = $input['no_dkh'];
		$dkh->id_jemaat = $input['id_jemaat'];
		$dkh->keterangan = $input['keterangan'];
		try{
			$dkh->save();
			
			return "berhasil";
		}catch(Exception $e){
			return $e->getMessage();
		}
							
	}
}

?>