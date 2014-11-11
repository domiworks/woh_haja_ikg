<?php

use Carbon\Carbon;

class InputEditController extends BaseController {
	
	public function view_kebaktian()
	{		
		$list_jenis_kegiatan = $this->getListJenisKegiatan();		
		$list_pembicara = $this->getListPendeta();
		return View::make('pages.kebaktian', 
			compact('list_jenis_kegiatan', 'list_pembicara')
		);					
	}
	
	public function view_anggota()
	{
		$list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		$list_role = $this->getListRoleAnggota();
		return View::make('pages.anggota', compact('list_gereja','list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis','list_role'));
		// return null;
	}
	
	public function view_baptis()
	{
		$list_gereja = $this->getListGereja();
		$list_pembaptis = $this->getListPendeta();
		$list_jenis_baptis = $this->getListJenisBaptis();
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.baptis', compact('list_gereja','list_pembaptis','list_jenis_baptis','list_jemaat'));
		// return null;
	}	
	
	public function view_atestasi()
	{
		$list_jenis_atestasi = $this->getListJenisAtestasi();
		$list_jemaat = $this->getListJemaat();
		$list_gereja = $this->getListGereja();
		return View::make('pages.atestasi', compact('list_jenis_atestasi','list_jemaat','list_gereja'));
		// return null;
	}
	
	public function view_pernikahan()
	{
		$list_jemaat_pria = $this->getListJemaatPria();
		$list_jemaat_wanita = $this->getListJemaatWanita();
		$list_gereja = $this->getListGereja();
		$list_pendeta = $this->getListPendeta();
		return View::make('pages.pernikahan', compact('list_jemaat_pria','list_jemaat_wanita','list_gereja','list_pendeta'));
		// return null;
	}
	
	public function view_kedukaan()
	{
		$list_gereja = $this->getListGereja();
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.kedukaan', compact('list_gereja','list_jemaat'));
		// return null;
	}
	
	public function view_dkh()
	{
		$list_jemaat = $this->getListJemaat();
		return View::make('pages.dkh', compact('list_jemaat'));
		// return null;
	}

/*----------------------------------------POST----------------------------------------*/	
	
	public function postKebaktian()
	{		
		//NOTE :
		//$kebaktian->id_gereja = ...	
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
		$kebaktian->keterangan = $input['keterangan'];
				
		try{
			$kebaktian->save();
			return true;			
		}catch(Exception $e){
			return $e;
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
		$anggota->id_gereja = Input::get('id_gereja');
		$anggota->role = Input::get('role');
		
		$anggota->id_atestasi = null;
		
		try{
			$anggota->save();
			
			//save no hp
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
					}catch(Exception $e){
						return $e;
					}
				}
			}
			
			//save alamat
			$alamat = new Alamat();
			$alamat->jalan = Input::get('alamat');
			$alamat->kota = Input::get('kota');
			$alamat->kodepos = Input::get('kodepos');
			$alamat->id_anggota = $anggota->id;
			try{
				$alamat->save();
			}catch(Exception $e){
				return $e;
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
					$anggota->save();
				}
				else
				{
					$uploadSuccess = $file->move($destinationPath, $fileName);
					$anggota->foto = $destinationPath.$fileName;
					$anggota->save();
				}
			}
			return true;
		}catch(Exception $e){
			return $e;
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
		$baptis->id_gereja = $input['id_gereja'];
		
		try{
			$baptis->save();
		}catch(Exception $e){
			return $e;
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
		}catch(Exception $e){
			return $e;
		}
		
		$anggota = Anggota::find($input['id_jemaat']);
		
		if($anggota->id_atestasi == null) //anggota masih blom punya id_atestasi
		{													
			//update id_atestasi anggota
			$anggota->id_atestasi = $atestasi->id;
			try{
				$anggota->save();
				
				return true;
			}catch(Exception $e){
				return $e;
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
				
				return true;
			}catch(Exception $e){
				return $e;
			}
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
			
			return true;
		}catch(Exception $e){
			return $e;
		}
				
	}
	
	public function postKedukaan()
	{
		$input = Input::get('data');
		
		$duka = new Kedukaan();
		$duka->no_kedukaan = $input['no_kedukaan'];
		$duka->id_gereja = $input['id_gereja'];
		$duka->id_jemaat = $input['id_jemaat'];
		$duka->tanggal_meninggal = $input['tanggal_meninggal'];
		$duka->keterangan = $input['keterangan'];
		try{
			$duka->save();
			
			return true;			
		}catch(Exception $e){
			return $e;
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
			
			return true;
		}catch(Exception $e){
			return $e;
		}
							
	}
	
	//--------------------------------------------------GET LIST--------------------------------------------------
	
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
	
	//get list role anggota
	public function getListRoleAnggota()
	{
		$arrRoleAnggota = array(
			'1' => 'jemaat',
			'2' => 'pendeta',
			'3' => 'penatua',
			'4' => 'majelis'
		);
		return $arrRoleAnggota;
	}
	
	//get list jenis kegiatan
	public function getListJenisKegiatan()
	{
		$count = DB::table('jenis_kegiatan')->orderBy('id','asc')->lists('nama_kegiatan','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jenis baptis
	public function getListJenisBaptis()
	{
		$count = DB::table('jenis_baptis')->orderBy('id','asc')->lists('nama_jenis_baptis','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jenis atestasi
	public function getListJenisAtestasi()
	{
		$count = DB::table('jenis_atestasi')->orderBy('id','asc')->lists('nama_atestasi','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list pendeta
	public function getListPendeta()
	{		
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 2)
					->orderBy('nama_depan')								
					->lists('nama_lengkap', 'id');					
		if(count($count) != 0)
		{			
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat
	public function getListJemaat()
	{				
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat pria
	public function getListJemaatPria()
	{		
		// $count = DB::table('anggota')->where('role', '=', 2)->orderBy('nama_depan','asc')
				// ->lists('nama_depan'.' '.'nama_tengah'. ' '.'nama_belakang','id');
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->where('gender', '=', 1)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat wanita
	public function getListJemaatWanita()
	{		
		// $count = DB::table('anggota')->where('role', '=', 2)->orderBy('nama_depan','asc')
				// ->lists('nama_depan'.' '.'nama_tengah'. ' '.'nama_belakang','id');
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->where('gender', '=', 0)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
}

?>