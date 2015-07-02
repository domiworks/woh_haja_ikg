<?php

use Carbon\Carbon;

class ExportFilteredController extends BaseController {


// --------------------------------------------------------- USER ---------------------------------------------------------

	public function export_filtered_kegiatan( 
		$nama_kebaktian, $nama_pendeta, $tanggal_awal, $tanggal_akhir,
		$jam_awal, $jam_akhir, $batas_bawah_hadir_jemaat, $batas_atas_hadir_jemaat,
		$batas_bawah_hadir_simpatisan, $batas_atas_hadir_simpatisan, $batas_bawah_hadir_penatua, $batas_atas_hadir_penatua, 
		$batas_bawah_hadir_pemusik, $batas_atas_hadir_pemusik, $batas_bawah_hadir_komisi, $batas_atas_hadir_komisi)	
	{			

		$kebaktian = DB::table('kegiatan AS keg')->where('keg.deleted', '=', 0)->where('id_gereja', '=', Auth::user()->id_gereja);		
		
		if($nama_kebaktian != "none")
		{	
			$kebaktian = $kebaktian->where('keg.nama_jenis_kegiatan', 'LIKE', '%'.$nama_kebaktian.'%');
		}		
		if($nama_pendeta != "none")
		{			
			$kebaktian = $kebaktian->where('keg.nama_pendeta', 'LIKE', '%'.$nama_pendeta.'%');
		}
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$kebaktian = $kebaktian->where('keg.tanggal_selesai', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
		//validation range jam
		if($jam_awal != "none")
		{
			if($jam_akhir != "none")
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
			if($jam_akhir != "none")
			{				
				$kebaktian = $kebaktian->where('keg.jam_selesai', '<=', $jam_akhir);
			}
			else
			{
				//ga ada jam awal dan akhir
			}
		}
		//validation range banyak jemaat
		if($batas_bawah_hadir_jemaat != "none")
		{
			if($batas_atas_hadir_jemaat != "none")
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
			if($batas_atas_hadir_jemaat != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '<=', $batas_atas_hadir_jemaat);
			}
			else
			{
				//ga ada batas kehadiran jemaat
			}
		}
		//validation range banyak simpatisan
		if($batas_bawah_hadir_simpatisan != "none")
		{
			if($batas_atas_hadir_simpatisan != "none")
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
			if($batas_atas_hadir_simpatisan != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '<=', $batas_atas_hadir_simpatisan);
			}
			else
			{
				//ga ada batas kehadiran simpatisan
			}
		}		
		//validation range banyak penatua
		if($batas_bawah_hadir_penatua != "none")
		{
			if($batas_atas_hadir_penatua != "none")
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
			if($batas_atas_hadir_penatua != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '<=', $batas_atas_hadir_penatua);
			}
			else
			{
				//ga ada batas kehadiran penatua
			}
		}
		//validation range banyak pemusik
		if($batas_bawah_hadir_pemusik != "none")
		{
			if($batas_atas_hadir_pemusik != "none")
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
			if($batas_atas_hadir_pemusik != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '<=', $batas_atas_hadir_pemusik);
			}
			else
			{
				//ga ada batas kehadiran pemusik
			}
		}
		//validation range banyak komisi
		if($batas_bawah_hadir_komisi != "none")
		{
			if($batas_atas_hadir_komisi != "none")
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
			if($batas_atas_hadir_komisi != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '<=', $batas_atas_hadir_komisi);
			}
			else
			{
				//ga ada batas kehadiran komisi
			}
		}
		
		$data = $kebaktian->orderBy('keg.tanggal_mulai')->get();

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','Tanggal','Nama Kebaktian','Jam Mulai','Jam Selesai', 'Nama Pengkhotbah',
			'Jemaat Pria','Jemaat Wanita','Total Jemaat',
			'Simpatisan Pria','Simpatisan Wanita','Total Simpatisan',
			'Penatua Pria','Penatua Wanita','Total Penatua',
			'Pemusik Pria','Pemusik Wanita','Total Pemusik',
			'Komisi Pria','Komisi Wanita','Total Komisi'			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Kebaktian', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE KEBAKTIAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{					
						$each_data = array(
							$no, //1 no
							$row_data->tanggal_mulai, //2 tanggal_mulai
							$row_data->nama_jenis_kegiatan, //3 nama_jenis_kegiatan
							$row_data->jam_mulai, //4 jam_mulai
							$row_data->jam_selesai, //5 jam_selesai							
							$row_data->nama_pendeta, //6 nama_pendeta							
							$row_data->banyak_jemaat_pria, //7 banyak_jemaat_pria
							$row_data->banyak_jemaat_wanita, //8 banyak_jemaat_wanita
							$row_data->banyak_jemaat, //9 banyak_jemaat						
							$row_data->banyak_simpatisan_pria, //10 banyak_simpatisan_pria
							$row_data->banyak_simpatisan_wanita, //11 banyak_simpatisan_wanita
							$row_data->banyak_simpatisan, //12 banyak_simpatisan						
							$row_data->banyak_penatua_pria, //13 banyak_penatua_pria
							$row_data->banyak_penatua_wanita, //14 banyak_penatua_wanita
							$row_data->banyak_penatua, //15 banyak_penatua						
							$row_data->banyak_pemusik_pria, //16 banyak_pemusik_pria
							$row_data->banyak_pemusik_wanita, //17 banyak_pemusik_wanita
							$row_data->banyak_pemusik, //18 banyak_pemusik						
							$row_data->banyak_komisi_pria, //19 banyak_komisi_pria
							$row_data->banyak_komisi_wanita, //20 banyak_komisi_wanita
							$row_data->banyak_komisi, //21 banyak_komisi						
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);										
						
						$sheet->cells('A1:U1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:U'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}	

	public function export_filtered_anggota( 
		$nomor_anggota,
		$nama,
		$tanggal_awal,
		$tanggal_akhir,
		$kota,
		$gender,
		$wilayah,
		$gol_darah,
		$pendidikan,
		$pekerjaan,
		$etnis,						
		$role)	
	{			

		$anggota = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);				
		$anggota = $anggota->join('alamat AS alm', 'ang.id', '=','alm.id_anggota'); //yg ini ngerubah 'id' jadi yg di 'alamat'				
							
		if($nomor_anggota != "none")
		{
			$anggota = $anggota->where('ang.no_anggota', 'LIKE', '%'.$nomor_anggota.'%');
		}
		if($kota != "none")
		{				
			$anggota = $anggota->where('alm.kota', 'LIKE', '%'.$kota.'%');
		}
		if($gender != "none") 
		{
			$anggota = $anggota->where('ang.gender', '=', $gender);
		}
		if($wilayah != "none")
		{
			$anggota = $anggota->where('ang.wilayah', '=', $wilayah);
		}
		if($gol_darah != "none")
		{
			$anggota = $anggota->where('ang.gol_darah', '=', $gol_darah);
		}
		if($pendidikan != "none")
		{
			$anggota = $anggota->where('ang.pendidikan', '=', $pendidikan);
		}
		if($pekerjaan != "none")
		{
			$anggota = $anggota->where('ang.pekerjaan', '=', $pekerjaan);
		}
		if($etnis != "none")
		{
			$anggota = $anggota->where('ang.etnis', '=', $etnis);
		}
		//validation range tanggal lahir
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$anggota = $anggota->where('ang.tanggal_lahir', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
	
		if($role != "none") 
		{
			$anggota = $anggota->where('ang.role', '=', $role);
		}
		if($nama != "none")
		{	
			$anggota = $anggota->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}
		
		$anggota = $anggota->orderBy('ang.nama_depan');
						
		$anggota = $anggota->get();				

		//add hp		
		foreach($anggota as $key)
		{									
			
			// $hp = Hp::where('id_anggota', '=', $key->id_anggota)->where('deleted', '=', 0)->get();
			$hp = Hp::where('id_anggota', '=', $key->id_anggota)->get();
			
			$arr_hp = "";
			$first = 0;			
			foreach($hp as $each_hp)
			{	
				if($first == 0){
					$arr_hp = $each_hp->no_hp;			
					$first = 1;
				}else
				{
					$arr_hp = $arr_hp.",".$each_hp->no_hp;	
				}								
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

		$data = $anggota;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Anggota','Nama Depan','Nama Tengah','Nama Belakang', 
			'Alamat', 'Kota', 'Kodepos', 'Telepon', 'HP', 
			'Jenis Kelamin', 'Wilayah', 'Gol_Darah', 'Pendidikan', 'Pekerjaan',
			'Etnis', 'Kota Lahir', 'Tanggal Lahir', 'Baptis', 'Status'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Anggota', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE ANGGOTA', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set gender
						$gender = ($row_data->gender == 0) ? "wanita" : "pria";
						//set baptis
						$baptis = "";
						if($row_data->status_anggota == 1){
							$baptis = "baptis";
						}else if($row_data->status_anggota == 2){
							$baptis = "sidi";
						}else{
							$baptis = "non-anggota";
						}
						//set role
						if($row_data->role == 1){
							$role = "jemaat";
						}else if($row_data->role == 2){
							$role = "pendeta";
						}else if($row_data->role == 3){
							$role = "penatua";
						}else if($row_data->role == 4){
							$role = "majelis";
						}

						$each_data = array(
							$no, //1 no
							$row_data->no_anggota, //2 no_anggota
							$row_data->nama_depan, //3 nama_depan
							$row_data->nama_tengah, //4 nama_tengah
							$row_data->nama_belakang, //5 nama_belakang							
							$row_data->jalan, //6 jalan							
							$row_data->kota, //7 kota
							$row_data->kodepos, //8 kodepos
							$row_data->telp, //9 telp						
							$row_data->arr_hp, //10 arr_hp
							$gender, //11 gender
							$row_data->wilayah, //12 wilayah						
							$row_data->gol_darah, //13 gol_darah
							$row_data->pendidikan, //14 pendidikan
							$row_data->pekerjaan, //15 pekerjaan						
							$row_data->etnis, //16 etnis
							$row_data->kota_lahir, //17 kota_lahir
							$row_data->tanggal_lahir, //18 tanggal_lahir						
							$baptis, //19 status_anggota
							$role //20 role							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
						
						$sheet->cells('A1:T1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:T'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}

	public function export_filtered_baptis( 
		$nomor_baptis,						
		$tanggal_awal,
		$tanggal_akhir,
		$id_pembaptis,
		$nama_jemaat,						
		$jenis_baptis)
	{					
		//set variable search
		$no_baptis = $nomor_baptis;								
		$id_jenis_baptis = $jenis_baptis;

		//query mulai dari anggota nyambung ke baptis
		$baptis = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->whereNotIn('ang.role', array(2));
		
		$baptis = $baptis->join('baptis AS bap', 'ang.id', '=', 'bap.id_jemaat')->where('bap.deleted', '=', 0);		
			
		$baptis = $baptis->where('bap.id_gereja', '=', Auth::user()->id_gereja);														
		if($no_baptis != "none")
		{
			$baptis = $baptis->where('bap.no_baptis', 'LIKE', '%'.$no_baptis.'%');
		}						
			
		if($nama_jemaat != "none")
		{															
			$baptis = $baptis->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}				
	
		if($id_pembaptis != -1)
		{
			$baptis = $baptis->where('bap.id_pendeta', '=', $id_pembaptis);
		}		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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

			$temp = Anggota::find($row->id_pendeta);
			$row->nama_pembaptis = $temp->nama_depan." ".$temp->nama_tengah." ".$temp->nama_belakang;
		}

		$data = $baptis;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Baptis','Pembaptis','Jemaat','Jenis_Baptis', 
			'Tanggal_Baptis', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Baptis', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE BAPTIS', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set nama jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_baptis, //2 no_baptis
							$row_data->nama_pembaptis, //3 pembaptis
							$jemaat, //4 jemaat
							$row_data->nama_jenis_baptis, //5 nama_jenis_baptis							
							$row_data->tanggal_baptis, //6 tanggal_baptis							
							$row_data->keterangan //7 keterangan							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);									
						
						$sheet->cells('A1:G1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:G'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}		

	public function export_filtered_atestasi(
		$no_atestasi,
		$nama_jemaat,
		$tanggal_awal,
		$tanggal_akhir,
		$id_jenis_atestasi,
		$nama_gereja_lama,						
		$nama_gereja_baru)
	{
		//set variable search		
		$nama = $nama_jemaat;				
		
		$atestasi = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);
		
		$atestasi = $atestasi->join('atestasi AS ate', 'ang.id', '=', 'ate.id_anggota')->where('ate.deleted', '=', 0);				
		
		//query ini supaya keluar urutan ascending per nama anggota
		$atestasi = $atestasi->orderBy('ang.nama_depan');				
		
		if($nama != "none")
		{							
			$atestasi = $atestasi->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}		
		
		if($no_atestasi != "none")
		{
			$atestasi = $atestasi->where('ate.no_atestasi', 'LIKE', '%'.$no_atestasi.'%');			
		}
		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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
		if($nama_gereja_lama != "none")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_lama', 'LIKE', '%'.$nama_gereja_lama.'%');
		}
		if($nama_gereja_baru != "none")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_baru', 'LIKE', '%'.$nama_gereja_baru.'%');
		}		
		
		$atestasi = $atestasi->get();

		//add nama_atestasi
		foreach($atestasi as $row)
		{
			$nama_atestasi = JenisAtestasi::where('id', '=', $row->id_jenis_atestasi)->first()->nama_atestasi;
			$row->nama_atestasi = $nama_atestasi;			
		}

		$data = $atestasi;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Atestasi', 'Jemaat', 'Tanggal_Atestasi', 'Jenis_Atestasi', 
			'Nama Gereja Lama', 'Nama Gereja Baru', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Atestasi', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE ATESTASI', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set nama jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;						

						$each_data = array(
							$no, //1 no
							$row_data->no_atestasi, //2 no_atestasi
							$jemaat, //3 jemaat
							$row_data->tanggal_atestasi, //4 tanggal_atestasi
							$row_data->nama_atestasi, //5 nama_atestasi
							$row_data->nama_gereja_lama, //6 nama_gereja_lama							
							$row_data->nama_gereja_baru, //7 nama_gereja_baru							
							$row_data->keterangan //8 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);						
						
						$sheet->cells('A1:H1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:H'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}

	public function export_filtered_pernikahan(
		$no_pernikahan,						
		$tanggal_awal,					
		$tanggal_akhir,					
		$id_pendeta,					
		$nama_mempelai_wanita,					
		$nama_mempelai_pria)
	{
		//set value search		
		$nama_pria = $nama_mempelai_pria;
		$nama_wanita = $nama_mempelai_wanita;
		
		$pernikahan = DB::table('pernikahan AS per');		
		$pernikahan = $pernikahan->where('per.id_gereja', '=', Auth::user()->id_gereja)->where('per.deleted', '=', 0);
		
		if($no_pernikahan != "none")
		{
			$pernikahan = $pernikahan->where('per.no_pernikahan', 'LIKE', '%'.$no_pernikahan.'%');
		}		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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
		}		
		if($nama_wanita != "none")
		{						
			$pernikahan = $pernikahan->where('per.nama_wanita', 'LIKE', '%'.$nama_wanita.'%');								
		}		
		if($nama_pria != "none")
		{						
			$pernikahan = $pernikahan->where('per.nama_pria', 'LIKE', '%'.$nama_pria.'%');								
		}		
		
		$pernikahan = $pernikahan->get();

		//set nama_pendeta
		foreach($pernikahan as $row)
		{
			$temp = Anggota::find($row->id_pendeta);
			$row->nama_pendeta = $temp->nama_depan." ".$temp->nama_tengah." ".$temp->nama_belakang;
		}

		$data = $pernikahan;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Pernikahan', 'Tanggal_Pernikahan', 'Pendeta yang memberkati', 
			'Mempelai Pria', 'Mempelai Wanita', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Pernikahan', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE PERNIKAHAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{										
						$each_data = array(
							$no, //1 no
							$row_data->no_pernikahan, //2 no_pernikahan
							$row_data->tanggal_pernikahan, //3 tanggal_pernikahan
							$row_data->nama_pendeta, //4 nama_pendeta
							$row_data->nama_pria, //5 nama_pria
							$row_data->nama_wanita, //6 nama_wanita														
							$row_data->keterangan //7 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
											
						$sheet->cells('A1:G1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:G'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	

		return null;
	}

	public function export_filtered_kedukaan(
		$no_kedukaan,
		$tanggal_awal,
		$tanggal_akhir,			
		$nama_jemaat)
	{	

		$kedukaan = DB::table('anggota AS ang')->where('ang.deleted', '=', 0);
		
		$kedukaan = $kedukaan->join('kedukaan AS ked', 'ang.id', '=', 'ked.id_jemaat')->where('ked.deleted', '=', 0);
		
		$kedukaan = $kedukaan->where('ked.id_gereja', '=', Auth::user()->id_gereja);
		
		if($no_kedukaan != "none")
		{
			$kedukaan = $kedukaan->where('ked.no_kedukaan', 'LIKE', '%'.$no_kedukaan.'%');
		}
		if($nama_jemaat != "none")
		{						
			$kedukaan = $kedukaan->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}				
		
		$kedukaan = $kedukaan->get();

		$data = $kedukaan;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Kedukaan', 'Jemaat', 'Tanggal_Meninggal', 'Keterangan' 			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data kedukaan', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE KEDUKAAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{							
						//set jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_kedukaan, //2 no_kedukaan
							$jemaat, //3 jemaat
							$row_data->tanggal_meninggal, //4 tanggal_meninggal
							$row_data->keterangan //5 keterangan							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);				
						
						$sheet->cells('A1:E1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:E'.$last_row, 'thin');						
					//end styling					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;
	}

	public function export_filtered_dkh(
		$no_dkh,
		$nama_jemaat,
		$jenis_dkh,
		$tanggal_awal,						
		$tanggal_akhir)
	{
		//set variable search		
		$id_jenis_dkh = $jenis_dkh;
		
		$dkh = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('id_gereja', '=', Auth::user()->id_gereja)->where('ang.role', '=', 1); //role hanya jemaat
		
		$dkh = $dkh->join('dkh AS dkh', 'ang.id', '=', 'dkh.id_jemaat')->where('dkh.deleted', '=', 0);	
		
		if($no_dkh != "none")
		{
			$dkh = $dkh->where('dkh.no_dkh', 'LIKE', '%'.$no_dkh.'%');
		}	
		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
			{
				$dkh = $dkh->where('dkh.tanggal_dkh', '>=', $tanggal_awal);
				$dkh = $dkh->where('dkh.tanggal_dkh', '<=', $tanggal_akhir);
			}
			else
			{
				$dkh = $dkh->where('dkh.tanggal_dkh', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "none")
			{				
				$dkh = $dkh->where('dkh.tanggal_dkh', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}

		if($id_jenis_dkh != -1)
		{
			$dkh = $dkh->where('dkh.id_jenis_dkh', '=', $id_jenis_dkh);
		}

		if($nama_jemaat != "none")
		{									
			$dkh = $dkh->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}
		
		$dkh = $dkh->get();

		//add nama_dkh
		foreach($dkh as $row)
		{
			$nama_dkh = JenisDkh::where('id', '=', $row->id_jenis_dkh)->first()->nama_dkh;
			$row->nama_dkh = $nama_dkh;			
		}

		$data = $dkh;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_DKH', 'Jemaat', 'Tanggal_DKH', 'Jenis_DKH', 'Keterangan' 			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Dkh', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE DKH', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{							
						//set jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_dkh, //2 no_dkh
							$jemaat, //3 jemaat
							$row_data->tanggal_dkh, //4 tanggal_dkh
							$row_data->nama_dkh, //5 nama_dkh							
							$row_data->keterangan //6 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);										
						
						$sheet->cells('A1:F1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:F'.$last_row, 'thin');
					//end styling					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	

		return null;
	}

// --------------------------------------------------------- ADMIN ---------------------------------------------------------

	public function admin_export_filtered_kegiatan( 
		$nama_kebaktian, $nama_pendeta, $tanggal_awal, $tanggal_akhir,
		$jam_awal, $jam_akhir, $batas_bawah_hadir_jemaat, $batas_atas_hadir_jemaat,
		$batas_bawah_hadir_simpatisan, $batas_atas_hadir_simpatisan, $batas_bawah_hadir_penatua, $batas_atas_hadir_penatua, 
		$batas_bawah_hadir_pemusik, $batas_atas_hadir_pemusik, $batas_bawah_hadir_komisi, $batas_atas_hadir_komisi)	
	{			

		$kebaktian = DB::table('kegiatan AS keg')->where('id_gereja', '=', Auth::user()->id_gereja);		
		
		if($nama_kebaktian != "none")
		{	
			$kebaktian = $kebaktian->where('keg.nama_jenis_kegiatan', 'LIKE', '%'.$nama_kebaktian.'%');
		}		
		if($nama_pendeta != "none")
		{			
			$kebaktian = $kebaktian->where('keg.nama_pendeta', 'LIKE', '%'.$nama_pendeta.'%');
		}
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$kebaktian = $kebaktian->where('keg.tanggal_selesai', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
		//validation range jam
		if($jam_awal != "none")
		{
			if($jam_akhir != "none")
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
			if($jam_akhir != "none")
			{				
				$kebaktian = $kebaktian->where('keg.jam_selesai', '<=', $jam_akhir);
			}
			else
			{
				//ga ada jam awal dan akhir
			}
		}
		//validation range banyak jemaat
		if($batas_bawah_hadir_jemaat != "none")
		{
			if($batas_atas_hadir_jemaat != "none")
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
			if($batas_atas_hadir_jemaat != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_jemaat', '<=', $batas_atas_hadir_jemaat);
			}
			else
			{
				//ga ada batas kehadiran jemaat
			}
		}
		//validation range banyak simpatisan
		if($batas_bawah_hadir_simpatisan != "none")
		{
			if($batas_atas_hadir_simpatisan != "none")
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
			if($batas_atas_hadir_simpatisan != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_simpatisan', '<=', $batas_atas_hadir_simpatisan);
			}
			else
			{
				//ga ada batas kehadiran simpatisan
			}
		}		
		//validation range banyak penatua
		if($batas_bawah_hadir_penatua != "none")
		{
			if($batas_atas_hadir_penatua != "none")
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
			if($batas_atas_hadir_penatua != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_penatua', '<=', $batas_atas_hadir_penatua);
			}
			else
			{
				//ga ada batas kehadiran penatua
			}
		}
		//validation range banyak pemusik
		if($batas_bawah_hadir_pemusik != "none")
		{
			if($batas_atas_hadir_pemusik != "none")
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
			if($batas_atas_hadir_pemusik != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_pemusik', '<=', $batas_atas_hadir_pemusik);
			}
			else
			{
				//ga ada batas kehadiran pemusik
			}
		}
		//validation range banyak komisi
		if($batas_bawah_hadir_komisi != "none")
		{
			if($batas_atas_hadir_komisi != "none")
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
			if($batas_atas_hadir_komisi != "none")
			{				
				$kebaktian = $kebaktian->where('keg.banyak_komisi', '<=', $batas_atas_hadir_komisi);
			}
			else
			{
				//ga ada batas kehadiran komisi
			}
		}
		
		$data = $kebaktian->orderBy('keg.tanggal_mulai')->get();

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','Tanggal','Nama Kebaktian','Jam Mulai','Jam Selesai', 'Nama Pengkhotbah',
			'Jemaat Pria','Jemaat Wanita','Total Jemaat',
			'Simpatisan Pria','Simpatisan Wanita','Total Simpatisan',
			'Penatua Pria','Penatua Wanita','Total Penatua',
			'Pemusik Pria','Pemusik Wanita','Total Pemusik',
			'Komisi Pria','Komisi Wanita','Total Komisi'			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Kebaktian', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE KEBAKTIAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{					
						$each_data = array(
							$no, //1 no
							$row_data->tanggal_mulai, //2 tanggal_mulai
							$row_data->nama_jenis_kegiatan, //3 nama_jenis_kegiatan
							$row_data->jam_mulai, //4 jam_mulai
							$row_data->jam_selesai, //5 jam_selesai							
							$row_data->nama_pendeta, //6 nama_pendeta							
							$row_data->banyak_jemaat_pria, //7 banyak_jemaat_pria
							$row_data->banyak_jemaat_wanita, //8 banyak_jemaat_wanita
							$row_data->banyak_jemaat, //9 banyak_jemaat						
							$row_data->banyak_simpatisan_pria, //10 banyak_simpatisan_pria
							$row_data->banyak_simpatisan_wanita, //11 banyak_simpatisan_wanita
							$row_data->banyak_simpatisan, //12 banyak_simpatisan						
							$row_data->banyak_penatua_pria, //13 banyak_penatua_pria
							$row_data->banyak_penatua_wanita, //14 banyak_penatua_wanita
							$row_data->banyak_penatua, //15 banyak_penatua						
							$row_data->banyak_pemusik_pria, //16 banyak_pemusik_pria
							$row_data->banyak_pemusik_wanita, //17 banyak_pemusik_wanita
							$row_data->banyak_pemusik, //18 banyak_pemusik						
							$row_data->banyak_komisi_pria, //19 banyak_komisi_pria
							$row_data->banyak_komisi_wanita, //20 banyak_komisi_wanita
							$row_data->banyak_komisi, //21 banyak_komisi						
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);										
						
						$sheet->cells('A1:U1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:U'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}	

	public function admin_export_filtered_anggota( 
		$nomor_anggota,
		$nama,
		$tanggal_awal,
		$tanggal_akhir,
		$kota,
		$gender,
		$wilayah,
		$gol_darah,
		$pendidikan,
		$pekerjaan,
		$etnis,						
		$role)	
	{			

		$anggota = DB::table('anggota AS ang')->where('ang.id_gereja', '=', Auth::user()->id_gereja);				
		$anggota = $anggota->join('alamat AS alm', 'ang.id', '=','alm.id_anggota'); //yg ini ngerubah 'id' jadi yg di 'alamat'				
							
		if($nomor_anggota != "none")
		{
			$anggota = $anggota->where('ang.no_anggota', 'LIKE', '%'.$nomor_anggota.'%');
		}
		if($kota != "none")
		{				
			$anggota = $anggota->where('alm.kota', 'LIKE', '%'.$kota.'%');
		}
		if($gender != "none") 
		{
			$anggota = $anggota->where('ang.gender', '=', $gender);
		}
		if($wilayah != "none")
		{
			$anggota = $anggota->where('ang.wilayah', '=', $wilayah);
		}
		if($gol_darah != "none")
		{
			$anggota = $anggota->where('ang.gol_darah', '=', $gol_darah);
		}
		if($pendidikan != "none")
		{
			$anggota = $anggota->where('ang.pendidikan', '=', $pendidikan);
		}
		if($pekerjaan != "none")
		{
			$anggota = $anggota->where('ang.pekerjaan', '=', $pekerjaan);
		}
		if($etnis != "none")
		{
			$anggota = $anggota->where('ang.etnis', '=', $etnis);
		}
		//validation range tanggal lahir
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$anggota = $anggota->where('ang.tanggal_lahir', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}
	
		if($role != "none") 
		{
			$anggota = $anggota->where('ang.role', '=', $role);
		}
		if($nama != "none")
		{	
			$anggota = $anggota->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}
		
		$anggota = $anggota->orderBy('ang.nama_depan');
						
		$anggota = $anggota->get();				

		//add hp		
		foreach($anggota as $key)
		{									
			
			// $hp = Hp::where('id_anggota', '=', $key->id_anggota)->where('deleted', '=', 0)->get();
			$hp = Hp::where('id_anggota', '=', $key->id_anggota)->get();
			
			$arr_hp = "";
			$first = 0;			
			foreach($hp as $each_hp)
			{	
				if($first == 0){
					$arr_hp = $each_hp->no_hp;			
					$first = 1;
				}else
				{
					$arr_hp = $arr_hp.",".$each_hp->no_hp;	
				}								
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

		$data = $anggota;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Anggota','Nama Depan','Nama Tengah','Nama Belakang', 
			'Alamat', 'Kota', 'Kodepos', 'Telepon', 'HP', 
			'Jenis Kelamin', 'Wilayah', 'Gol_Darah', 'Pendidikan', 'Pekerjaan',
			'Etnis', 'Kota Lahir', 'Tanggal Lahir', 'Baptis', 'Status'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Anggota', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE ANGGOTA', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set gender
						$gender = ($row_data->gender == 0) ? "wanita" : "pria";
						//set baptis
						$baptis = "";
						if($row_data->status_anggota == 1){
							$baptis = "baptis";
						}else if($row_data->status_anggota == 2){
							$baptis = "sidi";
						}else{
							$baptis = "non-anggota";
						}
						//set role
						if($row_data->role == 1){
							$role = "jemaat";
						}else if($row_data->role == 2){
							$role = "pendeta";
						}else if($row_data->role == 3){
							$role = "penatua";
						}else if($row_data->role == 4){
							$role = "majelis";
						}

						$each_data = array(
							$no, //1 no
							$row_data->no_anggota, //2 no_anggota
							$row_data->nama_depan, //3 nama_depan
							$row_data->nama_tengah, //4 nama_tengah
							$row_data->nama_belakang, //5 nama_belakang							
							$row_data->jalan, //6 jalan							
							$row_data->kota, //7 kota
							$row_data->kodepos, //8 kodepos
							$row_data->telp, //9 telp						
							$row_data->arr_hp, //10 arr_hp
							$gender, //11 gender
							$row_data->wilayah, //12 wilayah						
							$row_data->gol_darah, //13 gol_darah
							$row_data->pendidikan, //14 pendidikan
							$row_data->pekerjaan, //15 pekerjaan						
							$row_data->etnis, //16 etnis
							$row_data->kota_lahir, //17 kota_lahir
							$row_data->tanggal_lahir, //18 tanggal_lahir						
							$baptis, //19 status_anggota
							$role //20 role							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
						
						$sheet->cells('A1:T1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:T'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}

	public function admin_export_filtered_baptis( 
		$nomor_baptis,						
		$tanggal_awal,
		$tanggal_akhir,
		$id_pembaptis,
		$nama_jemaat,						
		$jenis_baptis)
	{					
		//set variable search
		$no_baptis = $nomor_baptis;								
		$id_jenis_baptis = $jenis_baptis;

		//query mulai dari anggota nyambung ke baptis
		$baptis = DB::table('anggota AS ang')->whereNotIn('ang.role', array(2));
		
		$baptis = $baptis->join('baptis AS bap', 'ang.id', '=', 'bap.id_jemaat');		
			
		$baptis = $baptis->where('bap.id_gereja', '=', Auth::user()->id_gereja);														
		if($no_baptis != "none")
		{
			$baptis = $baptis->where('bap.no_baptis', 'LIKE', '%'.$no_baptis.'%');
		}						
			
		if($nama_jemaat != "none")
		{															
			$baptis = $baptis->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}				
	
		if($id_pembaptis != -1)
		{
			$baptis = $baptis->where('bap.id_pendeta', '=', $id_pembaptis);
		}		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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

			$temp = Anggota::find($row->id_pendeta);
			$row->nama_pembaptis = $temp->nama_depan." ".$temp->nama_tengah." ".$temp->nama_belakang;
		}

		$data = $baptis;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Baptis','Pembaptis','Jemaat','Jenis_Baptis', 
			'Tanggal_Baptis', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Baptis', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE BAPTIS', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set nama jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_baptis, //2 no_baptis
							$row_data->nama_pembaptis, //3 pembaptis
							$jemaat, //4 jemaat
							$row_data->nama_jenis_baptis, //5 nama_jenis_baptis							
							$row_data->tanggal_baptis, //6 tanggal_baptis							
							$row_data->keterangan //7 keterangan							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);									
						
						$sheet->cells('A1:G1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:G'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}		

	public function admin_export_filtered_atestasi(
		$no_atestasi,
		$nama_jemaat,
		$tanggal_awal,
		$tanggal_akhir,
		$id_jenis_atestasi,
		$nama_gereja_lama,						
		$nama_gereja_baru)
	{
		//set variable search		
		$nama = $nama_jemaat;				
		
		$atestasi = DB::table('anggota AS ang')->where('ang.id_gereja', '=', Auth::user()->id_gereja);
		
		$atestasi = $atestasi->join('atestasi AS ate', 'ang.id', '=', 'ate.id_anggota');				
		
		//query ini supaya keluar urutan ascending per nama anggota
		$atestasi = $atestasi->orderBy('ang.nama_depan');				
		
		if($nama != "none")
		{							
			$atestasi = $atestasi->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama.'%');
		}		
		
		if($no_atestasi != "none")
		{
			$atestasi = $atestasi->where('ate.no_atestasi', 'LIKE', '%'.$no_atestasi.'%');			
		}
		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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
		if($nama_gereja_lama != "none")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_lama', 'LIKE', '%'.$nama_gereja_lama.'%');
		}
		if($nama_gereja_baru != "none")
		{
			$atestasi = $atestasi->where('ate.nama_gereja_baru', 'LIKE', '%'.$nama_gereja_baru.'%');
		}		
		
		$atestasi = $atestasi->get();

		//add nama_atestasi
		foreach($atestasi as $row)
		{
			$nama_atestasi = JenisAtestasi::where('id', '=', $row->id_jenis_atestasi)->first()->nama_atestasi;
			$row->nama_atestasi = $nama_atestasi;			
		}

		$data = $atestasi;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Atestasi', 'Jemaat', 'Tanggal_Atestasi', 'Jenis_Atestasi', 
			'Nama Gereja Lama', 'Nama Gereja Baru', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Atestasi', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE ATESTASI', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{				
						//set nama jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;						

						$each_data = array(
							$no, //1 no
							$row_data->no_atestasi, //2 no_atestasi
							$jemaat, //3 jemaat
							$row_data->tanggal_atestasi, //4 tanggal_atestasi
							$row_data->nama_atestasi, //5 nama_atestasi
							$row_data->nama_gereja_lama, //6 nama_gereja_lama							
							$row_data->nama_gereja_baru, //7 nama_gereja_baru							
							$row_data->keterangan //8 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);						
						
						$sheet->cells('A1:H1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:H'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;		
	}

	public function admin_export_filtered_pernikahan(
		$no_pernikahan,						
		$tanggal_awal,					
		$tanggal_akhir,					
		$id_pendeta,					
		$nama_mempelai_wanita,					
		$nama_mempelai_pria)
	{
		//set value search		
		$nama_pria = $nama_mempelai_pria;
		$nama_wanita = $nama_mempelai_wanita;
		
		$pernikahan = DB::table('pernikahan AS per');		
		$pernikahan = $pernikahan->where('per.id_gereja', '=', Auth::user()->id_gereja);
		
		if($no_pernikahan != "none")
		{
			$pernikahan = $pernikahan->where('per.no_pernikahan', 'LIKE', '%'.$no_pernikahan.'%');
		}		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
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
		}		
		if($nama_wanita != "none")
		{						
			$pernikahan = $pernikahan->where('per.nama_wanita', 'LIKE', '%'.$nama_wanita.'%');								
		}		
		if($nama_pria != "none")
		{						
			$pernikahan = $pernikahan->where('per.nama_pria', 'LIKE', '%'.$nama_pria.'%');								
		}		
		
		$pernikahan = $pernikahan->get();

		//set nama_pendeta
		foreach($pernikahan as $row)
		{
			$temp = Anggota::find($row->id_pendeta);
			$row->nama_pendeta = $temp->nama_depan." ".$temp->nama_tengah." ".$temp->nama_belakang;
		}

		$data = $pernikahan;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Pernikahan', 'Tanggal_Pernikahan', 'Pendeta yang memberkati', 
			'Mempelai Pria', 'Mempelai Wanita', 'Keterangan'
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Pernikahan', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE PERNIKAHAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{										
						$each_data = array(
							$no, //1 no
							$row_data->no_pernikahan, //2 no_pernikahan
							$row_data->tanggal_pernikahan, //3 tanggal_pernikahan
							$row_data->nama_pendeta, //4 nama_pendeta
							$row_data->nama_pria, //5 nama_pria
							$row_data->nama_wanita, //6 nama_wanita														
							$row_data->keterangan //7 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
											
						$sheet->cells('A1:G1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:G'.$last_row, 'thin');																					
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	

		return null;
	}

	public function admin_export_filtered_kedukaan(
		$no_kedukaan,
		$tanggal_awal,
		$tanggal_akhir,			
		$nama_jemaat)
	{	

		$kedukaan = DB::table('anggota AS ang');
		
		$kedukaan = $kedukaan->join('kedukaan AS ked', 'ang.id', '=', 'ked.id_jemaat');
		
		$kedukaan = $kedukaan->where('ked.id_gereja', '=', Auth::user()->id_gereja);
		
		if($no_kedukaan != "none")
		{
			$kedukaan = $kedukaan->where('ked.no_kedukaan', 'LIKE', '%'.$no_kedukaan.'%');
		}
		if($nama_jemaat != "none")
		{						
			$kedukaan = $kedukaan->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
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
			if($tanggal_akhir != "none")
			{				
				$kedukaan = $kedukaan->where('ang.tanggal_meninggal', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}				
		
		$kedukaan = $kedukaan->get();

		$data = $kedukaan;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_Kedukaan', 'Jemaat', 'Tanggal_Meninggal', 'Keterangan' 			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data kedukaan', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE KEDUKAAN', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{							
						//set jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_kedukaan, //2 no_kedukaan
							$jemaat, //3 jemaat
							$row_data->tanggal_meninggal, //4 tanggal_meninggal
							$row_data->keterangan //5 keterangan							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);				
						
						$sheet->cells('A1:E1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:E'.$last_row, 'thin');						
					//end styling					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	
		return null;
	}

	public function admin_export_filtered_dkh(
		$no_dkh,
		$nama_jemaat,
		$jenis_dkh,
		$tanggal_awal,						
		$tanggal_akhir)
	{
		//set variable search		
		$id_jenis_dkh = $jenis_dkh;
		
		$dkh = DB::table('anggota AS ang')->where('id_gereja', '=', Auth::user()->id_gereja)->where('ang.role', '=', 1); //role hanya jemaat
		
		$dkh = $dkh->join('dkh AS dkh', 'ang.id', '=', 'dkh.id_jemaat');	
		
		if($no_dkh != "none")
		{
			$dkh = $dkh->where('dkh.no_dkh', 'LIKE', '%'.$no_dkh.'%');
		}	
		
		//validation range tanggal
		if($tanggal_awal != "none")
		{
			if($tanggal_akhir != "none")
			{
				$dkh = $dkh->where('dkh.tanggal_dkh', '>=', $tanggal_awal);
				$dkh = $dkh->where('dkh.tanggal_dkh', '<=', $tanggal_akhir);
			}
			else
			{
				$dkh = $dkh->where('dkh.tanggal_dkh', '>=', $tanggal_awal);
			}
		}
		else
		{
			if($tanggal_akhir != "none")
			{				
				$dkh = $dkh->where('dkh.tanggal_dkh', '<=', $tanggal_akhir);
			}
			else
			{
				//ga ada tanggal awal dan akhir
			}
		}

		if($id_jenis_dkh != -1)
		{
			$dkh = $dkh->where('dkh.id_jenis_dkh', '=', $id_jenis_dkh);
		}

		if($nama_jemaat != "none")
		{									
			$dkh = $dkh->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$nama_jemaat.'%');
		}
		
		$dkh = $dkh->get();

		//add nama_dkh
		foreach($dkh as $row)
		{
			$nama_dkh = JenisDkh::where('id', '=', $row->id_jenis_dkh)->first()->nama_dkh;
			$row->nama_dkh = $nama_dkh;			
		}

		$data = $dkh;

		if(count($data) == 0){
			return 'Tidak ada data.';
		}
				
		$header_table = array(
			'No.','No_DKH', 'Jemaat', 'Tanggal_DKH', 'Jenis_DKH', 'Keterangan' 			
		);

		try{
			//START INSERT TO ROW
			Excel::create('Export Data Dkh', function($excel) use ($data,$header_table){

				$excel->sheet('DATA BASE DKH', function($sheet) use ($data,$header_table){					
					//row 1 - header table
					$sheet->row(1, $header_table);
									
					//start data di row 7
					$row_num  = 2;					
					$no = 1;
					foreach($data as $row_data)
					{							
						//set jemaat
						$jemaat = $row_data->nama_depan." ".$row_data->nama_tengah." ".$row_data->nama_belakang;

						$each_data = array(
							$no, //1 no
							$row_data->no_dkh, //2 no_dkh
							$jemaat, //3 jemaat
							$row_data->tanggal_dkh, //4 tanggal_dkh
							$row_data->nama_dkh, //5 nama_dkh							
							$row_data->keterangan //6 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);										
						
						$sheet->cells('A1:F1', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								// 'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A2:F'.$last_row, 'thin');
					//end styling					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}	

		return null;
	}

}

?>