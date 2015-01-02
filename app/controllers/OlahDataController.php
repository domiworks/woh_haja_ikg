<?php

use Carbon\Carbon;

class OlahDataController extends BaseController {

	public function view_kebaktian()
	{	
		$header = $this->setHeader();
		$list_jenis_kegiatan = $this->getListJenisKegiatan();		
		$list_pembicara = $this->getListPendeta();
		// $list_gereja = $this->getListGereja();		
		return View::make('pages.user_olahdata.kebaktian_domi',
			compact('header','list_jenis_kegiatan', 'list_pembicara'));		
	}		

	public function view_anggota()
	{
		$header = $this->setHeader();
		$list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		$list_role = $this->getListRoleAnggota();		
		return View::make('pages.user_olahdata.anggota_domi', 
			compact('header','list_gereja','list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis','list_role'));
	}	
	
	public function view_baptis()
	{		
		$header = $this->setHeader();
		$list_pembaptis = $this->getListPendeta();	
		$list_jenis_baptis = $this->getListJenisBaptis();
		$list_gereja = $this->getListGereja();				
		$list_jemaat = $this->getListAnggota();				
		return View::make('pages.user_olahdata.baptis_domi', 
			compact('header','list_pembaptis','list_jenis_baptis','list_gereja','list_jemaat'));		
	}
	
	public function view_atestasi()
	{		
		$header = $this->setHeader();
		$list_jenis_atestasi = $this->getListJenisAtestasi();
		$list_jemaat = $this->getListAnggota();
		$list_gereja = $this->getListGereja();		
		return View::make('pages.user_olahdata.atestasi_domi', 
			compact('header','list_jenis_atestasi','list_jemaat','list_gereja'));		
	}
	
	public function view_pernikahan()
	{	
		$header = $this->setHeader();
		$list_pendeta = $this->getListPendeta();
		$list_jemaat_pria = $this->getListAnggotaPria();
		$list_jemaat_wanita = $this->getListAnggotaWanita();
		$list_gereja = $this->getListGereja();		
		// $list_gereja = $this->getListGereja();		
		return View::make('pages.user_olahdata.pernikahan_domi', 
				compact('header','list_pendeta','list_jemaat_pria','list_jemaat_wanita','list_gereja'));				
	}
		
	public function view_kedukaan()
	{			
		$header = $this->setHeader();
		$list_anggota = $this->getListAnggotaHidup();
		// $list_gereja = $this->getListGereja();		
		return View::make('pages.user_olahdata.kedukaan_domi', 
			compact('header','list_anggota'));		
	}
	
	public function view_dkh()
	{	
		$header = $this->setHeader();
		$list_jemaat = $this->getListAnggota();		
		return View::make('pages.user_olahdata.dkh_domi', 
			compact('header','list_jemaat'));
		
	}
	
	/*--------------------------------SEARCH----------------------------------------*/		
	
	public function search_kebaktian()
	{		
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$nama_kebaktian = $input->{'nama_kebaktian'};		
		$nama_pendeta = $input->{'nama_pendeta'};
		$tanggal_awal = $input->{'tanggal_awal'};
		$tanggal_akhir = $input->{'tanggal_akhir'};
		$jam_awal = $input->{'jam_awal'};
		$jam_akhir = $input->{'jam_akhir'};		
		$batas_bawah_hadir_jemaat = $input->{'batas_bawah_hadir_jemaat'};
		$batas_atas_hadir_jemaat = $input->{'batas_atas_hadir_jemaat'};
		$batas_bawah_hadir_simpatisan = $input->{'batas_bawah_hadir_simpatisan'};
		$batas_atas_hadir_simpatisan = $input->{'batas_atas_hadir_simpatisan'};
		$batas_bawah_hadir_penatua = $input->{'batas_bawah_hadir_penatua'};
		$batas_atas_hadir_penatua = $input->{'batas_atas_hadir_penatua'};
		$batas_bawah_hadir_pemusik = $input->{'batas_bawah_hadir_pemusik'};
		$batas_atas_hadir_pemusik = $input->{'batas_atas_hadir_pemusik'};
		$batas_bawah_hadir_komisi = $input->{'batas_bawah_hadir_komisi'};
		$batas_atas_hadir_komisi = $input->{'batas_atas_hadir_komisi'};		
		
		$kebaktian = DB::table('kegiatan AS keg')->where('keg.deleted', '=', 0)->where('id_gereja', '=', Auth::user()->id_gereja);		
		
		if($nama_kebaktian != "")
		{	
			$kebaktian = $kebaktian->where('keg.nama_jenis_kegiatan', 'LIKE', '%'.$nama_kebaktian.'%');
		}		
		if($nama_pendeta != "")
		{			
			$kebaktian = $kebaktian->where('keg.nama_pendeta', 'LIKE', '%'.$nama_pendeta.'%');
		}
		//validation range tanggal
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$kebaktian = $kebaktian->where('keg.tanggal_mulai', '>=', $tanggal_awal);
				$kebaktian = $kebaktian->where('keg.tanggal_selesai', '<=', $tanggal_akhir);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.tanggal_mulai', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$kebaktian = $kebaktian->where('keg.tanggal_selesai', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
		//validation range jam
		if($jam_awal != "")
		{
			if($jam_akhir != "")
			{
				$kebaktian = $kebaktian->where('keg.jam_mulai', '>=', $jam_awal);
				$kebaktian = $kebaktian->where('keg.jam_selesai', '<=', $jam_akhir);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.jam_mulai', '>=', $jam_awal);
			}
		}
		else
		{
			if($jam_akhir != "")
			{				
				$kebaktian = $kebaktian->where('keg.jam_selesai', '<=', $jam_akhir);
			}
			else
			{
				//ga ada jam awal dan akhir
			}
		}
		//validation range banyak jemaat
		if($batas_bawah_hadir_jemaat != "")
		{
			if($batas_atas_hadir_jemaat != "")
			{
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '>=', $batas_bawah_hadir_jemaat);
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '<=', $batas_atas_hadir_jemaat);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '>=', $batas_bawah_hadir_jemaat);
			}
		}
		else
		{
			if($batas_atas_hadir_jemaat != "")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '<=', $batas_atas_hadir_jemaat);
			}
			else
			{
				//ga ada batas kehadiran jemaat
			}
		}
		//validation range banyak simpatisan
		if($batas_bawah_hadir_simpatisan != "")
		{
			if($batas_atas_hadir_simpatisan != "")
			{
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '>=', $batas_bawah_hadir_simpatisan);
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '<=', $batas_atas_hadir_simpatisan);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '>=', $batas_bawah_hadir_simpatisan);
			}
		}
		else
		{
			if($batas_atas_hadir_simpatisan != "")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '<=', $batas_atas_hadir_simpatisan);
			}
			else
			{
				//ga ada batas kehadiran simpatisan
			}
		}		
		//validation range banyak penatua
		if($batas_bawah_hadir_penatua != "")
		{
			if($batas_atas_hadir_penatua != "")
			{
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '>=', $batas_bawah_hadir_penatua);
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '<=', $batas_atas_hadir_penatua);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '>=', $batas_bawah_hadir_penatua);
			}
		}
		else
		{
			if($batas_atas_hadir_penatua != "")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '<=', $batas_atas_hadir_penatua);
			}
			else
			{
				//ga ada batas kehadiran penatua
			}
		}
		//validation range banyak pemusik
		if($batas_bawah_hadir_pemusik != "")
		{
			if($batas_atas_hadir_pemusik != "")
			{
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '>=', $batas_bawah_hadir_pemusik);
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '<=', $batas_atas_hadir_pemusik);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '>=', $batas_bawah_hadir_pemusik);
			}
		}
		else
		{
			if($batas_atas_hadir_pemusik != "")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '<=', $batas_atas_hadir_pemusik);
			}
			else
			{
				//ga ada batas kehadiran pemusik
			}
		}
		//validation range banyak komisi
		if($batas_bawah_hadir_komisi != "")
		{
			if($batas_atas_hadir_komisi != "")
			{
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '>=', $batas_bawah_hadir_komisi);
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '<=', $batas_atas_hadir_komisi);
			}
			else
			{
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '>=', $batas_bawah_hadir_komisi);
			}
		}
		else
		{
			if($batas_atas_hadir_komisi != "")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '<=', $batas_atas_hadir_komisi);
			}
			else
			{
				//ga ada batas kehadiran komisi
			}
		}
		
		$kebaktian = $kebaktian->orderBy('keg.tanggal_mulai')->get();
				
		if(count($kebaktian) == 0)
		{
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			foreach($kebaktian as $key)
			{
				$persembahan = Persembahan::where('id_kegiatan', '=', $key->id)->first();
				
				$key->id_persembahan = $persembahan->id; 			
				$key->jumlah_persembahan = $persembahan->jumlah_persembahan;			
			}
			
			// return $kebaktian;			
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $kebaktian);			
			return json_encode($respond);
		}		
	}
	
	public function search_anggota()
	{		
		$no_anggota = Input::get('no_anggota');		
		$nama = Input::get('nama');
		$kota = Input::get('kota');
		$gender = Input::get('gender');
		$wilayah = Input::get('wilayah');
		$gol_darah = Input::get('gol_darah');
		$pendidikan = Input::get('pendidikan');
		$pekerjaan = Input::get('pekerjaan');
		$etnis = Input::get('etnis');
		// $tanggal_lahir = Input::get('tanggal_lahir');
		$tanggal_awal = Input::get('tanggal_awal');
		$tanggal_akhir = Input::get('tanggal_akhir');
		// $id_gereja = Input::get('id_gereja');
		// $id_gereja = Auth::user()->id_gereja;
		$role = Input::get('role');		
		
		// $anggota = DB::table('alamat AS alm');		
		// $anggota = $anggota->join('anggota AS ang', 'alm.id_anggota', '=', 'ang.id')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);
		
		$anggota = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);				
		$anggota = $anggota->join('alamat AS alm', 'ang.id', '=','alm.id_anggota'); //yg ini ngerubah 'id' jadi yg di 'alamat'				
				
		
		// if($id_gereja != "") //pasti terima value 1-... sesuai dengan login gereja user
		// {
			// $anggota = $anggota->where('ang.id_gereja', '=', $id_gereja);
		// }		
		if($no_anggota != "")
		{
			$anggota = $anggota->where('ang.no_anggota', 'LIKE', '%'.$no_anggota.'%');
		}
		if($kota != "")
		{				
			$anggota = $anggota->where('alm.kota', 'LIKE', '%'.$kota.'%');
		}
		if($gender != "") 
		{
			$anggota = $anggota->where('ang.gender', '=', $gender);
		}
		if($wilayah != "")
		{
			$anggota = $anggota->where('ang.wilayah', '=', $wilayah);
		}
		if($gol_darah != "")
		{
			$anggota = $anggota->where('ang.gol_darah', '=', $gol_darah);
		}
		if($pendidikan != "")
		{
			$anggota = $anggota->where('ang.pendidikan', '=', $pendidikan);
		}
		if($pekerjaan != "")
		{
			$anggota = $anggota->where('ang.pekerjaan', '=', $pekerjaan);
		}
		if($etnis != "")
		{
			$anggota = $anggota->where('ang.etnis', '=', $etnis);
		}
		//validation range tanggal lahir
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$anggota = $anggota->where('ang.tanggal_lahir', '>=', $tanggal_awal);
				$anggota = $anggota->where('ang.tanggal_lahir', '<=', $tanggal_akhir);
			}
			else
			{
				$anggota = $anggota->where('ang.tanggal_lahir', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$anggota = $anggota->where('ang.tanggal_lahir', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
		// if($tanggal_lahir != "")
		// {
			// $anggota = $anggota->where('ang.tanggal_lahir', '=', $tanggal_lahir);
		// }		
		if($role != "") 
		{
			$anggota = $anggota->where('ang.role', '=', $role);
		}
		if($nama != "")
		{
			// $anggota = $anggota->where('ang.nama_depan', 'LIKE', '%'.$nama.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama.'%');
			// $anggota = $anggota->where('ang.nama_lengkap', 'LIKE', '%'.$nama.'%');
			$anggota = $anggota->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}
						
		$anggota = $anggota->orderBy('ang.nama_depan');
						
		$anggota = $anggota->get();
		
		//add hp		
		foreach($anggota as $key)
		{									
			
			$hp = Hp::where('id_anggota', '=', $key->id_anggota)->where('deleted', '=', 0)->get();
			
			$arr_hp = array();
			foreach($hp as $each_hp)
			{
				$arr_hp[] = $each_hp->no_hp;
			}			
			//add to anggota
			if(count($hp) == 0)
			{
				$key->arr_hp = "";
			}
			else
			{
				$key->arr_hp = $arr_hp;
			}
		}
													
		if(count($anggota) == 0)
		{			
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $anggota);			
			return json_encode($respond);
			// return $anggota;
		}		
		
	}
	
	public function search_baptis()
	{		
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$no_baptis = $input->{'no_baptis'};
		$nama_jemaat = $input->{'nama_jemaat'};
		$id_pembaptis = $input->{'id_pembaptis'};
		$tanggal_awal = $input->{'tanggal_awal'};
		$tanggal_akhir = $input->{'tanggal_akhir'};
		$id_jenis_baptis = $input->{'id_jenis_baptis'};				
		
		//query mulai dari anggota nyambung ke baptis
		$baptis = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->whereNotIn('ang.role', array(2));
		
		$baptis = $baptis->join('baptis AS bap', 'ang.id', '=', 'bap.id_jemaat')->where('bap.deleted', '=', 0);		
			
		$baptis = $baptis->where('bap.id_gereja', '=', Auth::user()->id_gereja);														
		if($no_baptis != "")
		{
			$baptis = $baptis->where('bap.no_baptis', 'LIKE', '%'.$no_baptis.'%');
		}						
			
		if($nama_jemaat != "")
		{												
			// $baptis = $baptis->where('ang.nama_depan', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama_jemaat.'%');
			$baptis = $baptis->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}				
		if($id_pembaptis != -1)
		{
			$baptis = $baptis->where('bap.id_pendeta', '=', $id_pembaptis);
		}
		/*
		if($nama_pembaptis != "")
		{			
			$baptis = $baptis->join('anggota AS pend', 'bap.id_pendeta', '=', 'pend.id');			
			$baptis = $baptis->where('pend.role', '=', 2); //yang merupakan pendeta
			$baptis = $baptis->where('pend.nama_depan', 'LIKE', '%'.$nama_pembaptis.'%')
								->orWhere('pend.nama_tengah', 'LIKE', '%'.$nama_pembaptis.'%')
								->orWhere('pend.nama_belakang', 'LIKE', '%'.$nama_pembaptis.'%');
		}
		*/		
		//validation range tanggal
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$baptis = $baptis->where('bap.tanggal_baptis', '>=', $tanggal_awal);
				$baptis = $baptis->where('bap.tanggal_baptis', '<=', $tanggal_akhir);
			}
			else
			{
				$baptis = $baptis->where('bap.tanggal_baptis', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$baptis = $baptis->where('bap.tanggal_baptis', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}		
		if($id_jenis_baptis != -1)
		{
			$baptis = $baptis->where('bap.id_jenis_baptis', '=', $id_jenis_baptis);
		}
		
		$baptis = $baptis->get();
		
		//add nama_jenis_baptis
		foreach($baptis as $row)
		{
			$nama_jenis_baptis = JenisBaptis::where('id', '=', $row->id_jenis_baptis)->first()->nama_jenis_baptis;
			$row->nama_jenis_baptis = $nama_jenis_baptis;
		}
		
		// if($id_gereja != "")
		// {
			// $baptis = $baptis->where('bap.id_gereja', '=', $id_gereja);			
		// }		
		/*
		$baptis = $baptis->get( array(
			'bap.id AS id', 
			'bap.no_baptis AS no_baptis',
			'bap.id_jemaat AS id_jemaat',
			'bap.id_pendeta AS id_pendeta',
			'bap.tanggal_baptis AS tanggal_baptis',
			'bap.id_jenis_baptis AS id_jenis_baptis',
			'bap.id_gereja AS id_gereja',
			'bap.created_at AS created_at',
			'bap.updated_at AS updated_at',
			'ang.nama_depan AS nama_depan_jemaat',
			'ang.nama_tengah AS nama_tengah_jemaat',
			'ang.nama_belakang AS nama_belakang_jemaat'
		));
		*/							
		if(count($baptis) == 0)
		{
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $baptis);			
			return json_encode($respond);
			// return $baptis;
		}	
				
	}
	
	public function search_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
				
		$no_atestasi = $input->{'no_atestasi'};
		$nama = $input->{'nama_jemaat'};
		$tanggal_awal = $input->{'tanggal_awal'};
		$tanggal_akhir = $input->{'tanggal_akhir'};
		$id_jenis_atestasi = $input->{'id_jenis_atestasi'};
		$nama_gereja_lama = $input->{'nama_gereja_lama'};
		$nama_gereja_baru = $input->{'nama_gereja_baru'};
		
		$atestasi = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);
		
		$atestasi = $atestasi->join('atestasi AS ate', 'ang.id', '=', 'ate.id_anggota')->where('ate.deleted', '=', 0);				
		
		//query ini supaya keluar urutan ascending per nama anggota
		$atestasi = $atestasi->orderBy('ang.nama_depan');
		
		// $atestasi = DB::table('atestasi AS ate');		
		// $atestasi = $atestasi->join('anggota AS ang', 'ate.id', '=', 'ang.id_atestasi');
		// $atestasi = $atestasi->where('ang.role', '=', 1); // role jemaat		
		
		// $atestasi = $atestasi->get();
		
		// return $atestasi;
		
		if($nama != "")
		{					
			// $atestasi = $atestasi->where('ang.nama_depan', 'LIKE', '%'.$nama.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama.'%');
			$atestasi = $atestasi->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}		
		
		if($no_atestasi != "")
		{
			$atestasi = $atestasi->where('ate.no_atestasi', 'LIKE', '%'.$no_atestasi.'%');			
		}
		
		//validation range tanggal
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$atestasi = $atestasi->where('ate.tanggal_atestasi', '>=', $tanggal_awal);
				$atestasi = $atestasi->where('ate.tanggal_atestasi', '<=', $tanggal_akhir);
			}
			else
			{
				$atestasi = $atestasi->where('ate.tanggal_atestasi', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$atestasi = $atestasi->where('ate.tanggal_atestasi', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
		if($id_jenis_atestasi != -1)
		{
			$atestasi = $atestasi->where('ate.id_jenis_atestasi', '=', $id_jenis_atestasi);
		}
		if($nama_gereja_lama != "")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_lama', 'LIKE', '%'.$nama_gereja_lama.'%');
		}
		if($nama_gereja_baru != "")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_baru', 'LIKE', '%'.$nama_gereja_baru.'%');
		}
		
		// $atestasi = $atestasi->get( array(
			// 'ate.id AS id', 
			// 'ate.no_atestasi AS no_atestasi',
			// 'ate.tanggal_atestasi AS tanggal_atestasi',
			// 'ate.id_atestasi_baru AS id_atestasi_baru',
			// 'ate.id_gereja_lama AS id_gereja_lama',
			// 'ate.id_gereja_baru AS id_gereja_baru',
			// 'ate.nama_gereja_lama AS nama_gereja_lama',
			// 'ate.nama_gereja_baru AS nama_gereja_baru',
			// 'ate.id_jenis_atestasi AS id_jenis_atestasi',
			// 'ang.nama_depan AS nama_depan_anggota',
			// 'ang.nama_tengah AS nama_tengah_anggota',
			// 'ang.nama_belakang AS nama_belakang_anggota'
		// ));
		
		$atestasi = $atestasi->get();
		
		if(count($atestasi) == 0)
		{
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $atestasi);			
			return json_encode($respond);
			// return $atestasi;
		}		
	}
	
	public function search_pernikahan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$no_pernikahan = $input->{'no_pernikahan'};
		$tanggal_awal = $input->{'tanggal_awal'};
		$tanggal_akhir = $input->{'tanggal_akhir'};
		$id_pendeta = $input->{'id_pendeta'};
		$nama_pria = $input->{'nama_pria'};
		$nama_wanita = $input->{'nama_wanita'};
		
		$pernikahan = DB::table('pernikahan AS per');		
		$pernikahan = $pernikahan->where('per.id_gereja', '=', Auth::user()->id_gereja)->where('per.deleted', '=', 0);
		
		if($no_pernikahan != "")
		{
			$pernikahan = $pernikahan->where('per.no_pernikahan', 'LIKE', '%'.$no_pernikahan.'%');
		}		
		//validation range tanggal
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$pernikahan = $pernikahan->where('per.tanggal_pernikahan', '>=', $tanggal_awal);
				$pernikahan = $pernikahan->where('per.tanggal_pernikahan', '<=', $tanggal_akhir);
			}
			else
			{
				$pernikahan = $pernikahan->where('per.tanggal_pernikahan', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$pernikahan = $pernikahan->where('per.tanggal_pernikahan', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}		
		if($id_pendeta != -1)
		{			
			$pernikahan = $pernikahan->where('per.id_pendeta', '=', $id_pendeta);
			
			// $pernikahan = $pernikahan->join('anggota AS ang', 'per.id_pendeta', '=', 'ang.id');			
			// $pernikahan = $pernikahan->where('ang.role', '=', 2); //role pendeta
			// $pernikahan = $pernikahan->where('ang.nama_depan', 'LIKE', '%'.$nama_pendeta.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama_pendeta.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama_pendeta.'%');
		}		
		if($nama_wanita != "")
		{						
			$pernikahan = $pernikahan->where('per.nama_wanita', 'LIKE', '%'.$nama_wanita.'%');								
		}		
		if($nama_pria != "")
		{						
			$pernikahan = $pernikahan->where('per.nama_pria', 'LIKE', '%'.$nama_pria.'%');								
		}		
		
		$pernikahan = $pernikahan->get();
		
		if(count($pernikahan) == 0)
		{
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $pernikahan);			
			return json_encode($respond);
			// return $pernikahan;
		}				
	}
	
	public function search_kedukaan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$no_kedukaan = $input->{'no_kedukaan'};
		$nama_jemaat = $input->{'nama_jemaat'};
		$tanggal_awal = $input->{'tanggal_awal'};
		$tanggal_akhir = $input->{'tanggal_akhir'};
		
		$kedukaan = DB::table('anggota AS ang')->where('ang.deleted', '=', 0);
		
		$kedukaan = $kedukaan->join('kedukaan AS ked', 'ang.id', '=', 'ked.id_jemaat')->where('ked.deleted', '=', 0);
		
		$kedukaan = $kedukaan->where('ked.id_gereja', '=', Auth::user()->id_gereja);
		
		// $kedukaan = DB::table('kedukaan AS ked');
		// $kedukaan = $kedukaan->where('ked.id_gereja', '=', Auth::user()->id_gereja);
		// $kedukaan = $kedukaan->join('anggota AS ang', 'ked.id_jemaat', '=', 'ang.id');
		
		if($no_kedukaan != "")
		{
			$kedukaan = $kedukaan->where('ked.no_kedukaan', 'LIKE', '%'.$no_kedukaan.'%');
		}
		if($nama_jemaat != "")
		{			
			// $kedukaan = $kedukaan->where('ang.nama_depan', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama_jemaat.'%');
			$kedukaan = $kedukaan->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');				
		}
		//validation range tanggal
		if($tanggal_awal != "")
		{
			if($tanggal_akhir != "")
			{
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '>=', $tanggal_awal);
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '<=', $tanggal_akhir);
			}
			else
			{
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "")
			{				
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}				
		
		// $kedukaan = $kedukaan->get( array(
			// 'ked.id AS id', 
			// 'ked.no_kedukaan AS no_kedukaan',
			// 'ked.id_gereja AS id_gereja',
			// 'ked.id_jemaat AS id_jemaat',
			// 'ked.keterangan AS keterangan',
			// 'ang.tanggal_meninggal AS tanggal_meninggal',
			// 'ang.nama_depan AS nama_depan_anggota',
			// 'ang.nama_tengah AS nama_tengah_anggota',
			// 'ang.nama_belakang AS nama_belakang_anggota'
		// ));
		
		$kedukaan = $kedukaan->get();
		
		if(count($kedukaan) == 0)
		{
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
			// return "no result";
		}
		else
		{
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $kedukaan);			
			return json_encode($respond);
			// return $kedukaan;
		}				
	}
	
	public function search_dkh()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$no_dkh = $input->{'no_dkh'};
		$nama_jemaat = $input->{'nama_jemaat'};
		
		$dkh = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('id_gereja', '=', Auth::user()->id_gereja)->where('ang.role', '=', 1); //role hanya jemaat
		
		$dkh = $dkh->join('dkh AS dkh', 'ang.id', '=', 'dkh.id_jemaat')->where('dkh.deleted', '=', 0);
		
		// $dkh = DB::table('dkh AS dkh');
		
		if($no_dkh != "")
		{
			$dkh = $dkh->where('dkh.no_dkh', 'LIKE', '%'.$no_dkh.'%');
		}
		
		// $dkh = $dkh->join('anggota AS ang', 'dkh.id_jemaat', '=', 'ang.id');
		// $dkh = $dkh->where('ang.role', '=', 1); // role jemaat
		// $dkh = $dkh->where('ang.id_gereja', '=', Auth::user()->id_gereja);
		
		if($nama_jemaat != "")
		{						
			// $dkh = $dkh->where('ang.nama_depan', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama_jemaat.'%')
								// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama_jemaat.'%');
			$dkh = $dkh->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}
		
		// $dkh = $dkh->get( array(
			// 'dkh.id AS id', 
			// 'dkh.no_dkh AS no_dkh',
			// 'dkh.id_jemaat AS id_jemaat',
			// 'dkh.keterangan AS keterangan',
			// 'dkh.created_at AS created_at', 
			// 'dkh.updated_at AS updated_at',
			// 'ang.nama_depan AS nama_depan_jemaat',			
			// 'ang.nama_tengah AS nama_tengah_jemaat',
			// 'ang.nama_belakang AS nama_belakang_jemaat'			
		// ));
		
		$dkh = $dkh->get();
		
		if(count($dkh) == 0)
		{
			// return "no result";
			$respond = array('code' => '404', 'status' => 'Not Found', 'messages' => 'Data yang dicari tidak ditemukan.');
			return json_encode($respond);
		}
		else
		{	
			$respond = array('code' => '200', 'status' => 'OK', 'messages' => $dkh);			
			return json_encode($respond);
			// return $dkh;
		}		
		
		// return null;
	}
	
	/*--------------------------------POST UPDATE----------------------------------------*/	
	
	public function edit_kebaktian()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');							
		
		$id = $input->{'id'};
		$id_persembahan = $input->{'id_persembahan'};		
		
		$data_valid = array(			
			'nama_pendeta' => $input->{'nama_pendeta'},			
			'nama_jenis_kegiatan' => $input->{'nama_jenis_kegiatan'},
			'tanggal_mulai' => $input->{'tanggal_mulai'},
			'tanggal_selesai' => $input->{'tanggal_selesai'},
			'jam_mulai' => $input->{'jam_mulai'},
			'jam_selesai' => $input->{'jam_selesai'},
			'banyak_jemaat' => $input->{'banyak_jemaat'},
			'banyak_simpatisan' => $input->{'banyak_simpatisan'},
			'banyak_penatua' => $input->{'banyak_penatua'},
			'banyak_pemusik' => $input->{'banyak_pemusik'},
			'banyak_komisi' => $input->{'banyak_komisi'}
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, Kegiatan::$rules); 								

		if ($validator->fails())
		{
			// $respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			// return Response::json($respond);
			// return "validator";
			// return $validator->messages();
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
		if($input->{'jumlah_persembahan'} == '')
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Jumlah persembahan harus diisi.";
		}
				
		$kebaktian = Kegiatan::find($id);

		if($kebaktian == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";		
		}
		else
		{		
		
			if($input->{'id_jenis_kegiatan'} == '')
			{
				$kebaktian->id_jenis_kegiatan = null;
			}
			else
			{
				$kebaktian->id_jenis_kegiatan = $input->{'id_jenis_kegiatan'};
			}
			$kebaktian->nama_jenis_kegiatan = $input->{'nama_jenis_kegiatan'};
			if($input->{'id_pendeta'} == '')
			{
				$kebaktian->id_pendeta = null;
			}
			else
			{
				$kebaktian->id_pendeta = $input->{'id_pendeta'};
			}		
			$kebaktian->nama_pendeta = $input->{'nama_pendeta'};				
			$kebaktian->tanggal_mulai = $input->{'tanggal_mulai'};
			$kebaktian->tanggal_selesai = $input->{'tanggal_selesai'};
			$kebaktian->jam_mulai = $input->{'jam_mulai'};
			$kebaktian->jam_selesai = $input->{'jam_selesai'};
			$kebaktian->banyak_jemaat_pria = $input->{'banyak_jemaat_pria'};
			$kebaktian->banyak_jemaat_wanita = $input->{'banyak_jemaat_wanita'};
			$kebaktian->banyak_jemaat = $input->{'banyak_jemaat'};
			$kebaktian->banyak_simpatisan_pria = $input->{'banyak_simpatisan_pria'};
			$kebaktian->banyak_simpatisan_wanita = $input->{'banyak_simpatisan_wanita'};
			$kebaktian->banyak_simpatisan = $input->{'banyak_simpatisan'};
			$kebaktian->banyak_penatua_pria = $input->{'banyak_penatua_pria'};
			$kebaktian->banyak_penatua_wanita = $input->{'banyak_penatua_wanita'};
			$kebaktian->banyak_penatua = $input->{'banyak_penatua'};
			$kebaktian->banyak_komisi_pria = $input->{'banyak_komisi_pria'};
			$kebaktian->banyak_komisi_wanita = $input->{'banyak_komisi_wanita'};
			$kebaktian->banyak_komisi = $input->{'banyak_komisi'};
			$kebaktian->banyak_pemusik_pria = $input->{'banyak_pemusik_pria'};
			$kebaktian->banyak_pemusik_wanita = $input->{'banyak_pemusik_wanita'};
			$kebaktian->banyak_pemusik = $input->{'banyak_pemusik'};		
			// $kebaktian->id_gereja = $input->{'id_gereja'};
			$kebaktian->id_gereja = Auth::user()->id_gereja;		
			$kebaktian->keterangan = $input->{'keterangan'};					
			
			try{
				$kebaktian->save();
				
				try{
					// $persembahan = new Persembahan();
					$persembahan = Persembahan::find($id_persembahan);
					
					// $persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
					$persembahan->jumlah_persembahan = $input->{'jumlah_persembahan'};
					// $persembahan->id_kegiatan = $kebaktian->id;
					// $persembahan->jenis = 1;
					
					$persembahan->save();
					
					// $respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.');
					
					
					$data = $kebaktian->toArray();
					$data['id_persembahan'] = $persembahan->id;
					$data['jumlah_persembahan'] = $persembahan->jumlah_persembahan;										
					$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);						
					
					return json_encode($respond);
					// return "berhasil";
				}catch(Exception $e){				
					// return $e->getMessage();
					$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
					return json_encode($respond);
					// return "Gagal menyimpan perubahan.";
				}
							
			}catch(Exception $e){
				// return $e->getMessage();
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
				// return "Gagal menyimpan perubahan.";
			}
		}	
	}
	
	public function edit_anggota()
	{
		$data_valid = array(
			'nama_depan' => Input::get('nama_depan'),
			'telp' => Input::get('telp'),
			'gender' => Input::get('gender'),
			'gol_darah' => Input::get('gol_darah'),
			'pekerjaan' => Input::get('pekerjaan'),
			'kota_lahir' => Input::get('kota_lahir'),
			'tanggal_lahir' => Input::get('tanggal_lahir'), 
			'role' => Input::get('role')
		);
		
		//validate anggota
		$validator = Validator::make($data = $data_valid, Anggota::$rules);
		
		if($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
		
		$data_valid = array(
			'jalan' => Input::get('jalan'),
			'kota' => Input::get('kota')			
		);
		
		//validate alamat
		$validator = Validator::make($data = $data_valid, Alamat::$rules);
		
		if($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
	
		// $anggota = new Anggota();
		
		$anggota = Anggota::find(Input::get('id'));
		
		if($anggota == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";
		}		
		
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
		// $anggota->id_gereja = Auth::user()->id_gereja;
		$anggota->role = Input::get('role');
		
		// $anggota->id_atestasi = null;
		
		try{
			$anggota->save();
			
			//save no hp
			// $ctHp = 0;			
			$temp_arr_hp = Input::get('arr_hp');
			if($temp_arr_hp == "kosong")
			{
				$hp = Hp::where('id_anggota', '=', Input::get('id'))->where('deleted', '=', 0)->get();
				$length_hp = count($hp);
				
				$hp[0]->no_hp = "";								
				$hp[0]->save();
				for($i = 1; $i < $length_hp; $i++)
				{
					try{						
						$hp[$i]->deleted = 1;
						$hp[$i]->save();
					}catch(Exception $e){
						$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
						return json_encode($respond);									
					}	
				}
			}	
			// if($temp_arr_hp != "") //kalo ada input hp			
			else
			{				
				$hp = Hp::where('id_anggota', '=', Input::get('id'))->where('deleted', '=', 0)->get();
				$length_hp = count($hp);
				
				$arr_hp = explode(",", $temp_arr_hp);
				$length_arr_hp = count($arr_hp);
												
				if($length_hp == $length_arr_hp)
				{
					$idx = 0;
					foreach($hp as $row_hp)
					{
						$row_hp->no_hp = $arr_hp[$idx];
						try{
							$row_hp->save();
						}catch(Exception $e){
							$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
							return json_encode($respond);
				
							//do nothing
							// return "Gagal menyimpan data anggota.";
						}	
						$idx++;						
					}
				}
				else if($length_hp < $length_arr_hp) 	//brrt no_hp nambah banyak
				{
					$idx = 0;
					foreach($hp as $row_hp)
					{
						$row_hp->no_hp = $arr_hp[$idx];						
						try{
							$row_hp->save();
						}catch(Exception $e){
							$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
							return json_encode($respond);
				
							//do nothing
							// return "Gagal menyimpan data anggota.";
						}	
						$idx++;						
					}
					//add new hp
					for($i = $idx; $i < $length_arr_hp; $i++)
					{
						$newhp = new Hp();
						$newhp->no_hp = $arr_hp[$i];
						$newhp->id_anggota = Input::get('id');
						try{
							$newhp->save();						
						}catch(Exception $e){
							$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
							return json_encode($respond);
				
							//do nothing
							// return "Gagal menyimpan data anggota.";
						}						
					}
				}
				else if($length_hp > $length_arr_hp)	//brrt ada yang didelete
				{
					$idx = 0;
					for($j = $idx; $j < $length_arr_hp; $j++)
					{
						$hp[$j]->no_hp = $arr_hp[$idx];						
						try{
							$hp[$j]->save();
						}catch(Exception $e){
							$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
							return json_encode($respond);
				
							//do nothing
							// return "Gagal menyimpan data anggota.";
						}	
						$idx++;						
					}
					//delete hp
					for($i = $idx; $i < $length_hp; $i++)
					{
						// $hp = new Hp();
						// $hp->no_hp = $arr_hp[$i];
						// $hp->id_anggota = Input::get('id');
						try{
							// $hp[$i]->delete();						
							$hp[$i]->deleted = 1;
							$hp[$i]->save();
						}catch(Exception $e){
							$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
							return json_encode($respond);
				
							//do nothing
							// return "Gagal menyimpan data anggota.";
						}						
					}
				}
								
			}
			
			
			//save alamat
					// $alamat = new Alamat();
			$alamat = Alamat::where('id_anggota', '=', Input::get('id'))->first();
			
			$alamat->jalan = Input::get('jalan');
			$alamat->kota = Input::get('kota');
			$alamat->kodepos = Input::get('kodepos');
			// $alamat->id_anggota = $anggota->id;
			try{
				$alamat->save();
			}catch(Exception $e){
				//delete anggota
				// $anggota->delete();
				
				//delete hp sebelumnya
				// for($i = 0; $i < $ctHp ; $i++)
				// {
					// $delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
					// $delHp->delete();
				// }
			
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
				// return $e->getMessage();
				// return "Gagal menyimpan data anggota.";
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
						// $anggota->delete();
						
						//delete hp sebelumnya
						// for($i = 0; $i < $ctHp ; $i++)
						// {
							// $delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							// $delHp->delete();
						// }
						
						//delete alamat
						// $alamat->delete();
						
						$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
						return json_encode($respond);
						
						// return "Gagal menyimpan data anggota.";
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
						// $anggota->delete();
						
						//delete hp sebelumnya
						// for($i = 0; $i < $ctHp ; $i++)
						// {
							// $delHp = DB::table('hp')->orderBy('created_at', 'desc')->first();
							// $delHp->delete();
						// }
						
						//delete alamat
						// $alamat->delete();
						
						$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
						return json_encode($respond);
						// return "Gagal menyimpan data anggota.";
					}					
				}
			}			
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
				
			// return $e->getMessage();				
			// return "Gagal menyimpan data anggota.";
		}		
		
		//DATA
		$data = $anggota->toArray();
		//add alamat
			$data['jalan'] = $alamat->jalan;
			$data['kota'] = $alamat->kota;
			$data['kodepos'] = $alamat->kodepos;
			$data['id_anggota'] = $alamat->id_anggota;
		//add hp									
			$hp = Hp::where('id_anggota', '=', $anggota->id)->where('deleted', '=', 0)->get();
			
			$arr_hp = array();
			foreach($hp as $each_hp)
			{
				$arr_hp[] = $each_hp->no_hp;
			}			
			//add to anggota
			if(count($hp) == 0)
			{
				$anggota->arr_hp = "";
			}
			else
			{
				$anggota->arr_hp = $arr_hp;
			}
			$data['arr_hp'] = $arr_hp;
		
		/*$anggota = $anggota->join('alamat AS alm', 'ang.id', '=', 'alm.id_anggota');
		
		//add hp									
			$hp = Hp::where('id_anggota', '=', Input::get('id'))->where('deleted', '=', 0)->get();
			
			$arr_hp = array();
			foreach($hp as $each_hp)
			{
				$arr_hp[] = $each_hp->no_hp;
			}			
			//add to anggota
			if(count($hp) == 0)
			{
				$anggota->arr_hp = "";
			}
			else
			{
				$anggota->arr_hp = $arr_hp;
			}	
			*/
			
			
		$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);
		return json_encode($respond);
		// return "berhasil";	
	}
	
	public function edit_baptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$id = $input->{'id'};		
		
		$data_valid = array(
			'no_baptis' => $input->{'no_baptis'},
			'id_jemaat' => $input->{'id_jemaat'},
			'id_pendeta' => $input->{'id_pendeta'},
			'tanggal_baptis' => $input->{'tanggal_baptis'},
			'id_jenis_baptis' => $input->{'id_jenis_baptis'},
			'id_gereja' => Auth::user()->id_gereja
		);
		
		//validate
		$validator = Validator::make($data = $data_valid, Baptis::$rules);
		
		if($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
		
		$baptis = Baptis::find($id);
		
		if($baptis == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";
		}
		else
		{				
			$baptis->no_baptis = $input->{'no_baptis'};				
			$baptis->id_jemaat = $input->{'id_jemaat'};
			$baptis->id_pendeta = $input->{'id_pendeta'};
			$baptis->tanggal_baptis = $input->{'tanggal_baptis'};
			$baptis->id_jenis_baptis = $input->{'id_jenis_baptis'};
			// $baptis->id_gereja = $input->{'id_gereja'};
			$baptis->id_gereja = Auth::user()->id_gereja;
			$baptis->keterangan = $input->{'keterangan'};
			try{
				$baptis->save();
				
				$data = $baptis->toArray();
				$anggota = Anggota::find($baptis->id_jemaat);	
				$data['nama_jemaat'] = $anggota->nama_depan.' '.$anggota->nama_tengah.' '.$anggota->nama_belakang;
				$data['nama_jenis_baptis'] = JenisBaptis::where('id', '=', $baptis->id_jenis_baptis)->first()->nama_jenis_baptis;					
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);
				return json_encode($respond);
				// return "berhasil";
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
				// return $e->getMessage();
				// return "Gagal menyimpan perubahan.";
			}		
		}	
	}
	
	public function edit_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		$id = $input->{'id'};
		
		// $input = Input::get('data');
		
		$data_valid = array(
			'no_atestasi' => $input->{'no_atestasi'},			
			'tanggal_atestasi' => $input->{'tanggal_atestasi'},			
			'nama_gereja_lama' => $input->{'nama_gereja_lama'},
			'nama_gereja_baru' => $input->{'nama_gereja_baru'},
			'id_jenis_atestasi' => $input->{'id_jenis_atestasi'},
			'id_anggota' => $input->{'id_anggota'}
		);				
		
		//validate
		$validator = Validator::make($data = $data_valid, Atestasi::$rules); 
		
		if ($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}	
		
		$atestasi = Atestasi::find($id);
		
		if($atestasi == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
		}
		else
		{
				
			$atestasi->no_atestasi = $input->{'no_atestasi'};
			$atestasi->tanggal_atestasi = $input->{'tanggal_atestasi'};
			$atestasi->id_jenis_atestasi = $input->{'id_jenis_atestasi'};		
			$atestasi->nama_gereja_lama = $input->{'nama_gereja_lama'};
			$atestasi->nama_gereja_baru = $input->{'nama_gereja_baru'};
			$atestasi->id_anggota = $input->{'id_anggota'};		
			$atestasi->keterangan = $input->{'keterangan'};
			$atestasi->deleted = 0;
			if($input->{'id_gereja_lama'} == '')
			{
				$atestasi->id_gereja_lama = null;
			}
			else
			{
				$atestasi->id_gereja_lama = $input->{'id_gereja_lama'};
			}
			if($input->{'id_gereja_baru'} == '')
			{
				$atestasi->id_gereja_baru = null;
			}
			else
			{
				$atestasi->id_gereja_baru = $input->{'id_gereja_baru'};
			}				
			
			try{
				$atestasi->save();	
				
				$data = $atestasi->toArray();
				$anggota = Anggota::find($atestasi->id_anggota);	
				$data['nama_anggota'] = $anggota->nama_depan.' '.$anggota->nama_tengah.' '.$anggota->nama_belakang;
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);
				return json_encode($respond);
			}catch(Exception $e){
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
				// return "Gagal menyimpan data atestasi.";
			}
		}
	}
	
	public function edit_pernikahan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$id = $input->{'id'};
		
		$data_valid = array(
			'no_pernikahan' => $input->{'no_pernikahan'},			
			'tanggal_pernikahan' => $input->{'tanggal_pernikahan'},
			'id_pendeta' => $input->{'id_pendeta'},
			'nama_pria' => $input->{'nama_pria'},
			'nama_wanita' => $input->{'nama_wanita'}
		);				
		
		//validate
		$validator = Validator::make($data = $data_valid, Pernikahan::$rules); 
		
		if ($validator->fails())
		{			
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}		
		
		$pernikahan = Pernikahan::find($id);
		
		if($pernikahan == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";
		}
		else
		{	
			$pernikahan->no_pernikahan = $input->{'no_pernikahan'};
			$pernikahan->tanggal_pernikahan = $input->{'tanggal_pernikahan'};
			$pernikahan->id_pendeta = $input->{'id_pendeta'};			
			// $pernikahan->id_gereja = Auth::user()->id_gereja;
			$pernikahan->nama_pria = $input->{'nama_pria'};
			$pernikahan->nama_wanita = $input->{'nama_wanita'};
			if($input->{'id_jemaat_wanita'} == '')
			{
				$pernikahan->id_jemaat_wanita = null;
			}
			else
			{
				$pernikahan->id_jemaat_wanita = $input->{'id_jemaat_wanita'};
			}
			if($input->{'id_jemaat_pria'} == '')
			{
				$pernikahan->id_jemaat_pria = null;
			}
			else
			{
				$pernikahan->id_jemaat_pria = $input->{'id_jemaat_pria'};
			}
			$pernikahan->keterangan = $input->{'keterangan'};
			try{
				$pernikahan->save();
				
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $pernikahan->toArray());
				return json_encode($respond);
				// return "berhasil";
			}catch(Exception $e){
				// return $e->getMessage();
				// return "Gagal menyimpan perubahan.";
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
			}
		}	
	}
	
	public function edit_kedukaan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$id = $input->{'id'};
				
		//validate
		if($input->{'tanggal_meninggal'} == '' ||
			$input->{'no_kedukaan'} == '' )
		{	
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
		
		$duka = Kedukaan::find($id);
		
		if($duka == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";
		}
		else
		{
			$duka->no_kedukaan = $input->{'no_kedukaan'};								
			$duka->keterangan = $input->{'keterangan'};
			
			try{
				$duka->save();
				
				//save tanggal_meninggal anggota
				$anggota = Anggota::find($duka->id_jemaat);
				if(count($anggota) != 0)
				{					
					$anggota->tanggal_meninggal = $input->{'tanggal_meninggal'};
					try{
						$anggota->save();
						
						$data = $duka->toArray();
						$data['tanggal_meninggal'] = $anggota->tanggal_meninggal;
						
						$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);
						return json_encode($respond);
						// return "berhasil";
					}catch(Exception $e){
						//delete duka
						// $duka->delete();
						
						// return $e->getMessage();
						$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
						return json_encode($respond);
						// return "Gagal menyimpan perubahan.";
					}
				}
				else
				{
					$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
					return json_encode($respond);
					// return "Gagal menyimpan perubahan.";
				}							
			}catch(Exception $e){
				// return $e->getMessage();
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
				// return "Gagal menyimpan perubahan.";
			}
		}								
	}
	
	public function edit_dkh()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');
		
		$id = $input->{'id'};		
		
		/*$data_valid = array(
			'no_dkh' => $input->{'no_dkh'},
			// 'id_jemaat' => $input->{'id_jemaat'},
			'keterangan' => $input->{'keterangan'}			
		);*/
		
		//validate
		// $validator = Validator::make($data = $data_valid, Dkh::$rules);
		
		/*if($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}*/
		if($input->{'no_dkh'} == '' || $input->{'keterangan'} == '')
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => 'Bagian yang bertanda (*) harus diisi.');
			return json_encode($respond);
			// return "Bagian yang bertanda (*) harus diisi.";
		}
		
		$dkh = Dkh::find($id);
		
		if($dkh == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
			return json_encode($respond);
			// return "Gagal menyimpan perubahan.";
		}
		else
		{				
			$dkh->no_dkh = $input->{'no_dkh'};				
			// $dkh->id_jemaat = $input->{'id_jemaat'};
			$dkh->keterangan = $input->{'keterangan'};			
			
			try{
				$dkh->save();								
						
				$data = $dkh->toArray();
				$anggota = Anggota::find($dkh->id_jemaat);
				$data['nama_anggota'] = $anggota['nama_depan'].' '.$anggota['nama_tengah'].' '.$anggota['nama_belakang'];
						
				$respond = array('code' => '200', 'status' => 'OK', 'messages' => 'Berhasil menyimpan perubahan.', 'data' => $data);
				return json_encode($respond);					
				// return "berhasil";
			}catch(Exception $e){
				// return $e->getMessage();
				// return "Gagal menyimpan perubahan.";
				$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menyimpan perubahan.');
				return json_encode($respond);
			}		
		}	
	}
	
	/*--------------------------------DELETE----------------------------------------*/	
	
	public function delete_kebaktian()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
				
		// $input = Input::get('data');
		
		$id = $input->{'id'};		
		
		$kebaktian = Kegiatan::find($id);
		
		$persembahan = Persembahan::where('id_kegiatan', '=', $id)->first();	
				
		try{
			//GANTI JADI TUMBSTONE
			// $persembahan->delete();			
			// $kebaktian->delete();
			
			$persembahan->deleted = 1;
			$persembahan->save();
			$kebaktian->deleted = 1;
			$kebaktian->save();			
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			// return "Tidak berhasil menghapus data.";
		}					
	}
	
	public function delete_anggota()
	{
		//Note : untuk foto anggota dan rekap atestasinya tidak dihapus
		
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$anggota = Anggota::find($id);
		
		$alamat = Alamat::where('id_anggota', '=', $id)->first();
		
		$hp = Hp::where('id_anggota', '=', $id)->get(); //bisa ga ada				
		
		if($anggota == null)
		{
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			// return "Tidak berhasil menghapus data.";
		}				
		
		try{
			//delete hp
			if(count($hp) != 0)
			{
				foreach($hp as $key)
				{
					// $key->delete();
					$key->deleted = 1;
					$key->save();
				}
			}			
		
			//delete alamat
			// $alamat->delete();
			$alamat->deleted = 1;
			$alamat->save();
			
			//delete anggota
			// $anggota->delete();			
			$anggota->deleted = 1;
			$anggota->save();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			// return "Tidak berhasil menghapus data.";
		}
	}
	
	public function delete_baptis()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$baptis = Baptis::find($id);
		
		try{
			$baptis->deleted = 1;
			$baptis->save();
			// $baptis->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			
			// return "Tidak berhasil menghapus data.";
		}
	}
	
	public function delete_atestasi()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$atestasi = Atestasi::find($id);
		
		try{
			$atestasi->deleted = 1;
			$atestasi->save();
			// $atestasi->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			
			// return "Tidak berhasil menghapus data.";
		}
	}
	
	public function delete_pernikahan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$pernikahan = Pernikahan::find($id);
		
		try{
			// $pernikahan->delete();
			$pernikahan->deleted = 1;
			$pernikahan->save();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			// return "Tidak berhasil menghapus data.";
		}
	}
	
	public function delete_kedukaan()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
	
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$duka = Kedukaan::find($id);
		
		try{
			//set null tanggal_meninggal di table anggota
			$anggota = Anggota::find($duka->id_jemaat);
			// $anggota->tanggal_meninggal = null;
			$anggota->save();
			
			// $duka->delete();
			$duka->deleted = 1;
			$duka->save();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			// return "Tidak berhasil menghapus data.";
		}
	}
	
	public function delete_dkh()
	{
		$json_data = Input::get('json_data');
		$input = json_decode($json_data);
		
		// $input = Input::get('data');				
		
		$id = $input->{'id'};
		
		$dkh = Dkh::find($id);
		
		try{
			$dkh->deleted = 1;
			$dkh->save();
			// $dkh->delete();
			
			$respond = array('code' => '204', 'status' => 'No Content', 'messages' => 'Berhasil menghapus data.');
			return json_encode($respond);
			// return "berhasil";
		}catch(Exception $e){
			$respond = array('code' => '500', 'status' => 'Internal Server Error', 'messages' => 'Gagal menghapus data.');
			return json_encode($respond);
			
			// return "Tidak berhasil menghapus data.";
		}
	}

}

?>