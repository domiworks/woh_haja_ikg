<?php

use Carbon\Carbon;

class ImportEksportController extends BaseController {

	//START FUNGSI BUAT IMPORT REAL DATA, ADA BEBERAPA FUNGSI KARENA TEMPLATE TIAP GEREJA BEDA-BEDA
	public function import_data_dbaj_gki_ayudia()
	{			
		//NOTE KOLOM YANG TIDAK DIPROSES:
		//RAYON, WILAYAH, KECAMATAN, KELURAHAN, UMUR

		$id_gereja = 1; //id_gereja = 1 = gki ayudia

		/*
		$destinationPath = 'assets/file_excel/anggota/'.$id_gereja.'/';
		$filename = '';
		
		if(Input::hasFile('excel_file')){
			$file = Input::file('excel_file');
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		else{
			return 'Tidak ada file yang dipilih';
		}
		*/

		//if($uploadSuccess){						
		if(true){
			//$file_path = $destinationPath.$filename;			
			$file_path = 'assets/file_excel/anggota/'.$id_gereja.'/GKI Ayudia DBAJ (imported).xlsx';
					
			$result = Excel::selectSheets('DATA BASE ANGGOTA')->load($file_path, function($reader) use($id_gereja){				
															
				// Getting all results
				$reader->skip(7); //maka skrng di row 8
				$reader->noHeading();
				$results = $reader->get();	
								
				//								
				$last_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
				$last_number = count($last_no_anggota) + 1;
				
				foreach($results as $row)
				{			
					//break
					if($row[1] == null)
					{
						break;
					}

					//nama_depan
					if($row[4] == null){
						$nama_depan = "";
					}else{
						$nama_depan = $row[4];
					}
					//alamat
					if($row[6] == null){
						$jalan = "";
					}else{
						$jalan = $row[6];
					}
					//telp
					if($row[7] == null){
						$telp = "";
					}else{
						$telp = $row[7];
					}
					//kodepos
					if($row[8] == null){
						$kodepos = "";
					}else{
						$kodepos = $row[8];
					}					
					//kota
					if($row[9] == null){
						$kota = "";
					}else{
						$kota = $row[9];
					}
					//gender
					if($row[14] == null){
						$gender = -1;
					}else if($row[14] == "P" || $row[14] == "p"){
						$gender = 1;
					}else{	//W = w
						$gender = 0;
					}
					//status_anggota
					if($row[15] == null){
						$status_anggota = -1;
					}else if($row[15] == "B" || $row[15] == "b"){
						$status_anggota = 1;
					}else{	//S = s
						$status_anggota = 2;
					}				
					//pendidikan
					if($row[17] == null){
						$pendidikan = "";
					}else{
						$pendidikan = $row[17];
					}
					//pekerjaan
					if($row[18] == null){
						$pekerjaan = "";
					}else{
						$pekerjaan = $row[18];
					}
					//etnis
					if($row[19] == null){
						$etnis = "";
					}else{
						$etnis = $row[19];
					}
					//tanggal_lahir
					if($row[20] == null){
						$tanggal_lahir = "";
					}else{
						$tanggal_lahir = $row[20];
					}																									
					//tanggal_baptis
					if($row[21] == null){
						$tanggal_baptis = "";
					}else{
						$tanggal_baptis = $row[21];
					}																									
					//tanggal_sidi
					if($row[22] == null){
						$tanggal_sidi = "";
					}else{
						$tanggal_sidi = $row[22];
					}	
					//tanggal_atestasi_masuk
					if($row[23] == null){
						$tanggal_atestasi_masuk = "";
					}else{
						$tanggal_atestasi_masuk = $row[23];
					}																									

					//NOTE : KALO CELL DI EXCELNYA NULL BAKAL ERROR																							
					//NOTE : DB INSERT TABLE GA AKAN KENA VALIDATION YANG ADA DI MODEL								
					//GENERATE NO_ANGGOTA BY SYSTEM
					$no_anggota = $id_gereja."-".$last_number;
					$last_number++;	//generate lastnumber baru untuk looping setelahnya ini / berikutnya
										
					//START INSERT
					DB::table('anggota')->insert(
						array(							
							//IT WILL ERROR IF NO_ANGGOTA NOT UNIQUE
							'no_anggota'=>$no_anggota, 							
							'nama_depan'=>$nama_depan, //asumsi : sementara masukin nama ke nama_depan								
							'nama_tengah'=>"",
							'nama_belakang'=>"",		
							'telp'=>$telp,
							'gender'=>$gender,
							'status_anggota'=>$status_anggota,
							'wilayah'=>"", 
							'gol_darah'=>"", 
							'pendidikan'=>$pendidikan,
							'pekerjaan'=>$pekerjaan,
							'etnis'=>$etnis,
							'kota_lahir'=>"", 
							'tanggal_lahir'=>$tanggal_lahir, //format di excelnya dd/mm/yyyy
							// 'tanggal_meninggal'=>null,
							'role'=>1,		//di data anggota ga tau role, sementara masukin jadi 1 = jemaat semua		
							'foto'=>null,
							'id_gereja'=>$id_gereja,
							'deleted'=>0,														
							'created_at'=>Carbon::now(),
							'updated_at'=>Carbon::now()																
						)
					);							
					$new_anggota = DB::table('anggota')->orderBy('id', 'desc')->first();											
					DB::table('alamat')->insert(
						array(
							'jalan'=>$jalan,
							'kota'=>$kota,								
							'kodepos'=>$kodepos,
							'id_anggota'=>$new_anggota->id,								
							'created_at'=>Carbon::now(),
							'updated_at'=>Carbon::now()
						)
					);
					if($tanggal_baptis != "")
					{
						DB::table('baptis')->insert(
							array(
								//'no_baptis'=>"",
								'id_jemaat'=>$new_anggota->id,
								//'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
								'tanggal_baptis'=>$tanggal_baptis,
								'id_jenis_baptis'=>1, //= id_jenis_baptis untuk baptis
								'id_gereja'=>$id_gereja,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
					}
					if($tanggal_sidi != "")
					{
						DB::table('baptis')->insert(
							array(
								//'no_baptis'=>"",
								'id_jemaat'=>$new_anggota->id,
								//'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
								'tanggal_baptis'=>$tanggal_baptis,
								'id_jenis_baptis'=>2, //= id_jenis_baptis untuk baptis
								'id_gereja'=>$id_gereja,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
					}
					if($tanggal_atestasi_masuk != "")
					{	
						DB::table('atestasi')->insert(
							array(
								//'no_atestasi'=>"",
								'tanggal_atestasi'=>$tanggal_atestasi_masuk,
								//'id_gereja_lama'=>,
								'id_gereja_baru'=>1,
								//'nama_gereja_lama'=>"",
								'nama_gereja_baru'=>"GKI Ayudia",
								//'id_jenis_atestasi'=>, //atestasi keluar yang mana?
								'id_anggota'=>$new_anggota->id,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);						
					}					
					if($tanggal_atestasi_keluar != "")
					{							
						DB::table('atestasi')->insert(
							array(
								//'no_atestasi'=>"",
								'tanggal_atestasi'=>$tanggal_atestasi_keluar,
								'id_gereja_lama'=>1,
								//'id_gereja_baru'=>,
								'nama_gereja_lama'=>"GKI Ayudia",
								//'nama_gereja_baru'=>"",
								//'id_jenis_atestasi'=>, //atestasi keluar yang mana?
								'id_anggota'=>$new_anggota->id,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);																	
					}																											
				}
			});
			
			return 'Berhasil';			
		}
		else{
			return 'Gagal';
		}
	}
	public function import_data_dbaj_gki_cianjur()
	{
		//NOTE KOLOM YANG TIDAK DIPROSES:
		//RAYON, WILAYAH, KECAMATAN, KELURAHAN, UMUR

		$id_gereja = 2; //id_gereja = 2 = gki cianjur

		/*
		$destinationPath = 'assets/file_excel/anggota/'.$id_gereja.'/';
		$filename = '';
		
		if(Input::hasFile('excel_file')){
			$file = Input::file('excel_file');
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		else{
			return 'Tidak ada file yang dipilih';
		}
		*/

		//if($uploadSuccess){						
		if(true){
			//$file_path = $destinationPath.$filename;			
			$file_path = 'assets/file_excel/anggota/'.$id_gereja.'/GKI Cianjur DBAJ (imported).xlsx';
					
			$result = Excel::selectSheets('DATA BASE ANGGOTA')->load($file_path, function($reader) use($id_gereja){				
															
				// Getting all results
				$reader->skip(6); //maka skrng di row 7
				$reader->noHeading();
				$results = $reader->get();	
								
				//								
				$last_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
				$last_number = count($last_no_anggota) + 1;
				
				foreach($results as $row)
				{			
					//break
					if($row[1] == null)
					{
						break;
					}

					//nama_depan
					if($row[3] == null){
						$nama_depan = "";
					}else{
						$nama_depan = $row[3];
					}
					//alamat
					if($row[4] == null){
						$jalan = "";
					}else{
						$jalan = $row[4];
					}
					//telp
					if($row[5] == null){
						$telp = "";
					}else{
						$telp = $row[5];
					}
					//wilayah
					if($row[6] == null){
						$wilayah = "";
					}else{
						$wilayah = $row[6];
					}
					//kodepos
					//if($row[8] == null){
					//	$kodepos = "";
					//}else{
					//  $kodepos = $row[8];
					//}					
					//kota
					//if($row[9] == null){
					//	$kota = "";
					//}else{
					//	$kota = $row[9];
					//}
					//gender
					if($row[7] == null){
						$gender = -1;
					}else if($row[7] == "P" || $row[7] == "p"){
						$gender = 1;
					}else{	//W = w
						$gender = 0;
					}
					//status_anggota
					if($row[8] == null){
						$status_anggota = -1;
					}else if($row[8] == "B" || $row[8] == "b"){
						$status_anggota = 1;
					}else{	//S = s
						$status_anggota = 2;
					}				
					//pendidikan
					if($row[10] == null){
						$pendidikan = "";
					}else{
						$pendidikan = $row[10];
					}
					//pekerjaan
					if($row[11] == null){
						$pekerjaan = "";
					}else{
						$pekerjaan = $row[11];
					}
					//etnis
					if($row[12] == null){
						$etnis = "";
					}else{
						$etnis = $row[12];
					}
					//tanggal_lahir
					if($row[13] == null){
						$tanggal_lahir = "";
					}else{
						$tanggal_lahir = $row[13];
					}																									
					//tanggal_baptis
					if($row[14] == null){
						$tanggal_baptis = "";
					}else{
						$tanggal_baptis = $row[14];
					}																									
					//tanggal_sidi
					if($row[15] == null){
						$tanggal_sidi = "";
					}else{
						$tanggal_sidi = $row[15];
					}	
					//tanggal_atestasi_masuk
					if($row[16] == null){
						$tanggal_atestasi_masuk = "";
					}else{
						$tanggal_atestasi_masuk = $row[16];
					}																									
					//tanggal_atestasi_keluar
					if($row[17] == null){
						$tanggal_atestasi_keluar = "";
					}else{
						$tanggal_atestasi_keluar = $row[17];
					}
					//tanggal_meninggal
					if($row[18] == null){
						$tanggal_meninggal = "";
					}else{
						$tanggal_meninggal = $row[18];
					}
					//tanggal_dkh
					if($row[19] == null){
						$tanggal_dkh = "";
					}else{
						$tanggal_dkh = $row[19];
					}
					//tanggal_ex_dkh
					if($row[20] == null){
						$tanggal_ex_dkh = "";
					}else{
						$tanggal_ex_dkh = $row[20];
					}
					//tanggal_ex_dkh4
					if($row[21] == null){
						$tanggal_ex_dkh4 = "";
					}else{
						$tanggal_ex_dkh4 = $row[21];
					}
					//alasan 1 mutasi
					if($row[22] == null){
						$alasan_1_mutasi = "";
					}else{
						$alasan_1_mutasi = $row[22];
					}
					//alasan 2 mutasi
					if($row[23] == null){
						$alasan_2_mutasi = "";
					}else{
						$alasan_2_mutasi = $row[23];
					}

					//NOTE : KALO CELL DI EXCELNYA NULL BAKAL ERROR																							
					//NOTE : DB INSERT TABLE GA AKAN KENA VALIDATION YANG ADA DI MODEL								
					//GENERATE NO_ANGGOTA BY SYSTEM
					$no_anggota = $id_gereja."-".$last_number;
					$last_number++;	//generate lastnumber baru untuk looping setelahnya ini / berikutnya
										
					//START INSERT
					DB::table('anggota')->insert(
						array(							
							//IT WILL ERROR IF NO_ANGGOTA NOT UNIQUE
							'no_anggota'=>$no_anggota, 							
							'nama_depan'=>$nama_depan, //asumsi : sementara masukin nama ke nama_depan								
							'nama_tengah'=>"",
							'nama_belakang'=>"",		
							'telp'=>$telp,
							'gender'=>$gender,
							'status_anggota'=>$status_anggota,
							'wilayah'=>$wilayah, 
							'gol_darah'=>"", 
							'pendidikan'=>$pendidikan,
							'pekerjaan'=>$pekerjaan,
							'etnis'=>$etnis,
							'kota_lahir'=>"", 
							'tanggal_lahir'=>$tanggal_lahir, //format di excelnya dd/mm/yyyy
							// 'tanggal_meninggal'=>null,
							'role'=>1,		//di data anggota ga tau role, sementara masukin jadi 1 = jemaat semua		
							'foto'=>null,
							'id_gereja'=>$id_gereja,
							'deleted'=>0,														
							'created_at'=>Carbon::now(),
							'updated_at'=>Carbon::now()																
						)
					);							
					$new_anggota = DB::table('anggota')->orderBy('id', 'desc')->first();											
					DB::table('alamat')->insert(
						array(
							'jalan'=>$jalan,
							'kota'=>"Cianjur",								
							'kodepos'=>"",
							'id_anggota'=>$new_anggota->id,								
							'created_at'=>Carbon::now(),
							'updated_at'=>Carbon::now()
						)
					);
					if($tanggal_baptis != "")
					{
						DB::table('baptis')->insert(
							array(
								//'no_baptis'=>"",
								'id_jemaat'=>$new_anggota->id,
								//'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
								'tanggal_baptis'=>$tanggal_baptis,
								'id_jenis_baptis'=>1, //= id_jenis_baptis untuk baptis
								'id_gereja'=>$id_gereja,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
					}
					if($tanggal_sidi != "")
					{
						DB::table('baptis')->insert(
							array(
								//'no_baptis'=>"",
								'id_jemaat'=>$new_anggota->id,
								//'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
								'tanggal_baptis'=>$tanggal_baptis,
								'id_jenis_baptis'=>2, //= id_jenis_baptis untuk baptis
								'id_gereja'=>$id_gereja,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
					}					
					if($tanggal_atestasi_masuk != "")
					{	
						DB::table('atestasi')->insert(
							array(
								//'no_atestasi'=>"",
								'tanggal_atestasi'=>$tanggal_atestasi_masuk,
								//'id_gereja_lama'=>,
								'id_gereja_baru'=>2,
								//'nama_gereja_lama'=>"GKI Cianjur",
								'nama_gereja_baru'=>"GKI Cianjur",
								//'id_jenis_atestasi'=>, //atestasi keluar yang mana?
								'id_anggota'=>$new_anggota->id,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);						
					}					
					if($tanggal_atestasi_keluar != "")
					{							
						DB::table('atestasi')->insert(
							array(
								//'no_atestasi'=>"",
								'tanggal_atestasi'=>$tanggal_atestasi_keluar,
								'id_gereja_lama'=>2,
								//'id_gereja_baru'=>,
								'nama_gereja_lama'=>"GKI Cianjur",
								//'nama_gereja_baru'=>"",
								//'id_jenis_atestasi'=>, //atestasi keluar yang mana?
								'id_anggota'=>$new_anggota->id,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);																	
					}
					if($tanggal_meninggal != "")
					{
						DB::table('kedukaan')->insert(
							array(
								'no_kedukaan'=>"",
								'id_gereja'=>$id_gereja,
								'id_jemaat'=>$new_anggota->id,
								'keterangan'=>"",
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
						DB::table('anggota')
				            ->where('id', $new_anggota->id)
				            ->update(array('tanggal_meninggal' => $tanggal_meninggal));
					}																										
				}
			});
			
			return 'Berhasil';			
		}
		else{
			return 'Gagal';
		}
	}
	//END FUNGSI IMPORT REAL DATA


	public function view_import_eksport()
	{		
		// $header = $this->setHeader();
		// return View::make('pages.importeksport',
				// compact('header'));	
		return View::make('pages.importeksport');	
	}
	
	public function import_kegiatan_GKI_Cianjur(){
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'61',
				'banyak_jemaat_wanita'=>'106',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'52',
				'banyak_jemaat_wanita'=>'79',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'6',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'50',
				'banyak_jemaat_wanita'=>'70',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'60',
				'banyak_jemaat_wanita'=>'109',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'21',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'59',
				'banyak_jemaat_wanita'=>'82',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'14',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'45',
				'banyak_jemaat_wanita'=>'65',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'47',
				'banyak_jemaat_wanita'=>'79',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'5',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'40',
				'banyak_jemaat_wanita'=>'79',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'53',
				'banyak_jemaat_wanita'=>'73',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'11',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		

		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'53',
				'banyak_jemaat_wanita'=>'87',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'16',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'49',
				'banyak_jemaat_wanita'=>'79',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'55',
				'banyak_jemaat_wanita'=>'95',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'73',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'15',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'62',
				'banyak_jemaat_wanita'=>'99',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'39',
				'banyak_jemaat_wanita'=>'77',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'16',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'59',
				'banyak_jemaat_wanita'=>'96',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'16',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'56',
				'banyak_jemaat_wanita'=>'64',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'4',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'14',
				'banyak_jemaat_wanita'=>'16',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'4',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-01',
				'tanggal_selesai'=>'2010-8-01',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'44',
				'banyak_jemaat_wanita'=>'74',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-01',
				'tanggal_selesai'=>'2010-8-01',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'16',
				'banyak_jemaat_wanita'=>'34',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-01',
				'tanggal_selesai'=>'2010-8-01',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-08',
				'tanggal_selesai'=>'2010-8-08',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'45',
				'banyak_jemaat_wanita'=>'76',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-08',
				'tanggal_selesai'=>'2010-8-08',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'11',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-08',
				'tanggal_selesai'=>'2010-8-08',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-15',
				'tanggal_selesai'=>'2010-8-15',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'45',
				'banyak_jemaat_wanita'=>'66',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-15',
				'tanggal_selesai'=>'2010-8-15',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'17',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-15',
				'tanggal_selesai'=>'2010-8-15',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-22',
				'tanggal_selesai'=>'2010-8-22',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'58',
				'banyak_jemaat_wanita'=>'83',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'6',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'5',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-22',
				'tanggal_selesai'=>'2010-8-22',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'17',
				'banyak_jemaat_wanita'=>'14',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'5',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-22',
				'tanggal_selesai'=>'2010-8-22',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-29',
				'tanggal_selesai'=>'2010-8-29',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'62',
				'banyak_jemaat_wanita'=>'76',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-29',
				'tanggal_selesai'=>'2010-8-29',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'15',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-29',
				'tanggal_selesai'=>'2010-8-29',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-05',
				'tanggal_selesai'=>'2010-9-05',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'48',
				'banyak_jemaat_wanita'=>'84',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-05',
				'tanggal_selesai'=>'2010-9-05',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-05',
				'tanggal_selesai'=>'2010-9-05',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-12',
				'tanggal_selesai'=>'2010-9-12',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'48',
				'banyak_jemaat_wanita'=>'76',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-12',
				'tanggal_selesai'=>'2010-9-12',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'15',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-12',
				'tanggal_selesai'=>'2010-9-12',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-19',
				'tanggal_selesai'=>'2010-9-19',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'81',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-19',
				'tanggal_selesai'=>'2010-9-19',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'19',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-19',
				'tanggal_selesai'=>'2010-9-19',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-26',
				'tanggal_selesai'=>'2010-9-26',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'54',
				'banyak_jemaat_wanita'=>'92',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'5',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-26',
				'tanggal_selesai'=>'2010-9-26',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'5',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-26',
				'tanggal_selesai'=>'2010-9-26',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-03',
				'tanggal_selesai'=>'2010-10-03',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'66',
				'banyak_jemaat_wanita'=>'108',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'5',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-03',
				'tanggal_selesai'=>'2010-10-03',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'15',
				'banyak_jemaat_wanita'=>'22',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-03',
				'tanggal_selesai'=>'2010-10-03',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-10',
				'tanggal_selesai'=>'2010-10-10',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'71',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-10',
				'tanggal_selesai'=>'2010-10-10',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'14',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-10',
				'tanggal_selesai'=>'2010-10-10',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-17',
				'tanggal_selesai'=>'2010-10-17',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'53',
				'banyak_jemaat_wanita'=>'76',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-17',
				'tanggal_selesai'=>'2010-10-17',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'15',
				'banyak_jemaat_wanita'=>'28',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-17',
				'tanggal_selesai'=>'2010-10-17',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-24',
				'tanggal_selesai'=>'2010-10-24',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-24',
				'tanggal_selesai'=>'2010-10-24',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-24',
				'tanggal_selesai'=>'2010-10-24',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-31',
				'tanggal_selesai'=>'2010-10-31',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'49',
				'banyak_jemaat_wanita'=>'83',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-31',
				'tanggal_selesai'=>'2010-10-31',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'18',
				'banyak_jemaat_wanita'=>'25',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-31',
				'tanggal_selesai'=>'2010-10-31',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-07',
				'tanggal_selesai'=>'2010-11-07',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'52',
				'banyak_jemaat_wanita'=>'91',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'6',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-07',
				'tanggal_selesai'=>'2010-11-07',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'21',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-07',
				'tanggal_selesai'=>'2010-11-07',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-14',
				'tanggal_selesai'=>'2010-11-14',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'53',
				'banyak_jemaat_wanita'=>'91',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-14',
				'tanggal_selesai'=>'2010-11-14',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-14',
				'tanggal_selesai'=>'2010-11-14',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-21',
				'tanggal_selesai'=>'2010-11-21',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'49',
				'banyak_jemaat_wanita'=>'73',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'5',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-21',
				'tanggal_selesai'=>'2010-11-21',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'8',
				'banyak_jemaat_wanita'=>'10',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-21',
				'tanggal_selesai'=>'2010-11-21',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-28',
				'tanggal_selesai'=>'2010-11-28',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'53',
				'banyak_jemaat_wanita'=>'82',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-28',
				'tanggal_selesai'=>'2010-11-28',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'18',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-28',
				'tanggal_selesai'=>'2010-11-28',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-05',
				'tanggal_selesai'=>'2010-12-05',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'69',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'6',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-05',
				'tanggal_selesai'=>'2010-12-05',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'22',
				'banyak_jemaat_wanita'=>'38',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-05',
				'tanggal_selesai'=>'2010-12-05',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-12',
				'tanggal_selesai'=>'2010-12-12',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'96',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-12',
				'tanggal_selesai'=>'2010-12-12',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'14',
				'banyak_jemaat_wanita'=>'20',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-12',
				'tanggal_selesai'=>'2010-12-12',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-19',
				'tanggal_selesai'=>'2010-12-19',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'49',
				'banyak_jemaat_wanita'=>'76',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'6',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-19',
				'tanggal_selesai'=>'2010-12-19',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'11',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-19',
				'tanggal_selesai'=>'2010-12-19',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-26',
				'tanggal_selesai'=>'2010-12-26',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'35',
				'banyak_jemaat_wanita'=>'52',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-26',
				'tanggal_selesai'=>'2010-12-26',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'8',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-26',
				'tanggal_selesai'=>'2010-12-26',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		/*********************************************************************************************/
		
		//2011
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-02',
				'tanggal_selesai'=>'2011-1-02',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'47',
				'banyak_jemaat_wanita'=>'72',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'6',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-02',
				'tanggal_selesai'=>'2011-1-02',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'21',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-02',
				'tanggal_selesai'=>'2011-1-02',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-09',
				'tanggal_selesai'=>'2011-1-09',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'48',
				'banyak_jemaat_wanita'=>'71',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-09',
				'tanggal_selesai'=>'2011-1-09',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-09',
				'tanggal_selesai'=>'2011-1-09',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-16',
				'tanggal_selesai'=>'2011-1-16',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'48',
				'banyak_jemaat_wanita'=>'83',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-16',
				'tanggal_selesai'=>'2011-1-16',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-16',
				'tanggal_selesai'=>'2011-1-16',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-23',
				'tanggal_selesai'=>'2011-1-23',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'47',
				'banyak_jemaat_wanita'=>'80',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'4',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-23',
				'tanggal_selesai'=>'2011-1-23',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-23',
				'tanggal_selesai'=>'2011-1-23',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-30',
				'tanggal_selesai'=>'2011-1-30',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-30',
				'tanggal_selesai'=>'2011-1-30',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-30',
				'tanggal_selesai'=>'2011-1-30',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-06',
				'tanggal_selesai'=>'2011-2-06',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'57',
				'banyak_jemaat_wanita'=>'82',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-06',
				'tanggal_selesai'=>'2011-2-06',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-06',
				'tanggal_selesai'=>'2011-2-06',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-13',
				'tanggal_selesai'=>'2011-2-13',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'68',
				'banyak_jemaat_wanita'=>'92',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-13',
				'tanggal_selesai'=>'2011-2-13',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'14',
				'banyak_jemaat_wanita'=>'12',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-13',
				'tanggal_selesai'=>'2011-2-13',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-20',
				'tanggal_selesai'=>'2011-2-20',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'47',
				'banyak_jemaat_wanita'=>'79',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'6',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-20',
				'tanggal_selesai'=>'2011-2-20',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'10',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-20',
				'tanggal_selesai'=>'2011-2-20',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'50',
				'banyak_jemaat_wanita'=>'88',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'13',
				'banyak_jemaat_wanita'=>'10',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		/*********************************************************************************************/
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-06',
				'tanggal_selesai'=>'2011-3-06',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'36',
				'banyak_jemaat_wanita'=>'73',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-06',
				'tanggal_selesai'=>'2011-3-06',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'12',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-06',
				'tanggal_selesai'=>'2011-3-06',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-13',
				'tanggal_selesai'=>'2011-3-13',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'47',
				'banyak_jemaat_wanita'=>'88',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'5',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-13',
				'tanggal_selesai'=>'2011-3-13',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'14',
				'banyak_jemaat_wanita'=>'18',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'3',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-13',
				'tanggal_selesai'=>'2011-3-13',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-20',
				'tanggal_selesai'=>'2011-3-20',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'59',
				'banyak_jemaat_wanita'=>'63',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-20',
				'tanggal_selesai'=>'2011-3-20',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'33',
				'banyak_jemaat_wanita'=>'47',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'3',
				'banyak_penatua_wanita'=>'4',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-20',
				'tanggal_selesai'=>'2011-3-20',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>1,
				'nama_jenis_kegiatan'=>'kebaktian umum 1',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-27',
				'tanggal_selesai'=>'2011-3-27',
				'jam_mulai'=>'07:00:00.000000',
				'jam_selesai'=>'08:30:00.000000',
				'banyak_jemaat_pria'=>'51',
				'banyak_jemaat_wanita'=>'73',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'6',
				'banyak_penatua_wanita'=>'8',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'2',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>2,
				'nama_jenis_kegiatan'=>'kebaktian umum 2',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-27',
				'tanggal_selesai'=>'2011-3-27',
				'jam_mulai'=>'09:30:00.000000',
				'jam_selesai'=>'11:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'2',
				'banyak_penatua_wanita'=>'2',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>3,
				'nama_jenis_kegiatan'=>'kebaktian umum 3',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-27',
				'tanggal_selesai'=>'2011-3-27',
				'jam_mulai'=>'17:00:00.000000',
				'jam_selesai'=>'18:30:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		/*********************************************************************************************/
		
		//---------kebaktian lain
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'29',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'4',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'3',
				'banyak_komisi_wanita'=>'9',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'31',
				'banyak_jemaat_wanita'=>'21',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'14',
				'banyak_simpatisan_wanita'=>'15',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'27',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'9',
				'banyak_simpatisan_wanita'=>'13',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'33',
				'banyak_jemaat_wanita'=>'32',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'5',
				'banyak_simpatisan_wanita'=>'14',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'7',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'7',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-04',
				'tanggal_selesai'=>'2010-4-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-11',
				'tanggal_selesai'=>'2010-4-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-18',
				'tanggal_selesai'=>'2010-4-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-4-25',
				'tanggal_selesai'=>'2010-4-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'28',
				'banyak_jemaat_wanita'=>'32',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'5',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'28',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'17',
				'banyak_simpatisan_wanita'=>'13',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'30',
				'banyak_jemaat_wanita'=>'29',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'13',
				'banyak_simpatisan_wanita'=>'5',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'7',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'5',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'7',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-02',
				'tanggal_selesai'=>'2010-5-02',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-09',
				'tanggal_selesai'=>'2010-5-09',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-16',
				'tanggal_selesai'=>'2010-5-16',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-23',
				'tanggal_selesai'=>'2010-5-23',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-5-30',
				'tanggal_selesai'=>'2010-5-30',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'34',
				'banyak_jemaat_wanita'=>'19',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'7',
				'banyak_simpatisan_wanita'=>'10',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'30',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'11',
				'banyak_simpatisan_wanita'=>'15',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'27',
				'banyak_jemaat_wanita'=>'22',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'17',
				'banyak_simpatisan_wanita'=>'19',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'31',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'5',
				'banyak_simpatisan_wanita'=>'10',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'2',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'4',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'7',
				'banyak_jemaat_wanita'=>'5',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-06',
				'tanggal_selesai'=>'2010-6-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-13',
				'tanggal_selesai'=>'2010-6-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-20',
				'tanggal_selesai'=>'2010-6-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-6-27',
				'tanggal_selesai'=>'2010-6-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'16',
				'banyak_jemaat_wanita'=>'21',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'8',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'30',
				'banyak_jemaat_wanita'=>'33',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'1',
				'banyak_simpatisan_wanita'=>'9',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'17',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'12',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-04',
				'tanggal_selesai'=>'2010-7-04',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-11',
				'tanggal_selesai'=>'2010-7-11',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-18',
				'tanggal_selesai'=>'2010-7-18',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>8,
				'nama_jenis_kegiatan'=>'kebaktian pemuda',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-7-25',
				'tanggal_selesai'=>'2010-7-25',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-01',
				'tanggal_selesai'=>'2010-9-01',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'31',
				'banyak_jemaat_wanita'=>'22',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'11',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-08',
				'tanggal_selesai'=>'2010-8-08',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'21',
				'banyak_jemaat_wanita'=>'22',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'13',
				'banyak_simpatisan_wanita'=>'6',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'2',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-15',
				'tanggal_selesai'=>'2010-8-15',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'33',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'18',
				'banyak_simpatisan_wanita'=>'12',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-22',
				'tanggal_selesai'=>'2010-8-22',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'26',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'15',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-29',
				'tanggal_selesai'=>'2010-8-29',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'25',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'11',
				'banyak_simpatisan_wanita'=>'7',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-01',
				'tanggal_selesai'=>'2010-8-01',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-08',
				'tanggal_selesai'=>'2010-8-08',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-15',
				'tanggal_selesai'=>'2010-8-15',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'8',
				'banyak_jemaat_wanita'=>'10',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-22',
				'tanggal_selesai'=>'2010-8-22',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'10',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'1',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-8-29',
				'tanggal_selesai'=>'2010-8-29',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-05',
				'tanggal_selesai'=>'2010-9-05',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'27',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'7',
				'banyak_simpatisan_wanita'=>'5',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-12',
				'tanggal_selesai'=>'2010-9-12',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'21',
				'banyak_jemaat_wanita'=>'11',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-19',
				'tanggal_selesai'=>'2010-9-19',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'25',
				'banyak_jemaat_wanita'=>'29',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'11',
				'banyak_simpatisan_wanita'=>'6',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-26',
				'tanggal_selesai'=>'2010-9-26',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'32',
				'banyak_jemaat_wanita'=>'31',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'6',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-05',
				'tanggal_selesai'=>'2010-9-05',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-12',
				'tanggal_selesai'=>'2010-9-12',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-19',
				'tanggal_selesai'=>'2010-9-19',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-9-26',
				'tanggal_selesai'=>'2010-9-26',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'8',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-03',
				'tanggal_selesai'=>'2010-10-03',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'27',
				'banyak_jemaat_wanita'=>'31',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'18',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-10',
				'tanggal_selesai'=>'2010-10-10',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-17',
				'tanggal_selesai'=>'2010-10-17',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'27',
				'banyak_jemaat_wanita'=>'30',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'6',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-24',
				'tanggal_selesai'=>'2010-10-24',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'26',
				'banyak_jemaat_wanita'=>'29',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'15',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-31',
				'tanggal_selesai'=>'2010-10-31',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-03',
				'tanggal_selesai'=>'2010-10-03',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-10',
				'tanggal_selesai'=>'2010-10-10',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'8',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-17',
				'tanggal_selesai'=>'2010-10-17',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'9',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-10-24',
				'tanggal_selesai'=>'2010-10-24',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-07',
				'tanggal_selesai'=>'2010-11-07',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'25',
				'banyak_jemaat_wanita'=>'25',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'4',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'1',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-14',
				'tanggal_selesai'=>'2010-11-14',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'22',
				'banyak_jemaat_wanita'=>'28',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'9',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-21',
				'tanggal_selesai'=>'2010-11-21',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'20',
				'banyak_jemaat_wanita'=>'17',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'10',
				'banyak_simpatisan_wanita'=>'17',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-11-28',
				'tanggal_selesai'=>'2010-11-28',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'25',
				'banyak_jemaat_wanita'=>'26',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'5',
				'banyak_simpatisan_wanita'=>'6',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-05',
				'tanggal_selesai'=>'2010-12-05',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'28',
				'banyak_jemaat_wanita'=>'29',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'7',
				'banyak_simpatisan_wanita'=>'10',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-12',
				'tanggal_selesai'=>'2010-12-12',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'27',
				'banyak_jemaat_wanita'=>'27',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'12',
				'banyak_simpatisan_wanita'=>'11',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'5',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-19',
				'tanggal_selesai'=>'2010-12-19',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'32',
				'banyak_jemaat_wanita'=>'34',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'7',
				'banyak_simpatisan_wanita'=>'7',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-26',
				'tanggal_selesai'=>'2010-12-26',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'17',
				'banyak_jemaat_wanita'=>'18',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-05',
				'tanggal_selesai'=>'2010-12-05',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'8',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-12',
				'tanggal_selesai'=>'2010-12-12',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-19',
				'tanggal_selesai'=>'2010-12-19',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'7',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2010-12-26',
				'tanggal_selesai'=>'2010-12-26',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-02',
				'tanggal_selesai'=>'2011-1-02',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'17',
				'banyak_jemaat_wanita'=>'14',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'2',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'4',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-09',
				'tanggal_selesai'=>'2011-1-09',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'28',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'2',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-16',
				'tanggal_selesai'=>'2011-1-16',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'34',
				'banyak_jemaat_wanita'=>'25',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'5',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'3',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-23',
				'tanggal_selesai'=>'2011-1-23',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'26',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'11',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'2',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-1-30',
				'tanggal_selesai'=>'2011-1-30',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'10',
				'banyak_jemaat_wanita'=>'13',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'4',
				'banyak_simpatisan_wanita'=>'4',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'9',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-06',
				'tanggal_selesai'=>'2011-2-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'27',
				'banyak_jemaat_wanita'=>'36',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'12',
				'banyak_simpatisan_wanita'=>'2',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'1',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-13',
				'tanggal_selesai'=>'2011-2-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'22',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'4',
				'banyak_simpatisan_wanita'=>'5',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'7',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-20',
				'tanggal_selesai'=>'2011-2-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'24',
				'banyak_jemaat_wanita'=>'29',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'4',
				'banyak_simpatisan_wanita'=>'7',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'29',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'9',
				'banyak_simpatisan_wanita'=>'11',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'4',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-06',
				'tanggal_selesai'=>'2011-2-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-13',
				'tanggal_selesai'=>'2011-2-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-20',
				'tanggal_selesai'=>'2011-2-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-06',
				'tanggal_selesai'=>'2011-3-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'22',
				'banyak_jemaat_wanita'=>'26',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'6',
				'banyak_simpatisan_wanita'=>'3',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-13',
				'tanggal_selesai'=>'2011-3-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'25',
				'banyak_jemaat_wanita'=>'25',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'13',
				'banyak_simpatisan_wanita'=>'8',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'1',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'1',
				'banyak_komisi_wanita'=>'1',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-20',
				'tanggal_selesai'=>'2011-3-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'23',
				'banyak_jemaat_wanita'=>'23',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'7',
				'banyak_simpatisan_wanita'=>'5',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'2',
				'banyak_komisi_wanita'=>'6',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>6,
				'nama_jenis_kegiatan'=>'kebaktian anak',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-2-27',
				'tanggal_selesai'=>'2011-2-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//-----------------------------------------------------------
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-06',
				'tanggal_selesai'=>'2011-3-06',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-13',
				'tanggal_selesai'=>'2011-3-13',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-20',
				'tanggal_selesai'=>'2011-3-20',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'0',
				'banyak_jemaat_wanita'=>'0',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		DB::table('kegiatan')->insert(
			array(
				'id_jenis_kegiatan'=>7,
				'nama_jenis_kegiatan'=>'kebaktian remaja',
				'id_gereja'=>'2',
				'tanggal_mulai'=>'2011-3-27',
				'tanggal_selesai'=>'2011-3-27',
				'jam_mulai'=>'00:00:00.000000',
				'jam_selesai'=>'00:00:00.000000',
				'banyak_jemaat_pria'=>'6',
				'banyak_jemaat_wanita'=>'9',
				'banyak_jemaat'=>'0',
				'banyak_simpatisan_pria'=>'0',
				'banyak_simpatisan_wanita'=>'0',
				'banyak_simpatisan'=>'0',
				'banyak_penatua_pria'=>'0',
				'banyak_penatua_wanita'=>'0',
				'banyak_penatua'=>'0',
				'banyak_pemusik_pria'=>'0',
				'banyak_pemusik_wanita'=>'0',
				'banyak_pemusik'=>'0',
				'banyak_komisi_pria'=>'0',
				'banyak_komisi_wanita'=>'0',
				'banyak_komisi'=>'0',
				'keterangan'=>'',
				'deleted'=>0
			)
		);
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
	}
	
	public function export_anggota($id_gereja)
	{
		$data = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
		
		$gereja = Gereja::find($id_gereja);
		$title_table = 'DATA ANGGOTA JEMAAT '.$gereja->nama.' - BANDUNG';
		
		//setting header		
		$nama_gereja = array(
			$title_table,'','','','','','','','',''
			,'','','','','','','','','',''
			,'','','','','','','','','',''
		);		
		$tanggal = array(
			'','','','','','','','','',''
			,'','','','','','','','','Tanggal :', (string)Carbon::now()
			,'','','','','','','','','',''
		);
		$blank = array(
			'','','','','','','','','',''
			,'','','','','','','','','',''
			,'','','','','','','','','',''
		);		
		$header_table_1 = array(
			'No.','No.','No.','Nama','','Alamat','Telp.','Kodepos','Kota','Rayon'
			,'Wilayah','Kecamatan','Kelurahan','Gender','Status','Umur','Pendidikan','Pekerjaan','Kelompok','Tgl'
			,'Tgl','Tgl','Atestasi','','Meninggal','Nama Ayah','No.Anggota','Nama Ibu','No.Anggota','Keterangan'
		);
		$header_table_2 = array(
			'','Reg.','Induk','','','','','','',''
			,'','','','','Anggota','','','','Etnis','Lahir'
			,'Baptis','Sidi','A.Masuk','A.Keluar','','','','','',''
		);		
		
		try{
			//START INSERT TO ROW
			Excel::create('Export Data Anggota', function($excel) use ($data,$nama_gereja,$tanggal,$blank,$header_table_1,$header_table_2){

				$excel->sheet('DATA BASE ANGGOTA', function($sheet) use ($data,$nama_gereja,$tanggal,$blank,$header_table_1,$header_table_2){																		
					//row 2 - nama gereja
					$sheet->row(2, $nama_gereja);
					
					//row 3 - tanggal
					$sheet->row(3, $tanggal);
					
					//row 5 - header table 1
					$sheet->row(5, $header_table_1);
					
					//row 6 - header table 2
					$sheet->row(6, $header_table_2);
					
					//start data di row 8
					$row_num  = 8;					
					$no = 1;
					foreach($data as $row_data)
					{
						$alamat = Alamat::where('id_anggota', '=', $row_data->id)->first();
						
						if($row_data->gender == 1){
							$gender = "P";
						}else{
							$gender = "W";
						}
						
						$each_data = array(
							$no, //1 no
							'', //2 no reg
							$row_data->no_anggota, //3 no induk = no anggota
							$row_data->nama_depan, //4 nama
							'Jl.', //5 jl
							$alamat->jalan, //6 alamat = jalan
							$row_data->telp, //7 telp 
							$alamat->kodepos, //8 kodepos
							$alamat->kota, //9 kota
							'', //10 rayon
							$row_data->wilayah, //11 wilayah
							'', //12 kecamatan
							'', //13 kelurahan
							$gender, //14 gender
							'', //15 status anggota														
							date_diff(date_create($row_data->tanggal_lahir), date_create(Carbon::now()))->y, //16 umur
							$row_data->pendidikan, //17 pendidikan
							$row_data->pekerjaan, //18 pekerjaan
							$row_data->etnis, //19 kelompok etnis
							$row_data->tanggal_lahir, //20 tanggal lahir
							'', //21 tanggal baptis
							'', //22 tanggal sidi
							'', //23 tanggal atestasi masuk
							'', //24 tanggal atestasi keluar
							'', //25 tanggal meninggal
							'', //26 nama ayah
							'', //27 no anggota ayah
							'', //28 nama ibu
							'', //29 no anggota ibu
							'' //30 keterangan
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
						
						$sheet->mergeCells('W5:X5');//merge atestasi												
						
						$sheet->setWidth('A', 5);
						
						$sheet->cells('A2', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								'size'       => '14',
								'bold'       =>  true
							));
						});
						
						$sheet->cells('A5:AD6', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
																												
						$sheet->setBorder('A8:D'.$last_row, 'thin'); //kiri alamat
						$sheet->setBorder('G8:AD'.$last_row, 'thin'); //kanan alamat
						$sheet->cells('E8:F'.$last_row, function($cells) {						
							$cells->setBorder('thin', 'none', 'thin', 'none');
						});//tengah alamat
								
						// $sheet->cells('A5:AD6', function($cells) {						
							// $cells->setBorder('none', 'solid', 'none', 'solid');
						// });		//header table (kiri kanan)						
						// $sheet->cells('A5:AD5', function($cells) {						
							// $cells->setBorder('solid', 'none', 'none', 'none');
						// });		//header table (atas)
						// $sheet->cells('A6:AD6', function($cells) {						
							// $cells->setBorder('none', 'none', 'solid', 'none');
						// });		//header table (bawah)						
						// $sheet->cells('W6:X6', function($cells) {						
							// $cells->setBorder('solid', 'none', 'none', 'none');
						// });	//atas atestasi masuk keluar
						
						$sheet->cells('A5:AD6', function($cells) {							
							$cells->setBackground('#66FFCC');
						}); //background color header table												
						
						$sheet->cells('S3:T3', function($cells) {							
							$cells->setBackground('#66FF99');							
						}); //background color tanggal
						
					//end styling
					
				});

			})->export('xlsx');
			
			return "Berhasil";
		}catch(Exception $e){
			return $e;
		}		
	}
	
	public function export_kegiatan($id_jenis_kegiatan=0,$id_gereja=0){
	
		$kegiatan = new Kegiatan();
		
		/*$where ='';
		if($id_jenis_kegiatan != 0){
			$where.='id_jenis_kegiatan = '.$id_jenis_kegiatan;
		}
		
		if($id_gereja !=0){
			if($where==''){
				$where.='id_gereja = '.$id_gereja;
			}
			else{
				$where.=' and id_gereja = '.$id_gereja;
			}
			
		}*/

		/*if($dateF != 0 || $dateT=0){
			if($where==''){
				$where.='tanggal_mulai >= "'.$dateF.'" and tanggal_selesai <= "'.$dateTo.'"';
			}
			else{
				$where.=' and tanggal_mulai >= "'.$dateF.'" and tanggal_selesai <= "'.$dateTo.'"';
			}
		}*/
		
		/*if($where!=''){
			$result = $kegiatan->whereRaw($where)->orderBy('tanggal_mulai')->orderBy('id_jenis_kegiatan')->get();
		}
		else{
			$result = $kegiatan->where('id_gereja','=',$id_gereja)->all();
		}*/
		
		$result = $kegiatan->where('id_gereja','=',$id_gereja)->get();
		
		$arr = array();
		
		$temp_tanggal = "";
		
		foreach($result as $key){
			if($temp_tanggal!=$key->tanggal_mulai){
				$row_arr = array($key->tanggal_mulai,$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_komisi_pria,$key->banyak_komisi_wanita,$key->banyak_komisi_pria+$key->banyak_komisi_wanita);
			}
			else{
				$row_arr = array('',$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_komisi_pria,$key->banyak_komisi_wanita,$key->banyak_komisi_pria+$key->banyak_komisi_wanita);
			}
			$temp_tanggal=$key->tanggal_mulai;
			array_push($arr,$row_arr);
		}
		
		// create excel
		try{
			//inisialisasi
			$data = array();
			$tahun_pelayanan = '2010-2011';
			$alamat = 'GKI Ayudia 10, Bandung';
			
			//setting header
			$nama_gereja = array('LAPORAN BULANAN LKKJ GKI SW JABAR','','','','','','','','','','','','','','','','','','','','Form:A');
			$pelayanan_gereja = array('Tahun Pelayanan: '.$tahun_pelayanan,'','','','','','','','','','','','','','','','','','','','');
			$alamat_gereja = array('Jemaat GKI: '.$alamat,'','','','','','','','','','','','','','','','','','','','');
			$blank = array('','','','','','','','','','','','','','','','','','','','','');
			
			$bulan = 1;
			
			$tahun = 2015;
			
			//setting header table
			$header1 = array('Minggu Tanggal','Jumlah Anggota Jemaat Dewasa Terdaftar','','','Jenis Kebaktian','JUMLAH KEHADIRAN DALAM KEBAKTIAN MINGGU','','','','','','','','','','','','','','','TOTAL Angg + Simp');
			$header2 = array('','','','','','Anggota Jemaat','','','Simpatisan **','','','Penatua','','','Pemusik Gerejawi','','','Sub-Total Anggota','','','');
			$header3 = array('','Pria','Wnt','Jml','','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','');
			
			//footer
			
			$footer1 = array('','','','','','','','','','','','','','','','','','','','','');
			$footer2 = array('Catatan:','','','','','','','','','','','','','','','','','','','','');
			$footer3 = array('Pos Jem* : Total kehadiran di semua Pos. Jemaat yang ada ','','','','','','','','','','Diperiksa Oleh,','','','','','a.n. MJ '.$alamat,'','','','','');
			$footer4 = array('','','','','','','','','','','','','','','','','','','','','');
			$footer5 = array('','','','','','','','','','','','','','','','','','','','','');
			$footer6 = array('','','','','','','','','','','','','','','','','','','','','');
			$footer7 = array('','','','','','','','','','','.....................................','','','','.....................................','','','','','.....................................','');
			$footer8 = array('','','','','','','','','','','PIC LKKJ','','','','Ketua Umum','','','','','Sek. Umum','');
			$footer9 = array('','','','','','','','','','','','','','','','','','','','','');
			$footer10 = array('','','','','','','','','','','','','','','','','','','','','');
			
			//array for styling
			$array_header = array();
			$array_data = array();
			
			
			$counter_bulan = 0;
			$counter_data = 0;
			for($i = 0; $i<10;$i++){
				$counter_bulan++;
				array_push($array_header,$counter_bulan);
				
				$counter_bulan+=8;
				
				
				
				$title = array('1. Data Kehadiran Kebaktian Minggu.','','','','','','','','','','','','','','','','','',$this->getMonthFromNumber($bulan),'',$tahun);
				
				//generate table data
				for($j=0;$j<5;$j++){
					$counter_bulan++;
					$counter_data++;
				}
				array_push($array_data,$counter_data);
				
				$counter_data = 0;
				$counter_bulan+=10;
				
				$bulan++;
				$tahun++;
				array_push($data,$nama_gereja);
				array_push($data,$pelayanan_gereja);
				array_push($data,$alamat_gereja);
				array_push($data,$blank);
				array_push($data,$title);
				array_push($data,$blank);
				array_push($data,$header1);
				array_push($data,$header2);
				array_push($data,$header3);
				
				//input data start
				//random data
				array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);
				//end of random data
				//input data end
				array_push($data,$footer1);
				array_push($data,$footer2);
				array_push($data,$footer3);
				array_push($data,$footer4);
				array_push($data,$footer5);
				array_push($data,$footer6);
				array_push($data,$footer7);
				array_push($data,$footer8);
				array_push($data,$footer9);
				array_push($data,$footer10);
				
			}
			
			/*foreach($arr as $key){
				array_push($data,$key);
			}*/
			
			Excel::create('Export Data Kebaktian', function($excel) use($data,$array_header,$array_data) {

				$excel->sheet('Keb.Umum', function($sheet) use($data,$array_header,$array_data){
					
					$sheet->fromArray($data, null, 'A1', true, false);
					$sheet->setAutoSize(true);
					$counter = 0;
					foreach($array_header as $key){
						$jumlah_data = $array_data[$counter];
						$counter++;
						//header
						$sheet->mergeCells('A'.($key).':T'.($key));
						$sheet->setBorder('U'.$key, 'thick');
						$sheet->cells('A'.($key).':T'.($key),function($cells){
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '14',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});
						
						$sheet->cells('U'.($key),function($cells){
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});
						
						
						
						
						$sheet->mergeCells('A'.($key+1).':U'.($key+1));
						$sheet->cells('A'.($key+1).':U'.($key+1),function($cells){
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '12',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});
						$sheet->mergeCells('A'.($key+2).':U'.($key+2));
						$sheet->cells('A'.($key+2).':U'.($key+2),function($cells){
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '12',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});
						
						//blank
						$sheet->mergeCells('A'.($key+3).':U'.($key+3));
						
						//title
						$sheet->mergeCells('A'.($key+4).':R'.($key+4));
						
						$sheet->cells('A'.($key+4).':R'.($key+4),function($cells){
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '12',
								'bold'       =>  true
							));
						});
						
						$sheet->mergeCells('S'.($key+4).':T'.($key+4));
						
						$sheet->setBorder('S'.($key+4).':U'.($key+4), 'thick');
						
						$sheet->cells('S'.($key+4).':U'.($key+4),function($cells) {
							$cells->setAlignment('center');
						});
						
						
						//blank
						$sheet->mergeCells('A'.($key+5).':U'.($key+5));
					
						//table header start
						
						//minggu tanggal
						$sheet->mergeCells('A'.($key+6).':A'.($key+8));
						
						//jumlah anggota
						
						$sheet->mergeCells('B'.($key+6).':D'.($key+7));
						
						//jenis kebaktian
						$sheet->mergeCells('E'.($key+6).':E'.($key+8));
						
						//jumlah kehadiran
						$sheet->mergeCells('F'.($key+6).':T'.($key+6));
						//anggota jemaat
						$sheet->mergeCells('F'.($key+7).':H'.($key+7));
						//Simpatisan
						$sheet->mergeCells('I'.($key+7).':K'.($key+7));
						//penatua
						$sheet->mergeCells('L'.($key+7).':N'.($key+7));
						//pemusik
						$sheet->mergeCells('O'.($key+7).':Q'.($key+7));
						//Sub-Total
						$sheet->mergeCells('R'.($key+7).':T'.($key+7));
						
						//total angg+simp
						$sheet->mergeCells('U'.($key+6).':U'.($key+8));
						
						
						
						$sheet->cells('A'.($key+6).':U'.($key+8),function($cells) {
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '9',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
							$cells->setValignment('center');
						});
						
						$sheet->setBorder('A'.($key+6).':U'.($key+8), 'thin');
						
						$sheet->setWidth(array(
							'A'     =>  15,
							'B'     =>  7.2,
							'C'     =>  7.2,
							'D'     =>  7.2,
							'E'     =>  17,
							'F'     =>  7.2,
							'G'     =>  7.2,
							'H'     =>  7.2,
							'I'     =>  7.2,
							'J'     =>  7.2,
							'K'     =>  7.2,
							'L'     =>  7.2,
							'M'     =>  7.2,
							'N'     =>  7.2,
							'O'     =>  7.2,
							'P'     =>  7.2,
							'Q'     =>  7.2,
							'R'     =>  7.2,
							'S'     =>  7.,
							'T'     =>  7.2,
							'U'     =>  20.14
						));
						
						
						//data
						
						$sheet->setBorder('A'.($key+9).':U'.($key+9+$jumlah_data-1), 'thin');
						
						
						//footer
						//catatan
						$sheet->mergeCells('A'.($key+9+$jumlah_data+2).':E'.($key+9+$jumlah_data+2));
						
						$sheet->mergeCells('K'.($key+9+$jumlah_data+2).':M'.($key+9+$jumlah_data+2));
						
						$sheet->mergeCells('P'.($key+9+$jumlah_data+2).':U'.($key+9+$jumlah_data+2));
						
						$sheet->cells('P'.($key+9+$jumlah_data+2).':U'.($key+9+$jumlah_data+2),function($cells) {
							$cells->setAlignment('right');
						});
						
						//tanda tangan
						
						$sheet->mergeCells('K'.($key+9+$jumlah_data+6).':M'.($key+9+$jumlah_data+6));
						
						$sheet->mergeCells('O'.($key+9+$jumlah_data+6).':R'.($key+9+$jumlah_data+6));
						
						$sheet->mergeCells('T'.($key+9+$jumlah_data+6).':U'.($key+9+$jumlah_data+6));
						
						$sheet->mergeCells('K'.($key+9+$jumlah_data+7).':M'.($key+9+$jumlah_data+7));
						
						$sheet->mergeCells('O'.($key+9+$jumlah_data+7).':R'.($key+9+$jumlah_data+7));
						
						$sheet->mergeCells('T'.($key+9+$jumlah_data+7).':U'.($key+9+$jumlah_data+7));
						
						$sheet->cells('K'.($key+9+$jumlah_data+6).':U'.($key+9+$jumlah_data+7),function($cells) {
							$cells->setAlignment('center');
						});
						
						$sheet->cells('K'.($key+9+$jumlah_data+6).':U'.($key+9+$jumlah_data+6),function($cells) {
							$cells->setFont(array(
								'underline' => true
							));
						});
						
						
					}
					
					
					/*$sheet->cells('A1:Q1',function($cells){
						$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
						));
					});
					
					$sheet->cells('A3:Q3',function($cells){
						$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '12',
							'bold'       =>  true
						));
					});
					
					$sheet->cells('A1:Q'.(count($data)),function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('middle');
					});
					
					$sheet->setBorder('A5:Q'.(count($data)), 'thin');*/
				});
			})->export('xlsx');
			//})->store('xlsx','assets/file_excel');
			
			return "Success";
		}
		catch(Exception $e){
			return $e;
		}
		
		
	}
	
	public function import_kegiatan($id_gereja){
		// $nama_gereja = Session::get('nama');
	
		//get uploaded file
		$destinationPath = 'assets/file_excel/kebaktian/'.$id_gereja.'/';
		// $destinationPath = 'assets/file_excel/kebaktian/'.$nama_gereja.'/';		
		$filename = '';
		
		if(Input::hasFile('excel_file')){
			$file = Input::file('excel_file');
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		else{
			return 'Tidak ada file yang dipilih';
		}
		
		if($uploadSuccess){
			//return $destinationPath.$filename;
			$file_path = $destinationPath.$filename;
			//return $file_path;
			$result = Excel::selectSheets('Keb.Umum')->load($file_path, function($reader) use($id_gereja){
				// Getting all results
				$reader->skip(5);
				$reader->noHeading();
				$results = $reader->get();
				$tanggal = '';
				//$reader->each(function($row) use($id_gereja){
				foreach($results as $row){
					if($row[1] != NULL){
						//tanggal
						$tanggal = $row[1];
					}
					else{
						//$tanggal = '';
					}
					
					$nama_kegiatan = $row[2];
					
					//select
					
					//PREVENTION :
					// supaya tidak ada record kebaktian yang double, pada gereja tertentu, tanggal tertentu, jenis kegiatan tertentu
					$kegiatan = Kegiatan::where('id_gereja','=',$id_gereja)->where('tanggal_mulai','=',$tanggal)->where('nama_jenis_kegiatan','=',$nama_kegiatan)->get();
					
					//if exist
					if(count($kegiatan) == 1){
						//update
						DB::table('kegiatan')->where('id',$kegiatan[0]->id)->update(
							array(
								'tanggal_mulai'=>$tanggal,
								'tanggal_selesai'=>$tanggal,
								'jam_mulai'=>'00:00:00.000000',
								'jam_selesai'=>'00:00:00.000000',
								'banyak_jemaat_pria'=> $row[3],
								'banyak_jemaat_wanita'=> $row[4],
								'banyak_jemaat'=>'0',
								'banyak_simpatisan_pria'=> $row[6],
								'banyak_simpatisan_wanita'=> $row[7],
								'banyak_simpatisan'=>'0',
								'banyak_penatua_pria'=> $row[9],
								'banyak_penatua_wanita'=>$row[10],
								'banyak_penatua'=>'0',
								'banyak_pemusik_pria'=> $row[12],
								'banyak_pemusik_wanita'=> $row[13],
								'banyak_pemusik'=>'0',
								'banyak_komisi_pria'=> $row[15],
								'banyak_komisi_wanita'=> $row[16],
								'banyak_komisi'=>'0',
								'keterangan'=>'',
								'deleted'=>0,
								'updated_at'=>Carbon::now()
							)
						);
					}
					else{
						$jenis_kegiatan = JenisKegiatan::where('nama_kegiatan','=',$nama_kegiatan)->get()[0]->id;
						//insert
						DB::table('kegiatan')->insert(
							array(
								'id_jenis_kegiatan'=>$jenis_kegiatan,
								'nama_jenis_kegiatan'=>$nama_kegiatan,
								'id_gereja'=>$id_gereja,
								'tanggal_mulai'=>$tanggal,
								'tanggal_selesai'=>$tanggal,
								'jam_mulai'=>'00:00:00.000000',
								'jam_selesai'=>'00:00:00.000000',
								'banyak_jemaat_pria'=> $row[3],
								'banyak_jemaat_wanita'=> $row[4],
								'banyak_jemaat'=>'0',
								'banyak_simpatisan_pria'=> $row[6],
								'banyak_simpatisan_wanita'=> $row[7],
								'banyak_simpatisan'=>'0',
								'banyak_penatua_pria'=> $row[9],
								'banyak_penatua_wanita'=>$row[10],
								'banyak_penatua'=>'0',
								'banyak_pemusik_pria'=> $row[12],
								'banyak_pemusik_wanita'=> $row[13],
								'banyak_pemusik'=>'0',
								'banyak_komisi_pria'=> $row[15],
								'banyak_komisi_wanita'=> $row[16],
								'banyak_komisi'=>'0',
								'keterangan'=>'',
								'deleted'=>0
							)
						);
					}
				}
			});
			
			return 'Berhasil';
		}
		else{
			return 'Gagal upload file';
		}
		
		//import begin
		
		

	}
	
	/*
	public function tes_date()
	{
		//get uploaded file
		$destinationPath = 'assets/file_excel/anggota/'.$id_gereja.'/';
		// $destinationPath = 'assets/file_excel/kebaktian/'.$nama_gereja.'/';		
		$filename = '';
		
		if(Input::hasFile('excel_file')){
			$file = Input::file('excel_file');
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		else{
			return 'Tidak ada file yang dipilih';
		}
		$message = 'no success';
		if($uploadSuccess){
			$message = "Berhasil";
			//return $destinationPath.$filename;
			$file_path = $destinationPath.$filename;
			//return $file_path;
			$result = Excel::selectSheets('Anggota')->load($file_path, function($reader) use($id_gereja){				
															
				// Getting all results
				$reader->skip(7); //skrng di row 8
				$reader->noHeading();
				$results = $reader->get();	
				
				$message = $results[8][20];
								
			});
			
			// return 'Berhasil';
			return $message;
		}
		
		return $message;
	}
	*/
	
	public function import_anggota($id_gereja){
		// $nama_gereja = Session::get('nama');
	
		//get uploaded file
		$destinationPath = 'assets/file_excel/anggota/'.$id_gereja.'/';
		// $destinationPath = 'assets/file_excel/kebaktian/'.$nama_gereja.'/';		
		$filename = '';
		
		if(Input::hasFile('excel_file')){
			$file = Input::file('excel_file');
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
		}
		else{
			return 'Tidak ada file yang dipilih';
		}
		
		if($uploadSuccess){
			
			//return $destinationPath.$filename;
			$file_path = $destinationPath.$filename;
			//return $file_path;								
					
			$result = Excel::selectSheets('DATA BASE ANGGOTA')->load($file_path, function($reader) use($id_gereja){				
															
				// Getting all results
				$reader->skip(7); //maka skrng di row 8
				$reader->noHeading();
				$results = $reader->get();	
				
				//$reader->each(function($row) use($id_gereja){				
				// $count = DB::table('anggota')->orderBy('id', 'desc')->first()->id; //sementara no_anggota = id row di table				
				$last_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
				$last_number = count($last_no_anggota) + 1;
				
				foreach($results as $row)
				{													
										
					//no_anggota					
					// if($row[3] == null){
						// $no_anggota = $count; //harusnya generate pake format no_anggota, sementara pake id row table
						// $count++;						
					// }else{					
						// $no_anggota = $row[3];
						// $count++;
					// }					
					//nama_depan
					if($row[4] == null){
						$nama_depan = "";
					}else{
						$nama_depan = $row[4];
					}
					//alamat
					if($row[6] == null){
						$jalan = "";
					}else{
						$jalan = $row[6];
					}
					//telp
					if($row[7] == null){
						$telp = "";
					}else{
						$telp = $row[7];
					}
					//kodepos
					if($row[8] == null){
						$kodepos = "";
					}else{
						$kodepos = $row[8];
					}					
					//kota
					if($row[9] == null){
						$kota = "";
					}else{
						$kota = $row[9];
					}
					//gender
					if($row[14] == null){
						$gender = -1;
					}else if($row[14] == "P" || $row[14] == "p"){
						$gender = 1;
					}else{	//W = w
						$gender = 0;
					}
					//pendidikan
					if($row[17] == null){
						$pendidikan = "";
					}else{
						$pendidikan = $row[17];
					}
					//pekerjaan
					if($row[18] == null){
						$pekerjaan = "";
					}else{
						$pekerjaan = $row[18];
					}
					//etnis
					if($row[19] == null){
						$etnis = "";
					}else{
						$etnis = $row[19];
					}
					//tanggal_lahir
					if($row[20] == null){
						$tanggal_lahir = "";
					}else{
						$tanggal_lahir = $row[20];
					}																									
					
					//NOTE : KALO CELL DI EXCELNYA NULL BAKAL ERROR																		
					
					//GENERATE NO_ANGGOTA BY SYSTEM
					$no_anggota = $id_gereja."-".$last_number;
					$last_number++;
					
					//PREVENTION KALO ORANG SAMPE IMPORT 2X SHEET YANG SAMA
					//kombinasi nama_depan dan tanggal_lahir
					// $exist = DB::table('anggota')->where('nama_depan', '=', $nama_depan)->where('tanggal_lahir', '=', $tanggal_lahir)->get();
					// if(count($exits) >= 1)
					// {
						// duplicate data, not inserted
					// }
					// else //new data
					// {	
						//START INSERT
						DB::table('anggota')->insert(
							array(							
								//IT WILL ERROR IF NO_ANGGOTA NOT UNIQUE
								'no_anggota'=>$no_anggota, 							
								'nama_depan'=>$nama_depan, //asumsi : sementara masukin nama ke nama_depan
								'nama_tengah'=>"",
								'nama_belakang'=>"",		
								'telp'=>$telp,
								'gender'=>$gender,
								'wilayah'=>"", //masih ga jelas, diisi rayon, ato nama wilayah, ato apa 
								'gol_darah'=>"", //di ayudia ga ada golongan darah, jadi bingung
								'pendidikan'=>$pendidikan,
								'pekerjaan'=>$pekerjaan,
								'etnis'=>$etnis,
								'kota_lahir'=>"", //di ayudia ga ada kota lahir, jadi bingung
								'tanggal_lahir'=>$tanggal_lahir, //format di excelnya dd/mm/yyyy
								// 'tanggal_meninggal'=>null,
								'role'=>1,		//di data anggota ga tau role, sementara masukin jadi 1 = jemaat semua		
								'foto'=>null,
								'id_gereja'=>$id_gereja,
								'deleted'=>0,														
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()																
							)
						);							
						$new_anggota = DB::table('anggota')->orderBy('id', 'desc')->first();											
						DB::table('alamat')->insert(
							array(
								'jalan'=>$jalan,
								'kota'=>$kota,								
								'kodepos'=>$kodepos,
								'id_anggota'=>$new_anggota->id,								
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
						//ANGGEP GA USAH MASUK KE TABLE HP DULU, KARNA KONTAK NOMOR CUMA 1 KOLOM DI EXCEL, MASUKNYA KE TELP DI TABLE ANGGOTA
						// DB::table('hp')->insert(
							// array(
								// 'no_hp'=>$,
								// 'id_anggota'=>$new_anggota->id,
								// 'created_at'=>Carbon::now(),
								// 'updated_at'=>Carbon::now()
							// )
						// );
						//END INSERT
					// }
															
					
					/*		
					// $anggota = Anggota::where('id_gereja','=',$id_gereja)->where('no_anggota','=',$no_anggota)->get();
					
					//if exist
					if(count($anggota) == 1){						
						//update						
						DB::table('anggota')->where('id', '=', $anggota->id)->update(
							array(
								'no_anggota'=>$row[27], 
								'nama_depan'=>$row[4], //asumsi : sementara masukin nama ke nama_depan
								'nama_tengah'=>"",
								'nama_belakang'=>"",		
								'telp'=>$row[7],
								'gender'=>$gender,
								// 'wilayah'=>, //masih ga jelas
								'gol_darah'=>"", //di ayudia ga ada golongan darah, jadi bingung
								'pendidikan'=>$row[17],
								'pekerjaan'=>$row[18],
								'etnis'=>$row[19],
								'kota_lahir'=>"", //di ayudia ga ada kota lahir, jadi bingung
								'tanggal_lahir'=>$row[20], //format di excelnya dd/mm/yyyy
								//'tanggal_meninggal'=>null,
								'role'=>1,		//di data anggota ga tau role, sementara masukin jadi 1 = jemaat semua
								'foto'=>null,
								'id_gereja'=>$id_gereja,
								// 'deleted'=>0,														
								// 'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);						
						DB::table('alamat')->where('id_anggota', '=', $anggota->id)->update(
							array(
								'jalan'=>$row[6],
								'kota'=>$row[9],								
								'kodepos'=>$row[8],
								// 'id_anggota'=>$anggota->id,								
								// 'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);						
						DB::table('hp')->where('id_anggota', '=', $anggota->id)->update(
							array(
								//asumsi : 
								//no_hp 1 orang cuma ada 1, dan disamain aja dengan telp yang ada di anggota
								'no_hp'=>$row[7], //di ayudia no_hp digabung dengan telp, jadi bingung
								// 'id_anggota'=>$anggota->id,
								// 'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);	
												
					}
					else
					{	
									
						//insert
						DB::table('anggota')->insert(
							array(
								'no_anggota'=>$row[27], 
								'nama_depan'=>$row[4], //asumsi : sementara masukin nama ke nama_depan
								'nama_tengah'=>"",
								'nama_belakang'=>"",		
								'telp'=>$row[7],
								'gender'=>$gender,
								//'wilayah'=>, //masih ga jelas
								//'gol_darah'=>, //di ayudia ga ada golongan darah, jadi bingung
								'pendidikan'=>$row[17],
								'pekerjaan'=>$row[18],
								'etnis'=>$row[19],
								//'kota_lahir'=>, //di ayudia ga ada kota lahir, jadi bingung
								'tanggal_lahir'=>$row[20], //format di excelnya dd/mm/yyyy
								//'tanggal_meninggal'=>null,
								'role'=>1,		//di data anggota ga tau role, sementara masukin jadi 1 = jemaat semua		
								'foto'=>null,
								'id_gereja'=>$id_gereja,
								'deleted'=>0,														
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()																
							)
						);								
						$id_anggota = DB::table('anggota')->orderBy('id', 'desc')->first();						
						DB::table('alamat')->insert(
							array(
								'jalan'=>$row[6],
								'kota'=>$row[9],								
								'kodepos'=>$row[8],
								'id_anggota'=>$anggota->id,								
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
						DB::table('hp')->insert(
							array(
								'no_hp'=>$row[7],
								'id_anggota'=>$id_anggota->id,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);				
					}
					*/					
				}
			});
			
			return 'Berhasil';
			// return $message;
		}
		else{
			return 'Gagal upload file';
		}
	}
	
	private function getMonthFromNumber($month){

		switch ($month) :
			case  1: return 'Januari';
			case  2: return 'Februari';
			case  3: return 'Maret';
			case  4: return 'April';
			case  5: return 'Mei';
			case  6: return 'Juni';
			case  7: return 'Juli';
			case  8: return 'Agustus';
			case  9: return 'September';
			case 10: return 'Oktober';
			case 11: return 'November';
			case 12: return 'Desember';
				
		endswitch;
	}
}

?>