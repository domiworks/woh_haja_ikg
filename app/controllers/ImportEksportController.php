<?php

use Carbon\Carbon;

class ImportEksportController extends BaseController {

	public function admin_view_import_eksport()
	{
		//return View::make('pages.admin.importeksport');			
		return View::make('pages.__admin.importeksport');			
	}

	public function view_import_eksport()
	{		
		// $header = $this->setHeader();
		// return View::make('pages.importeksport',
				// compact('header'));	
		// return View::make('pages.importeksport');			
		return View::make('pages.__user.importeksport');			
	}

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
					$no_anggota = $id_gereja."_".$last_number;
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
								'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
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
								'id_pendeta'=>1, //id anggota Pdt. GKI Ayudia
								'tanggal_baptis'=>$tanggal_sidi,
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
								'id_jenis_atestasi'=>12, //ATP
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
					$no_anggota = $id_gereja."_".$last_number;
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
								'id_pendeta'=>2, //id anggota Pdt. GKI Cianjur
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
								'id_pendeta'=>2, //id anggota Pdt. GKI Cianjur
								'tanggal_baptis'=>$tanggal_sidi,
								'id_jenis_baptis'=>2, //= id_jenis_baptis untuk sidi
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
						if($alasan_1_mutasi != null)
						{
							$alasan = DB::table('jenis_atestasi')->where('nama_atestasi', '=', $alasan_1_mutasi)->first();
							if(count($alasan) != 0) //alasan untuk atestasi
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_masuk,
										//'id_gereja_lama'=>,
										'id_gereja_baru'=>2,
										//'nama_gereja_lama'=>"",
										'nama_gereja_baru'=>"GKI Cianjur",
										'id_jenis_atestasi'=>$alasan->id,
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);						
							}
							else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_masuk,
										//'id_gereja_lama'=>,
										'id_gereja_baru'=>2,
										//'nama_gereja_lama'=>"",
										'nama_gereja_baru'=>"GKI Cianjur",
										'id_jenis_atestasi'=>12, //ATP
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);	
							}							
						}
						else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
						{
							DB::table('atestasi')->insert(
								array(
									//'no_atestasi'=>"",
									'tanggal_atestasi'=>$tanggal_atestasi_masuk,
									//'id_gereja_lama'=>,
									'id_gereja_baru'=>2,
									//'nama_gereja_lama'=>"",
									'nama_gereja_baru'=>"GKI Cianjur",
									'id_jenis_atestasi'=>12, //ATP 
									'id_anggota'=>$new_anggota->id,
									'keterangan'=>"",
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()
								)
							);						
						}						
					}					
					if($tanggal_atestasi_keluar != "")
					{							
						if($alasan_1_mutasi != null)
						{
							$alasan = DB::table('jenis_atestasi')->where('nama_atestasi', '=', $alasan_1_mutasi)->first();
							if(count($alasan) != 0) //alasan untuk atestasi
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_keluar,
										'id_gereja_lama'=>2,
										//'id_gereja_baru'=>,
										'nama_gereja_lama'=>"GKI Cianjur",
										//'nama_gereja_baru'=>"",
										'id_jenis_atestasi'=>$alasan->id,
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);
							}
							else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_keluar,
										'id_gereja_lama'=>2,
										//'id_gereja_baru'=>,
										'nama_gereja_lama'=>"GKI Cianjur",
										//'nama_gereja_baru'=>"",
										'id_jenis_atestasi'=>1, //AKK
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);
							}
						}	
						else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
						{
							DB::table('atestasi')->insert(
								array(
									//'no_atestasi'=>"",
									'tanggal_atestasi'=>$tanggal_atestasi_keluar,
									'id_gereja_lama'=>2,
									//'id_gereja_baru'=>,
									'nama_gereja_lama'=>"GKI Cianjur",
									//'nama_gereja_baru'=>"",
									'id_jenis_atestasi'=>1, //AKK
									'id_anggota'=>$new_anggota->id,
									'keterangan'=>"",
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()
								)
							);
						}																											
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
					if($tanggal_dkh != null)
					{
						if($alasan_1_mutasi != null)
						{
							$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_1_mutasi)->first();
							if(count($alasan) != 0) //alasan untuk dkh
							{	
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_dkh,
										'id_jenis_dkh'=>$alasan->id, //dkh1
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}
							else //masuk else kalo sampai ada yang salah masukin data jenis dkh di excel
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_dkh,
										'id_jenis_dkh'=>1, //dkh
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}							
						}
						else
						{
							DB::table('dkh')->insert(
								array(
									'no_dkh'=>"",
									'id_jemaat'=>$new_anggota->id,
									'tanggal_dkh'=>$tanggal_dkh,
									'id_jenis_dkh'=>1, //dkh
									'keterangan'=>"",
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()
								)						
							);
						}												
					}																										
					if($tanggal_ex_dkh != null)
					{
						if($alasan_1_mutasi != null)
						{
							$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_1_mutasi)->first();
							if(count($alasan) != 0) //alasan untuk dkh
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh,
										'id_jenis_dkh'=>$alasan->id, //ex-dkh
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}
							else
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh,
										'id_jenis_dkh'=>9, //ex-dkh
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);	
							}
						}
						else
						{
							DB::table('dkh')->insert(
								array(
									'no_dkh'=>"",
									'id_jemaat'=>$new_anggota->id,
									'tanggal_dkh'=>$tanggal_ex_dkh,
									'id_jenis_dkh'=>9, //ex-dkh
									'keterangan'=>"",
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()
								)						
							);
						}							
					}																										
					if($tanggal_ex_dkh4 != null)
					{
						if($alasan_1_mutasi != null)
						{
							$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_1_mutasi)->first();
							if(count($alasan) != 0) //alasan untuk atestasi
							{	
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh4,
										'id_jenis_dkh'=>$alasan->id, //ex-dkh4
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}
							else
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh4,
										'id_jenis_dkh'=>13, //ex-dkh4
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}
						}
						else
						{
							DB::table('dkh')->insert(
								array(
									'no_dkh'=>"",
									'id_jemaat'=>$new_anggota->id,
									'tanggal_dkh'=>$tanggal_ex_dkh4,
									'id_jenis_dkh'=>13, //ex-dkh4
									'keterangan'=>"",
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()
								)						
							);
						}						
					}
				}
			});			
			return 'Berhasil';			
		}
		else
		{
			return 'Gagal';
		}
	}
	//END FUNGSI IMPORT REAL DATA
	
	
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
	
	public function export_anggota($id_gereja,$tahun_awal,$tahun_akhir)
	{		
		$end_tanggal_pelayanan = $tahun_akhir."-03-31 23:59:59";

		$data = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->where('created_at', '<=', $end_tanggal_pelayanan)->where('deleted', '=', 0)->get();
		
		if(count($data) == 0){
			return 'Belum ada data.';
		}

		//$gereja = Gereja::find($id_gereja);
		$title_table = 'DATA ANGGOTA JEMAAT '.Session::get('nama').' - BANDUNG'; //nama gereja
		
		//ada 29 kolom
		//setting header di row 2	
		$nama_gereja = array(
			$title_table,'','','','','','','','',''
			,'','','','','','','','','',''
			,'','','','','','','','',''
		);		
		//tanggal di row 3
		$tanggal = array(	
			'','','','','','','','','',''
			,'','Tanggal : ',(string)Carbon::now(),'','','','','','',''
			,'','','','','','','','',''
		);
		$blank = array(
			'','','','','','','','','',''
			,'','','','','','','','','',''
			,'','','','','','','','',''
		);		
		$header_table_1 = array(
			'No.','No.','Nama Depan','Nama Tengah','Nama Belakang','Alamat','Kota','Kodepos','No.Telp.','Hp.'
			,'Gender','Status','Wilayah','Pendidikan','Pekerjaan','Kelompok','Golongan','Kota','Tanggal','Tanggal'
			,'Tanggal','Tanggal','Tanggal','Tanggal','Tanggal','Tanggal','Tanggal','Alasan','Alasan 2'
		);
		$header_table_2 = array(
			'','Anggota','Induk','','','','','','',''
			,'','Anggota','','','','Etnis','Darah','Lahir','Lahir','Baptis'
			,'Sidi','Atestasi Masuk','Atestasi Keluar','Meninggal','DKH','Ex.DKH','Ex.DKH-4','Mutasi','Mutasi'
		);		
		
		try{
			//START INSERT TO ROW
			Excel::create('Export Data Anggota', function($excel) use ($data,$id_gereja,$nama_gereja,$tanggal,$blank,$header_table_1,$header_table_2){

				$excel->sheet('DATA BASE ANGGOTA', function($sheet) use ($data,$id_gereja,$nama_gereja,$tanggal,$blank,$header_table_1,$header_table_2){
					//row 2 - nama gereja
					$sheet->row(2, $nama_gereja);
					
					//row 3 - tanggal
					$sheet->row(3, $tanggal);
					
					//row 5 - header table 1
					$sheet->row(5, $header_table_1);
					
					//row 6 - header table 2
					$sheet->row(6, $header_table_2);
					
					//start data di row 7
					$row_num  = 7;					
					$no = 1;
					foreach($data as $row_data)
					{
						$alamat = Alamat::where('id_anggota', '=', $row_data->id)->first();
						if(count($alamat) != 0){
							$jalan = $alamat->jalan;
							$kota = $alamat->kota;
							$kodepos = $alamat->kodepos;
						}else{
							$jalan = "";
							$kota = "";
							$kodepos = "";
						}						

						$hp = Hp::where('id_anggota', '=', $row_data->id)->first();
						if(count($hp) != 0){
							$no_hp = $hp->no_hp;
						}else{
							$no_hp = "";
						}

						//gender
						if($row_data->gender == 1){
							$gender = "P";
						}else{
							$gender = "W";
						}
						
						//status_anggota
						if($row_data->status_anggota == 1){							
							$status_anggota = "B"; //baptis
						}else if($row_data->status_anggota == 2){
							$status_anggota = "S"; //sidi
						}else{ // = -1
							$status_anggota = ""; //blom diisi
						}				

						//tanggal baptis
						$baptis = Baptis::where('id_gereja', '=', $id_gereja)
										->where('id_jemaat', '=', $row_data->id)
										->where('id_jenis_baptis', '=', 1)->first();
						if(count($baptis) != 0){
							$tanggal_baptis = $baptis->tanggal_baptis;
						}else{
							$tanggal_baptis = "";
						}

						//tanggal sidi
						$sidi = Baptis::where('id_gereja', '=', $id_gereja)
										->where('id_jemaat', '=', $row_data->id)
										->where('id_jenis_baptis', '=', 2)->first();
						if(count($sidi) != 0){
							$tanggal_sidi = $sidi->tanggal_baptis;
						}else{
							$tanggal_sidi = "";
						}					

						//atestasi
						$atestasi = DB::table('atestasi as ate')->where('ate.id_anggota', '=', $row_data->id)								
											->orderBy('ate.id', 'desc')
											->join('jenis_atestasi as jate', 'ate.id_jenis_atestasi', '=', 'jate.id');
						//tanggal atestasi masuk, alasan mutasi 
						$atestasi_masuk = $atestasi->where('jate.tipe', '=', 1) //masuk
											->first();																								
						if(count($atestasi_masuk) != 0){
							$tanggal_atestasi_masuk = $atestasi_masuk->tanggal_atestasi;							
						}else{
							$tanggal_atestasi_masuk = "";							
						}

						//tanggal atestasi keluar, alasan mutasi
						$atestasi_keluar = $atestasi->where('jate.tipe', '=', 2) //keluar
											->first();																														
						if(count($atestasi_keluar) != 0){
							$tanggal_atestasi_keluar = $atestasi_keluar->tanggal_atestasi;														
						}else{
							$tanggal_atestasi_keluar = "";													
						}					

						//tanggal dkh
						$dkh = Dkh::Where('id_jemaat', '=', $row_data->id)
									->where('id_jenis_dkh', '<=', 5) //dkh sampe dkh4
									->orderBy('id', 'desc')
									->first();
						if(count($dkh) != 0){
							$tanggal_dkh = $dkh->tanggal_dkh;
						}else{
							$tanggal_dkh = "";
						}

						//tanggal ex.dkh
						$ex_dkh = Dkh::Where('id_jemaat', '=', $row_data->id)
									->where('id_jenis_dkh', '>=', 9) //exdkh
									->where('id_jenis_dkh', '<=', 12) //sampe exdkh3
									->orderBy('id', 'desc')
									->first();
						if(count($ex_dkh) != 0){
							$tanggal_ex_dkh = $ex_dkh->tanggal_dkh;
						}else{
							$tanggal_ex_dkh = "";
						}

						//tanggal ex.dkh-4		
						$ex_dkh4 = Dkh::Where('id_jemaat', '=', $row_data->id)
									->where('id_jenis_dkh', '=', 13) //exdkh4
									->orderBy('id', 'desc')
									->first();
						if(count($ex_dkh4) != 0){
							$tanggal_ex_dkh4 = $ex_dkh4->tanggal_dkh;
						}else{
							$tanggal_ex_dkh4 = "";
						}

						//alasan 1 mutasi
						$mutasi1 = Atestasi::where('id_anggota', '=', $row_data->id)
										->orderBy('id', 'desc')->first();
						if(count($mutasi1) != 0){
							$alasan_1_mutasi = JenisAtestasi::where('id', '=', $mutasi1->id_jenis_atestasi)->first()->nama_atestasi;
						}else{
							$alasan_1_mutasi = "";
						}			

						//alasan 2 mutasi
						$mutasi2 = Dkh::where('id_jemaat', '=', $row_data->id)
										->orderBy('id', 'desc')->first();
						if(count($mutasi2) != 0){
							$alasan_2_mutasi = JenisDkh::where('id', '=', $mutasi2->id_jenis_dkh)->first()->nama_dkh;
						}else{
							$alasan_2_mutasi = "";
						}			

						$each_data = array(
							$no, //1 no
							$row_data->no_anggota, //2 no_anggota
							$row_data->nama_depan, //3 nama_depan
							$row_data->nama_tengah, //4 nama_tengah
							$row_data->nama_belakang, //5 nama_belakang
							//$alamat->jalan, //6 alamat = jalan
							$jalan, //6 alamat = jalan
							//$alamat->kota, //7 kota
							$kota, //7 kota							
							//$alamat->kodepos, //8 kodepos
							$kodepos, // 8 kodepos
							$row_data->telp, //9 telp
							//$hp->no_hp, //10 hp
							$no_hp, //10 hp
							$gender, //11 gender
							$status_anggota, //12 status anggota
							$row_data->wilayah, //13 wilayah
							$row_data->pendidikan, //14 pendidikan
							$row_data->pekerjaan, //15 pekerjaan
							//date_diff(date_create($row_data->tanggal_lahir), date_create(Carbon::now()))->y, //umur
							$row_data->etnis, //16 kelompok etnis
							$row_data->gol_darah, //17 golongan darah
							$row_data->kota_lahir, //18 kota lahir
							$row_data->tanggal_lahir, //19 tanggal lahir							
							$tanggal_baptis, //20 tanggal baptis
							$tanggal_sidi, //21 tanggal sidi
							$tanggal_atestasi_masuk, //22 tanggal atestasi masuk
							$tanggal_atestasi_keluar, //23 tanggal atestasi keluar
							$row_data->tanggal_meninggal, //24 tanggal meninggal
							$tanggal_dkh, //25 tanggal dkh
							$tanggal_ex_dkh,//26 tanggal ex.dkh
							$tanggal_ex_dkh4, //27 tanggal ex.dkh-4
							$alasan_1_mutasi, //28 alasan mutasi
							$alasan_2_mutasi //29 alasan 2 mutasi							
						);
						
						$sheet->row($row_num, $each_data);
						
						$row_num++; //counter insert row
						$no++; //counter no row
					}
					
					//start styling
						$sheet->setAutoSize(true);
						
						//$sheet->mergeCells('W5:X5');//merge atestasi												
						
						$sheet->setWidth('A', 5);
						
						$sheet->cells('A2', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								'size'       => '14',
								'bold'       =>  true
							));
						});
						
						$sheet->cells('A5:AC6', function($cells) {						
							$cells->setFont(array(
								'family'     => 'Arial',
								'size'       => '10',
								'bold'       =>  true
							));
							$cells->setAlignment('center');
						});						
						
						$last_row = $row_num - 1;												
						
						//border data
						$sheet->setBorder('A7:AC'.$last_row, 'thin');						

						//border tanggal
						$sheet->cells('L3:M3', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');							
						});

						//border header
						$sheet->cells('A5:A6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('B5:B6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('C5:C6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('D5:D6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('E5:E6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('F5:F6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('G5:G6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('H5:H6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('I5:I6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('J5:J6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('K5:K6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('L5:L6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('M5:M6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('N5:N6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('O5:O6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('P5:P6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('Q5:Q6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('R5:R6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('S5:S6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('T5:T6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('U5:U6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('V5:V6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('W5:W6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('X5:X6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('Y5:Y6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('Z5:Z6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('AA5:AA6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('AB5:AB6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});
						$sheet->cells('AC5:AC6', function($cells) {						
							$cells->setBorder('thick', 'thick', 'thick', 'thick');
						});

						//$sheet->setBorder('A7:D'.$last_row, 'thin'); //kiri alamat
						//$sheet->setBorder('G7:AC'.$last_row, 'thin'); //kanan alamat
						//$sheet->cells('A7:AC'.$last_row, function($cells) {						
						//	$cells->setBorder('thin', 'thin', 'thin', 'thin');
						//});//tengah alamat
								
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
						
						$sheet->cells('A5:AC6', function($cells) {							
							$cells->setBackground('#66FFCC');
						}); //background color header table												
						
						$sheet->cells('L3:M3', function($cells) {							
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
	
	public function export_kegiatan($id_gereja,$tahun){
	
		$kegiatan = new Kegiatan();
		
		$arr_thn = explode('-',$tahun);
		
		$tahun_awal = $arr_thn[0];
		$tahun_akhir = $arr_thn[1];
		
		$gereja = Gereja::find($id_gereja);
				
		$result = $kegiatan->where('id_gereja','=',$id_gereja)->where('tanggal_mulai','>=',$tahun_awal.'-04-01')->where('tanggal_mulai','<=',$tahun_akhir.'-03-31')->orderBy('tanggal_mulai')->orderBy('id_jenis_kegiatan')->where('deleted', '=', 0)->get();
		
		//return $result;
		if(count($result) == 0){
			return 'Belum ada data.';
		}
		
		$arr_total = array();
		
		$arr_month = array();
		
		$temp_tanggal = "";
		
		$arr_total_bulanan = array();
		
		$total_rata_bulanan = array();
		
		
		
		$temp_bulan = explode('-',$result[0]->tanggal_mulai)[1];
		
		$jumlah_anggota_dewasa_pria = 0;
		$jumlah_anggota_dewasa_wanita = 0;
		
		$jumlah_anggota_pria_t = 0;
		$jumlah_anggota_wanita_t = 0;
		$jumlah_simpatisan_pria_t = 0;
		$jumlah_simpatisan_wanita_t = 0;
		$jumlah_penatua_pria_t = 0;
		$jumlah_penatua_wanita_t = 0;
		$jumlah_pemusik_pria_t = 0;
		$jumlah_pemusik_wanita_t = 0;
		
		$jumlah_anggota_pria_b = 0;
		$jumlah_anggota_wanita_b = 0;
		$jumlah_simpatisan_pria_b = 0;
		$jumlah_simpatisan_wanita_b = 0;
		$jumlah_penatua_pria_b = 0;
		$jumlah_penatua_wanita_b = 0;
		$jumlah_pemusik_pria_b = 0;
		$jumlah_pemusik_wanita_b = 0;
		
		
		//->where('id_jenis_kegiatan','=',1)
		
		//process data
		$counter = 0;
		$counter_minggu = 0;
		foreach($result as $key){
			
			$now = $key->tanggal_mulai;

			$arr_now =  explode('-',$now);
			
			$current_month = $arr_now[1];
			
			$current_year = $arr_now[0];

			$anggota_pria = count(Anggota::where('id_gereja','=',$id_gereja)->where('created_at','<',($now.' 00:00:00.000000'))->where('gender','=',1)->get());
			$anggota_wanita = count(Anggota::where('id_gereja','=',$id_gereja)->where('created_at','<',($now.' 00:00:00.000000'))->where('gender','=',0)->get());
			
			//sama bulan?
			if($temp_bulan == $current_month){
				//tanggal
				if($temp_tanggal!=$key->tanggal_mulai){
					if($counter == 0){
						$counter+=1;
					}
					else{
						//jumlah mingguan
						$row_arr = array('','','','','Jumlah',$jumlah_anggota_pria_t,$jumlah_anggota_wanita_t,$jumlah_anggota_pria_t+$jumlah_anggota_wanita_t,$jumlah_simpatisan_pria_t,$jumlah_simpatisan_wanita_t,$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t,$jumlah_penatua_pria_t,$jumlah_penatua_wanita_t,$jumlah_penatua_pria_t+$jumlah_penatua_wanita_t,$jumlah_pemusik_pria_t,$jumlah_pemusik_wanita_t,$jumlah_pemusik_pria_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t,$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t+$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t);
						
						array_push($arr_month,$row_arr);
						
						$jumlah_anggota_pria_b += $jumlah_anggota_pria_t;
						$jumlah_anggota_wanita_b += $jumlah_anggota_wanita_t;
						$jumlah_simpatisan_pria_b += $jumlah_simpatisan_pria_t;
						$jumlah_simpatisan_wanita_b += $jumlah_simpatisan_wanita_t;
						$jumlah_penatua_pria_b += $jumlah_penatua_pria_t;
						$jumlah_penatua_wanita_b += $jumlah_penatua_wanita_t;
						$jumlah_pemusik_pria_b += $jumlah_pemusik_pria_t;
						$jumlah_pemusik_wanita_b += $jumlah_pemusik_wanita_t;
						
						$jumlah_anggota_pria_t = 0;
						$jumlah_anggota_wanita_t = 0;
						$jumlah_simpatisan_pria_t = 0;
						$jumlah_simpatisan_wanita_t = 0;
						$jumlah_penatua_pria_t = 0;
						$jumlah_penatua_wanita_t = 0;
						$jumlah_pemusik_pria_t = 0;
						$jumlah_pemusik_wanita_t = 0;
					}
					$row_arr = array($this->dateConverter($key->tanggal_mulai),$anggota_pria,$anggota_wanita,($anggota_pria+$anggota_wanita),$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria,$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita+$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita);
					
					$jumlah_anggota_dewasa_pria += $anggota_pria;
					$jumlah_anggota_dewasa_wanita += $anggota_wanita;
					
					$counter_minggu++;
				}
				else{
					$row_arr = array('','','','',$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria,$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita+$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita);
				}
				$temp_tanggal=$key->tanggal_mulai;
				array_push($arr_month,$row_arr);
				
				$jumlah_anggota_pria_t += $key->banyak_jemaat_pria;
				$jumlah_anggota_wanita_t += $key->banyak_jemaat_wanita;
				$jumlah_simpatisan_pria_t += $key->banyak_simpatisan_pria;
				$jumlah_simpatisan_wanita_t += $key->banyak_simpatisan_wanita;
				$jumlah_penatua_pria_t += $key->banyak_penatua_pria;
				$jumlah_penatua_wanita_t += $key->banyak_penatua_wanita;
				$jumlah_pemusik_pria_t += $key->banyak_pemusik_pria;
				$jumlah_pemusik_wanita_t += $key->banyak_pemusik_wanita;
			}
			else{
				
				//jumlah mingguan ganti bulan
				$row_arr = array('','','','','Jumlah',$jumlah_anggota_pria_t,$jumlah_anggota_wanita_t,$jumlah_anggota_pria_t+$jumlah_anggota_wanita_t,$jumlah_simpatisan_pria_t,$jumlah_simpatisan_wanita_t,$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t,$jumlah_penatua_pria_t,$jumlah_penatua_wanita_t,$jumlah_penatua_pria_t+$jumlah_penatua_wanita_t,$jumlah_pemusik_pria_t,$jumlah_pemusik_wanita_t,$jumlah_pemusik_pria_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t,$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t+$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t);
						
				array_push($arr_month,$row_arr);
						
				$jumlah_anggota_pria_b += $jumlah_anggota_pria_t;
				$jumlah_anggota_wanita_b += $jumlah_anggota_wanita_t;
				$jumlah_simpatisan_pria_b += $jumlah_simpatisan_pria_t;
				$jumlah_simpatisan_wanita_b += $jumlah_simpatisan_wanita_t;
				$jumlah_penatua_pria_b += $jumlah_penatua_pria_t;
				$jumlah_penatua_wanita_b += $jumlah_penatua_wanita_t;
				$jumlah_pemusik_pria_b += $jumlah_pemusik_pria_t;
				$jumlah_pemusik_wanita_b += $jumlah_pemusik_wanita_t;
						
				$jumlah_anggota_pria_t = 0;
				$jumlah_anggota_wanita_t = 0;
				$jumlah_simpatisan_pria_t = 0;
				$jumlah_simpatisan_wanita_t = 0;
				$jumlah_penatua_pria_t = 0;
				$jumlah_penatua_wanita_t = 0;
				$jumlah_pemusik_pria_t = 0;
				$jumlah_pemusik_wanita_t = 0;
				
				//jumlah bulanan
				$row_arr = array('',$jumlah_anggota_dewasa_pria,$jumlah_anggota_dewasa_wanita,$jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita,'Total',$jumlah_anggota_pria_b,$jumlah_anggota_wanita_b,$jumlah_anggota_pria_b+$jumlah_anggota_wanita_b,$jumlah_simpatisan_pria_b,$jumlah_simpatisan_wanita_b,$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b,$jumlah_penatua_pria_b,$jumlah_penatua_wanita_b,$jumlah_penatua_pria_b+$jumlah_penatua_wanita_b,$jumlah_pemusik_pria_b,$jumlah_pemusik_wanita_b,$jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b,$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b);
						
				array_push($arr_month,$row_arr);
				
				//rata2
				
				$row_arr = array(($this->getMonthFromNumber((int)$current_month-1).' '.$current_year),$jumlah_anggota_dewasa_pria/$counter_minggu,$jumlah_anggota_dewasa_wanita/$counter_minggu,($jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita)/$counter_minggu,'Rata-rata',$jumlah_anggota_pria_b/$counter_minggu,$jumlah_anggota_wanita_b/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_anggota_wanita_b)/$counter_minggu,$jumlah_simpatisan_pria_b/$counter_minggu,$jumlah_simpatisan_wanita_b/$counter_minggu,($jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu,$jumlah_penatua_pria_b/$counter_minggu,$jumlah_penatua_wanita_b/$counter_minggu,($jumlah_penatua_pria_b+$jumlah_penatua_wanita_b)/$counter_minggu,$jumlah_pemusik_pria_b/$counter_minggu,$jumlah_pemusik_wanita_b/$counter_minggu,($jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b)/$counter_minggu,($jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu);
				
				array_push($arr_month,$row_arr);
				
				$rata_temp = array(($this->getMonthFromNumber((int)$current_month-1).' '.$current_year),$jumlah_anggota_dewasa_pria/$counter_minggu,$jumlah_anggota_dewasa_wanita/$counter_minggu,($jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita)/$counter_minggu,'KU',$jumlah_anggota_pria_b/$counter_minggu,$jumlah_anggota_wanita_b/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_anggota_wanita_b)/$counter_minggu,$jumlah_simpatisan_pria_b/$counter_minggu,$jumlah_simpatisan_wanita_b/$counter_minggu,($jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu,$jumlah_penatua_pria_b/$counter_minggu,$jumlah_penatua_wanita_b/$counter_minggu,($jumlah_penatua_pria_b+$jumlah_penatua_wanita_b)/$counter_minggu,$jumlah_pemusik_pria_b/$counter_minggu,$jumlah_pemusik_wanita_b/$counter_minggu,($jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b)/$counter_minggu,($jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu);
		
		
				array_push($total_rata_bulanan,$rata_temp);
				
				
				$counter_minggu = 0;
				
				$jumlah_anggota_pria_b = 0;
				$jumlah_anggota_wanita_b = 0;
				$jumlah_simpatisan_pria_b = 0;
				$jumlah_simpatisan_wanita_b = 0;
				$jumlah_penatua_pria_b = 0;
				$jumlah_penatua_wanita_b = 0;
				$jumlah_pemusik_pria_b = 0;
				$jumlah_pemusik_wanita_b = 0;
				
				array_push($arr_total,$arr_month);
				
				$arr_month = array();
				$counter=0;
				
				if($temp_tanggal!=$key->tanggal_mulai){
					if($counter == 0){
						$counter+=1;
					}
					else{
						//jumlah mingguan
						$row_arr = array('','','','','Jumlah',$jumlah_anggota_pria_t,$jumlah_anggota_wanita_t,$jumlah_anggota_pria_t+$jumlah_anggota_wanita_t,$jumlah_simpatisan_pria_t,$jumlah_simpatisan_wanita_t,$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t,$jumlah_penatua_pria_t,$jumlah_penatua_wanita_t,$jumlah_penatua_pria_t+$jumlah_penatua_wanita_t,$jumlah_pemusik_pria_t,$jumlah_pemusik_wanita_t,$jumlah_pemusik_pria_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t,$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t+$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t);
						
						array_push($arr_month,$row_arr);
						
						$jumlah_anggota_pria_b += $jumlah_anggota_pria_t;
						$jumlah_anggota_wanita_b += $jumlah_anggota_wanita_t;
						$jumlah_simpatisan_pria_b += $jumlah_simpatisan_pria_t;
						$jumlah_simpatisan_wanita_b += $jumlah_simpatisan_wanita_t;
						$jumlah_penatua_pria_b += $jumlah_penatua_pria_t;
						$jumlah_penatua_wanita_b += $jumlah_penatua_wanita_t;
						$jumlah_pemusik_pria_b += $jumlah_pemusik_pria_t;
						$jumlah_pemusik_wanita_b += $jumlah_pemusik_wanita_t;
						
						$jumlah_anggota_pria_t = 0;
						$jumlah_anggota_wanita_t = 0;
						$jumlah_simpatisan_pria_t = 0;
						$jumlah_simpatisan_wanita_t = 0;
						$jumlah_penatua_pria_t = 0;
						$jumlah_penatua_wanita_t = 0;
						$jumlah_pemusik_pria_t = 0;
						$jumlah_pemusik_wanita_t = 0;
					}
					$row_arr = array($this->dateConverter($key->tanggal_mulai),$anggota_pria,$anggota_wanita,($anggota_pria+$anggota_wanita),$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria,$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita+$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita);
					
					$jumlah_anggota_dewasa_pria += $anggota_pria;
					$jumlah_anggota_dewasa_wanita += $anggota_wanita;
					
					$counter_minggu++;
				}
				else{
					$row_arr = array('','','','',$key->nama_jenis_kegiatan,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat_pria+$key->banyak_jemaat_wanita,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua_pria+$key->banyak_penatua_wanita,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik_pria+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria,$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita,$key->banyak_jemaat_pria+$key->banyak_penatua_pria+$key->banyak_pemusik_pria+$key->banyak_jemaat_wanita+$key->banyak_penatua_wanita+$key->banyak_pemusik_wanita+$key->banyak_simpatisan_pria+$key->banyak_simpatisan_wanita);
				}
				$temp_tanggal=$key->tanggal_mulai;
				array_push($arr_month,$row_arr);
				
				$jumlah_anggota_pria_t += $key->banyak_jemaat_pria;
				$jumlah_anggota_wanita_t += $key->banyak_jemaat_wanita;
				$jumlah_simpatisan_pria_t += $key->banyak_simpatisan_pria;
				$jumlah_simpatisan_wanita_t += $key->banyak_simpatisan_wanita;
				$jumlah_penatua_pria_t += $key->banyak_penatua_pria;
				$jumlah_penatua_wanita_t += $key->banyak_penatua_wanita;
				$jumlah_pemusik_pria_t += $key->banyak_pemusik_pria;
				$jumlah_pemusik_wanita_t += $key->banyak_pemusik_wanita;
			}
			$temp_bulan = $current_month;
		}
		//jumlah mingguan ganti bulan
		$row_arr = array('','','','','Jumlah',$jumlah_anggota_pria_t,$jumlah_anggota_wanita_t,$jumlah_anggota_pria_t+$jumlah_anggota_wanita_t,$jumlah_simpatisan_pria_t,$jumlah_simpatisan_wanita_t,$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t,$jumlah_penatua_pria_t,$jumlah_penatua_wanita_t,$jumlah_penatua_pria_t+$jumlah_penatua_wanita_t,$jumlah_pemusik_pria_t,$jumlah_pemusik_wanita_t,$jumlah_pemusik_pria_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t,$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t,$jumlah_anggota_pria_t+$jumlah_penatua_pria_t+$jumlah_pemusik_pria_t+$jumlah_anggota_wanita_t+$jumlah_penatua_wanita_t+$jumlah_pemusik_wanita_t+$jumlah_simpatisan_pria_t+$jumlah_simpatisan_wanita_t);
						
		array_push($arr_month,$row_arr);
						
		$jumlah_anggota_pria_b += $jumlah_anggota_pria_t;
		$jumlah_anggota_wanita_b += $jumlah_anggota_wanita_t;
		$jumlah_simpatisan_pria_b += $jumlah_simpatisan_pria_t;
		$jumlah_simpatisan_wanita_b += $jumlah_simpatisan_wanita_t;
		$jumlah_penatua_pria_b += $jumlah_penatua_pria_t;
		$jumlah_penatua_wanita_b += $jumlah_penatua_wanita_t;
		$jumlah_pemusik_pria_b += $jumlah_pemusik_pria_t;
		$jumlah_pemusik_wanita_b += $jumlah_pemusik_wanita_t;
						
		$jumlah_anggota_pria_t = 0;
		$jumlah_anggota_wanita_t = 0;
		$jumlah_simpatisan_pria_t = 0;
		$jumlah_simpatisan_wanita_t = 0;
		$jumlah_penatua_pria_t = 0;
		$jumlah_penatua_wanita_t = 0;
		$jumlah_pemusik_pria_t = 0;
		$jumlah_pemusik_wanita_t = 0;
				
		//jumlah bulanan
		$row_arr = array('',$jumlah_anggota_dewasa_pria,$jumlah_anggota_dewasa_wanita,$jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita,'Total',$jumlah_anggota_pria_b,$jumlah_anggota_wanita_b,$jumlah_anggota_pria_b+$jumlah_anggota_wanita_b,$jumlah_simpatisan_pria_b,$jumlah_simpatisan_wanita_b,$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b,$jumlah_penatua_pria_b,$jumlah_penatua_wanita_b,$jumlah_penatua_pria_b+$jumlah_penatua_wanita_b,$jumlah_pemusik_pria_b,$jumlah_pemusik_wanita_b,$jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b,$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b,$jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b);
						
		array_push($arr_month,$row_arr);
				
		//rata2
				
		$row_arr = array(($this->getMonthFromNumber((int)$current_month).' '.$current_year),$jumlah_anggota_dewasa_pria/$counter_minggu,$jumlah_anggota_dewasa_wanita/$counter_minggu,($jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita)/$counter_minggu,'Rata-rata',$jumlah_anggota_pria_b/$counter_minggu,$jumlah_anggota_wanita_b/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_anggota_wanita_b)/$counter_minggu,$jumlah_simpatisan_pria_b/$counter_minggu,$jumlah_simpatisan_wanita_b/$counter_minggu,($jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu,$jumlah_penatua_pria_b/$counter_minggu,$jumlah_penatua_wanita_b/$counter_minggu,($jumlah_penatua_pria_b+$jumlah_penatua_wanita_b)/$counter_minggu,$jumlah_pemusik_pria_b/$counter_minggu,$jumlah_pemusik_wanita_b/$counter_minggu,($jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b)/$counter_minggu,($jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu);
				
		array_push($arr_month,$row_arr);
		
		$rata_temp = array(($this->getMonthFromNumber((int)$current_month).' '.$current_year),$jumlah_anggota_dewasa_pria/$counter_minggu,$jumlah_anggota_dewasa_wanita/$counter_minggu,($jumlah_anggota_dewasa_pria+$jumlah_anggota_dewasa_wanita)/$counter_minggu,'KU',$jumlah_anggota_pria_b/$counter_minggu,$jumlah_anggota_wanita_b/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_anggota_wanita_b)/$counter_minggu,$jumlah_simpatisan_pria_b/$counter_minggu,$jumlah_simpatisan_wanita_b/$counter_minggu,($jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu,$jumlah_penatua_pria_b/$counter_minggu,$jumlah_penatua_wanita_b/$counter_minggu,($jumlah_penatua_pria_b+$jumlah_penatua_wanita_b)/$counter_minggu,$jumlah_pemusik_pria_b/$counter_minggu,$jumlah_pemusik_wanita_b/$counter_minggu,($jumlah_pemusik_pria_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b)/$counter_minggu,($jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b)/$counter_minggu,($jumlah_anggota_pria_b+$jumlah_penatua_pria_b+$jumlah_pemusik_pria_b+$jumlah_anggota_wanita_b+$jumlah_penatua_wanita_b+$jumlah_pemusik_wanita_b+$jumlah_simpatisan_pria_b+$jumlah_simpatisan_wanita_b)/$counter_minggu);
		
		
		array_push($total_rata_bulanan,$rata_temp);
				
		$counter_minggu = 0;
				
		$jumlah_anggota_pria_b = 0;
		$jumlah_anggota_wanita_b = 0;
		$jumlah_simpatisan_pria_b = 0;
		$jumlah_simpatisan_wanita_b = 0;
		$jumlah_penatua_pria_b = 0;
		$jumlah_penatua_wanita_b = 0;
		$jumlah_pemusik_pria_b = 0;
		$jumlah_pemusik_wanita_b = 0;
				
		array_push($arr_total,$arr_month);
		//return $arr_total;
		
		
		//end process data
		
		
		// create excel
		try{
			//inisialisasi
			$data = array();			
			$tahun_pelayanan = $tahun; //sementara karena data dummy
			$alamat = $gereja->nama.' '.$gereja->alamat;
			
			//setting header
			$nama_gereja = array('LAPORAN BULANAN LKKJ GKI SW JABAR','','','','','','','','','','','','','','','','','','','','Form:A');
			
			$pelayanan_gereja = array('Tahun Pelayanan: '.$tahun_pelayanan,'','','','','','','','','','','','','','','','','','','','');
			$alamat_gereja = array('Jemaat GKI: '.$alamat,'','','','','','','','','','','','','','','','','','','','');
			
			//header rata-rata tahunan
			$nama_gereja2 = array('DATA LAPORAN TAHUNAN LKKJ GKI SW JABAR','','','','','','','','','','','','','','','','','','','','Form:A');
			
			
			$blank = array('','','','','','','','','','','','','','','','','','','','','');
			
			
			
			//setting header table
			$header1 = array('Minggu Tanggal','Jumlah Anggota Jemaat Dewasa Terdaftar','','','Jenis Kebaktian','JUMLAH KEHADIRAN DALAM KEBAKTIAN MINGGU','','','','','','','','','','','','','','','TOTAL Angg + Simp');
			$header2 = array('','','','','','Anggota Jemaat','','','Simpatisan **','','','Penatua','','','Pemusik Gerejawi','','','Sub-Total Anggota','','','');
			$header3 = array('','Pria','Wnt','Jml','','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','');
			
			//setting header table rata-rata tahunan
			$header1_2 = array('Periode Bulan','Jumlah Anggota Jemaat Dewasa Terdaftar','','','Jenis Kebaktian','RATA-RATA JUMLAH KEHADIRAN DALAM KEBAKTIAN UMUM','','','','','','','','','','','','','','','TOTAL Angg + Simp');
			//$header2_2 = array('','','','','','Anggota Jemaat','','','Simpatisan **','','','Penatua','','','Pemusik Gerejawi','','','Sub-Total Anggota','','','');
			//$header3_2 = array('','Pria','Wnt','Jml','','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','Pria','Wnt','Jml','');
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
			
			$array_warna_jumlah = array();
			
			$first_date = $arr_total[0][0][0];
			
			$arr_f_date = explode(' ',$first_date);
			
			//return $arr_f_date[1];
			
			$bulan = $this->getNumberFromMonth($arr_f_date[1]);
			
			$tahun = $arr_f_date[2];
			
			$counter_bulan = 0;
			$counter_data = 0;
			for($i = 0; $i<count($arr_total);$i++){
				$counter_bulan++;
				array_push($array_header,$counter_bulan);
				
				$counter_bulan+=8;
				
								
				$title = array('1. Data Kehadiran Kebaktian Minggu.','','','','','','','','','','','','','','','','','',$this->getMonthFromNumber($bulan),'',$tahun);
				
				array_push($data,$nama_gereja);
				array_push($data,$pelayanan_gereja);
				array_push($data,$alamat_gereja);
				array_push($data,$blank);
				array_push($data,$title);
				array_push($data,$blank);
				array_push($data,$header1);
				array_push($data,$header2);
				array_push($data,$header3);
				
				//generate table data
				$current_date='';
				for($j=0;$j<count($arr_total[$i]);$j++){
					if($arr_total[$i][$j][0] != ''){
						$current_date = $arr_total[$i][$j][0];
					}
					
					$arr_cur_date = explode(' ',$current_date);
					
					if(count($arr_cur_date)==3){
						$cur_month_t = $arr_cur_date[1];
					
						$cur_month = $this->getNumberFromMonth($cur_month_t);
						
						$cur_year = $arr_cur_date[2];
					}
					else if(count($arr_cur_date)==2){
						$cur_month_t = $arr_cur_date[0];
					
						$cur_month = $this->getNumberFromMonth($cur_month_t);
						
						$cur_year = $arr_cur_date[1];
					}
					
					if(($cur_month == $bulan || $cur_month == ($bulan-12))&& $cur_year == $tahun){
						array_push($data,$arr_total[$i][$j]);
						$current_row = $arr_total[$i][$j];
					}
					else{
						array_push($data,$blank);
						$counter_bulan++;
						$counter_data++;
						break;
					}
					
					
					$counter_bulan++;
					$counter_data++;
				}
				array_push($array_data,$counter_data);
				
				$counter_data = 0;
				$counter_bulan+=10;
				
				
				if($bulan%12 == 0){
					$tahun++;
				}
				$bulan++;
				
				
				
				//input data start
				//random data
				/*array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);
				array_push($data,$blank);*/
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
			
			//input data rata-rata
			
			$counter_bulan++;
			array_push($array_header,$counter_bulan);
			
			$title2 = array('1. Rata-rata kehadiran dalam  Kebaktian Umum.','','','','','','','','','','','','','','','','','','','',$tahun);
			
			array_push($data,$nama_gereja2);
			array_push($data,$pelayanan_gereja);
			array_push($data,$alamat_gereja);
			array_push($data,$blank);
			array_push($data,$title2);
			array_push($data,$blank);
			array_push($data,$header1_2);
			array_push($data,$header2);
			array_push($data,$header3);
			//data rata-rata
			foreach($total_rata_bulanan as $key){
				array_push($data,$key);
				$counter_data++;
			}
			array_push($array_data,$counter_data);
			
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
			
			
			
			
			/*foreach($arr as $key){
				array_push($data,$key);
			}*/
			
			Excel::create('Export Data Kebaktian', function($excel) use($data,$array_header,$array_data) {

				$excel->sheet('Keb.Umum', function($sheet) use($data,$array_header,$array_data){
					
					$sheet->fromArray($data, null, 'A1', false, false);
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
						
						$sheet->cells('S'.($key+4).':T'.($key+4),function($cells){
							$cells->setBackground('#CCFFFF');
						});
						
						$sheet->cells('U'.($key+4),function($cells){
							$cells->setBackground('#FFFF00');
						});
						
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
							
							$cells->setBackground('#CDFFCD');
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
						
						$sheet->cells('A'.($key+9).':A'.($key+9+$jumlah_data-1),function($cells) {
							
							$cells->setAlignment('center');
							$cells->setValignment('center');
						});
						
						$sheet->cells('A'.($key+9).':U'.($key+9+$jumlah_data-1),function($cells) {
							
							$cells->setFont(array(
								'family'     => 'Book Antiqua',
								'size'       => '8',
								'bold'       =>  true
							));
						});
						
						$sheet->cells('E'.($key+9).':E'.($key+9+$jumlah_data-1),function($cells) {
							
							$cells->setAlignment('center');
							$cells->setValignment('center');
						});
						
						$sheet->cells('F'.($key+9).':U'.($key+9+$jumlah_data-1),function($cells) {
							
							$cells->setAlignment('right');
							$cells->setValignment('center');
						});
						
						
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
		$uploadSuccess = true;
		
		if($uploadSuccess){
			//return $destinationPath.$filename;
			$file_path = $destinationPath.$filename;
			//return $file_path;
			//$file_path = 'assets/file_excel/kebaktian/'.$id_gereja.'/Export Data Kebaktian (33).xlsx';
			$result = Excel::selectSheets('Keb.Umum')->load($file_path, function($reader) use($id_gereja){
				// Getting all results
				$reader->noHeading();
				$results = $reader->toArray();
				$counter = 0;
				$counter_f = 0;
				$process = false;
				$process_f = false;
				$tanggal ='';
				foreach($results as $row){
					$counter++;
					if($counter==10){
						$process = true;
					}
					if($process){
						if($row[5]!=""){
							if($row[5] == 'KU'){
								break;
							}
							if($row[5] != 'Jumlah' && $row[5] != 'Rata-rata' && $row[5] != 'Total'){
								if($row[1] != NULL){
									//$tanggal = $this->dateReversal($row[1]);
									$tanggal = $row[1]; //format harus tanggal
								}
								$nama_kegiatan = $row[5];
								
								//select
								
								$kegiatan = Kegiatan::where('id_gereja','=',$id_gereja)->where('tanggal_mulai','=',$tanggal)->where('nama_jenis_kegiatan','=',$nama_kegiatan)->where('deleted','=',0)->get();
								
								for($i = 6; $i<17;$i++){
									if($row[$i] == NULL){
										$row[$i] = 0;
									}
								}
								
								//if exist
								if(count($kegiatan) == 1){
									//update
									DB::table('kegiatan')->where('id',$kegiatan[0]->id)->update(
										array(
											'tanggal_mulai'=>$tanggal,
											'tanggal_selesai'=>$tanggal,
											//'jam_mulai'=>'00:00:00.000000',
											//'jam_selesai'=>'00:00:00.000000',
											'banyak_jemaat_pria'=> $row[6],
											'banyak_jemaat_wanita'=> $row[7],
											//'banyak_jemaat'=>'0',
											'banyak_jemaat'=>$row[8],
											'banyak_simpatisan_pria'=> $row[9],
											'banyak_simpatisan_wanita'=> $row[10],
											//'banyak_simpatisan'=>'0',
											'banyak_simpatisan'=>$row[11],
											'banyak_penatua_pria'=> $row[12],
											'banyak_penatua_wanita'=>$row[13],
											//'banyak_penatua'=>'0',
											'banyak_penatua'=>$row[14],
											'banyak_pemusik_pria'=> $row[15],
											'banyak_pemusik_wanita'=> $row[16],
											//'banyak_pemusik'=>'0',
											'banyak_pemusik'=>$row[17],
											//'banyak_komisi_pria'=> '0',
											//'banyak_komisi_wanita'=> '0',
											//'banyak_komisi'=>'0',
											'keterangan'=>'',
											'deleted'=>0,
											'updated_at'=>Carbon::now()
										)
									);
								}
								else{
									$jenis_kegiatan = JenisKegiatan::where('nama_kegiatan','=',$nama_kegiatan)->first()->id;
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
											'banyak_jemaat_pria'=> $row[6],
											'banyak_jemaat_wanita'=> $row[7],
											//'banyak_jemaat'=>'0',
											'banyak_jemaat'=>$row[8],
											'banyak_simpatisan_pria'=> $row[9],
											'banyak_simpatisan_wanita'=> $row[10],
											//'banyak_simpatisan'=>'0',
											'banyak_simpatisan'=>$row[11],
											'banyak_penatua_pria'=> $row[12],
											'banyak_penatua_wanita'=>$row[13],
											//'banyak_penatua'=>'0',
											'banyak_penatua'=>$row[14],
											'banyak_pemusik_pria'=> $row[15],
											'banyak_pemusik_wanita'=> $row[16],
											//'banyak_pemusik'=>'0',
											'banyak_pemusik'=>$row[17],
											'banyak_komisi_pria'=> '0',
											'banyak_komisi_wanita'=> '0',
											'banyak_komisi'=>'0',
											'keterangan'=>'',
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)
									);
								}
							}
							
							/*var_dump($row);
							echo "<br/>";
							echo "<br/>";*/
						}
						else{
							$process_f = true;
						}
					}
					if($process_f){
						$counter_f++;
						if($counter_f == 10){
							$counter = 0;
							$counter_f = 0;
							$process = false;
							$process_f = false;
						}
					}
					
				}
			});
			
			return "Berhasil";
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
	
	//HARUS PAKE TEMPLATE_DBAJ
	//SKEMA NORMAL :
	//KOLOM NOMOR ANGGOTA HARUS DIBIARKAN KOSONG AJA, KALAU KEISI PUN HARUS HASIL DARI EXPORT DATABASE
	//SKEMA GA NORMAL :
	//IMPORT DATA DENGAN NOMOR ANGGOTA KOSONG BERKALI-KALI
	//NOTE : 
	//alasan 1 mutasi dipakai untuk atestasi yang terakhir
	//alasan 2 mutasi dipakai untuk dkh yang terakhir
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
		
		//inisialisasi REPORT DUPLICATE ROW
		$arr_report = array();					

		if($uploadSuccess){
			
			//return $destinationPath.$filename;
			$file_path = $destinationPath.$filename;
			//return $file_path;																		

			$result = Excel::selectSheets('DATA BASE ANGGOTA')->load($file_path, function($reader) use ($id_gereja, $arr_report){				
			//Excel::selectSheets('DATA BASE ANGGOTA')->load($file_path, function($reader) use ($id_gereja){																			

				// Getting all results
				$reader->skip(6); //maka skrng di row 7
				$reader->noHeading();
				$results = $reader->get();	
				
				//$reader->each(function($row) use($id_gereja){				
				// $count = DB::table('anggota')->orderBy('id', 'desc')->first()->id; //sementara no_anggota = id row di table				
				//$last_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
				//$last_number = count($last_no_anggota) + 1;
				
				foreach($results as $row)
				{							
					if($row[1] == null) //end of record
					{
						break;
					}
					//KOLOM NOMOR ANGGOTA DIBIARKAN KOSONG AJA, KALAU KEISI PUN HARUS HASIL DARI EXPORT									
					$new_no_anggota = ""; 	//reset					
					$no_anggota = "";		//reset					
					if($row[2] == null){
						//GENERATE NOMOR ANGGOTA BARU
						$last_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)->get();
						$last_number = count($last_no_anggota) + 1;
						$new_no_anggota = $id_gereja."_".$last_number;
					}else{					
						$no_anggota = $row[2];						
					}									
					//nama_depan
					if($row[3] == null){
						$nama_depan = "";
					}else{
						$nama_depan = $row[3];
					}
					//nama_tengah
					if($row[4] == null){
						$nama_tengah = "";
					}else{
						$nama_tengah = $row[4];
					}
					//nama_belakang
					if($row[5] == null){
						$nama_belakang = "";
					}else{
						$nama_belakang = $row[5];
					}
					//alamat
					if($row[6] == null){
						$jalan = "";
					}else{
						$jalan = $row[6];
					}
					//kota
					if($row[7] == null){
						$kota = "";
					}else{
						$kota = $row[7];
					}
					//kodepos
					if($row[8] == null){
						$kodepos = "";
					}else{
						$kodepos = $row[8];
					}					
					//telp
					if($row[9] == null){
						$telp = "";
					}else{
						$telp = $row[9];
					}					
					//hp
					if($row[10] == null){
						$hp = "";
					}else{
						$hp = $row[10];
					}					
					//gender
					if($row[11] == null){
						$gender = -1;
					}else if($row[11] == "P" || $row[11] == "p"){
						$gender = 1;
					}else{	//W = w
						$gender = 0;
					}
					//status_anggota
					if($row[12] == null){
						$status_anggota = -1;
					}else if($row[12] == "B" || $row[12] == "b"){
						$status_anggota = 1;
					}else{	//S = s
						$status_anggota = 2;
					}
					//wilayah
					if($row[13] == null){
						$wilayah = "";
					}else{
						$wilayah = $row[13];
					}								
					//pendidikan
					if($row[14] == null){
						$pendidikan = "";
					}else{
						$pendidikan = $row[14];
					}
					//pekerjaan
					if($row[15] == null){
						$pekerjaan = "";
					}else{
						$pekerjaan = $row[15];
					}
					//etnis
					if($row[16] == null){
						$etnis = "";
					}else{
						$etnis = $row[16];
					}
					//golongan darah
					if($row[17] == null){
						$gol_darah = "";
					}else{
						$gol_darah = $row[17];
					}
					//kota_lahir
					if($row[18] == null){
						$kota_lahir = "";
					}else{
						$kota_lahir = $row[18];
					}
					//tanggal_lahir
					if($row[19] == null){
						$tanggal_lahir = "";
					}else{
						$tanggal_lahir = $row[19];
					}																									
					//tanggal_baptis
					if($row[20] == null){
						$tanggal_baptis = "";
					}else{
						$tanggal_baptis = $row[20];
					}
					//tanggal_sidi
					if($row[21] == null){
						$tanggal_sidi = "";
					}else{
						$tanggal_sidi = $row[21];
					}
					//tanggal_atestasi_masuk
					if($row[22] == null){
						$tanggal_atestasi_masuk = "";
					}else{
						$tanggal_atestasi_masuk = $row[22];
					}																									
					//tanggal_atestasi_keluar
					if($row[23] == null){
						$tanggal_atestasi_keluar = "";
					}else{
						$tanggal_atestasi_keluar = $row[23];
					}
					//tanggal_meninggal
					if($row[24] == null){
						$tanggal_meninggal = "";
					}else{
						$tanggal_meninggal = $row[24];
					}
					//tanggal_dkh
					if($row[25] == null){
						$tanggal_dkh = "";
					}else{
						$tanggal_dkh = $row[25];
					}
					//tanggal_ex_dkh
					if($row[26] == null){
						$tanggal_ex_dkh = "";
					}else{
						$tanggal_ex_dkh = $row[26];
					}
					//tanggal_ex_dkh4
					if($row[27] == null){
						$tanggal_ex_dkh4 = "";
					}else{
						$tanggal_ex_dkh4 = $row[27];
					}
					//alasan 1 mutasi
					if($row[28] == null){
						$alasan_1_mutasi = "";
					}else{
						$alasan_1_mutasi = $row[28];
					}
					//alasan 2 mutasi
					if($row[29] == null){
						$alasan_2_mutasi = "";
					}else{
						$alasan_2_mutasi = $row[29];
					}
									
					//NOTE : KALO CELL DI EXCELNYA NULL BAKAL ERROR																																						
					//PREVENTION KALO ORANG SAMPE IMPORT 2X SHEET YANG SAMA				
					//cek nomor anggota kosong atau engga					
					$exist_no_anggota = DB::table('anggota')->where('id_gereja', '=', $id_gereja)
												->where('no_anggota', '=', $no_anggota)
												->first();																					
					$exist_combine = DB::table('anggota')->where('id_gereja', '=', $id_gereja)
													->where('nama_depan', '=', $nama_depan)
													->where('nama_tengah', '=', $nama_tengah)
													->where('nama_belakang', '=', $nama_belakang)
													//->where('tanggal_lahir', '=', $tanggal_lahir)													
													->first();												
													//05/05/1990
					if(count($exist_no_anggota) > 0) //nomor anggota hasil generate dari export database
					{						
						//report duplicate
						$report = $exist_no_anggota->no_anggota." _ ".
									$exist_no_anggota->nama_depan." ".
									$exist_no_anggota->nama_tengah." ".
									$exist_no_anggota->nama_belakang;
						//array_push($arr_report, $report);												
						$arr_report[] = $report;
					}							
					//cek kombinasi nama_depan, nama_tengah, nama_belakang, dan tanggal_lahir
					else if(count($exist_combine) > 0) //worsecase search terus kalo ada duplicate
					{	
						//report duplicate
						$report = $exist_combine->no_anggota." _ ".
									$exist_combine->nama_depan." ".
									$exist_combine->nama_tengah." ".
									$exist_combine->nama_belakang;

						//array_push($arr_report, $report);						
						//$report = "duplicate";
						//array_push($arr_report, $report);
						$arr_report[] = $report;
					}	
					else if(count($exist_no_anggota) == 0 || count($exist_combine) == 0) //new data
					{							
						//START INSERT						
						DB::table('anggota')->insert(
							array(							
								//IT WILL ERROR IF NO_ANGGOTA NOT UNIQUE
								'no_anggota'=>$new_no_anggota, 							
								'nama_depan'=>$nama_depan, 
								'nama_tengah'=>$nama_tengah,
								'nama_belakang'=>$nama_belakang,		
								'telp'=>$telp,
								'gender'=>$gender,
								'status_anggota'=>$status_anggota,
								'wilayah'=>$wilayah,
								'gol_darah'=>$gol_darah, 
								'pendidikan'=>$pendidikan,
								'pekerjaan'=>$pekerjaan,
								'etnis'=>$etnis,
								'kota_lahir'=>$kota_lahir, 
								'tanggal_lahir'=>$tanggal_lahir,
								//'tanggal_meninggal'=>$tanggal_meninggal,
								'role'=>1,
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
						DB::table('hp')->insert(
							array(
								'no_hp'=>$hp,
								'id_anggota'=>$new_anggota->id,																
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);
						$temp_pendeta = DB::table('anggota')
											->where('id_gereja', '=', $id_gereja)
											->where('role', '=', 2)
											->first();
						if($tanggal_baptis != "")
						{
							DB::table('baptis')->insert(
								array(
									//'no_baptis'=>"",
									'id_jemaat'=>$new_anggota->id,
									'id_pendeta'=>$temp_pendeta->id, 
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
									'id_pendeta'=>$temp_pendeta->id, //id anggota Pdt. GKI Ayudia
									'tanggal_baptis'=>$tanggal_sidi,
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
							if($alasan_1_mutasi != null)
							{
								$alasan = DB::table('jenis_atestasi')->where('nama_atestasi', '=', $alasan_1_mutasi)->first();
								if(count($alasan) != 0) //alasan untuk atestasi
								{
									DB::table('atestasi')->insert(
										array(
											//'no_atestasi'=>"",
											'tanggal_atestasi'=>$tanggal_atestasi_masuk,
											//'id_gereja_lama'=>,
											'id_gereja_baru'=>$id_gereja,	
											//'nama_gereja_lama'=>"",
											'nama_gereja_baru'=>Session::get('nama'), //nama gereja login ini
											'id_jenis_atestasi'=>$alasan->id,
											'id_anggota'=>$new_anggota->id,
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)
									);						
								}
								else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
								{
									DB::table('atestasi')->insert(
										array(
											//'no_atestasi'=>"",
											'tanggal_atestasi'=>$tanggal_atestasi_masuk,
											//'id_gereja_lama'=>,
											'id_gereja_baru'=>$id_gereja,
											//'nama_gereja_lama'=>"",
											'nama_gereja_baru'=>Session::get('nama'), //nama gereja login ini
											'id_jenis_atestasi'=>12, //ATP
											'id_anggota'=>$new_anggota->id,
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)
									);	
								}							
							}
							else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_masuk,
										//'id_gereja_lama'=>,
										'id_gereja_baru'=>$id_gereja,
										//'nama_gereja_lama'=>"",
										'nama_gereja_baru'=>Session::get('nama'), //nama gereja login ini
										'id_jenis_atestasi'=>12, //ATP 
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);						
							}						
						}					
						if($tanggal_atestasi_keluar != "")
						{							
							if($alasan_1_mutasi != null)
							{
								$alasan = DB::table('jenis_atestasi')->where('nama_atestasi', '=', $alasan_1_mutasi)->first();
								if(count($alasan) != 0) //alasan untuk atestasi
								{
									DB::table('atestasi')->insert(
										array(
											//'no_atestasi'=>"",
											'tanggal_atestasi'=>$tanggal_atestasi_keluar,
											'id_gereja_lama'=>$id_gereja,
											//'id_gereja_baru'=>,
											'nama_gereja_lama'=>Session::get('nama'), //nama gereja login ini
											//'nama_gereja_baru'=>"",
											'id_jenis_atestasi'=>$alasan->id,
											'id_anggota'=>$new_anggota->id,
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)
									);
								}
								else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
								{
									DB::table('atestasi')->insert(
										array(
											//'no_atestasi'=>"",
											'tanggal_atestasi'=>$tanggal_atestasi_keluar,
											'id_gereja_lama'=>$id_gereja,
											//'id_gereja_baru'=>,
											'nama_gereja_lama'=>Session::get('nama'), //nama gereja login ini
											//'nama_gereja_baru'=>"",
											'id_jenis_atestasi'=>1, //AKK
											'id_anggota'=>$new_anggota->id,
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)
									);
								}
							}	
							else //masuk else kalo sampai ada yang salah masukin data jenis atestasi di excel
							{
								DB::table('atestasi')->insert(
									array(
										//'no_atestasi'=>"",
										'tanggal_atestasi'=>$tanggal_atestasi_keluar,
										'id_gereja_lama'=>$id_gereja,
										//'id_gereja_baru'=>,
										'nama_gereja_lama'=>Session::get('nama'), //nama gereja login ini
										//'nama_gereja_baru'=>"",
										'id_jenis_atestasi'=>1, //AKK
										'id_anggota'=>$new_anggota->id,
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)
								);
							}																											
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
						if($tanggal_dkh != null)
						{
							if($alasan_2_mutasi != null)
							{
								$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_2_mutasi)->first();
								if(count($alasan) != 0) //alasan untuk dkh
								{	
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_dkh,
											'id_jenis_dkh'=>$alasan->id, //dkh1
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);
								}
								else //masuk else kalo sampai ada yang salah masukin data jenis dkh di excel
								{
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_dkh,
											'id_jenis_dkh'=>1, //dkh
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);
								}							
							}
							else
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_dkh,
										'id_jenis_dkh'=>1, //dkh
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}												
						}																										
						if($tanggal_ex_dkh != null)
						{
							if($alasan_2_mutasi != null)
							{
								$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_2_mutasi)->first();
								if(count($alasan) != 0) //alasan untuk dkh
								{
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",											
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_ex_dkh,
											'id_jenis_dkh'=>$alasan->id, //ex-dkh
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);
								}
								else
								{
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_ex_dkh,
											'id_jenis_dkh'=>9, //ex-dkh
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);	
								}
							}
							else
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh,
										'id_jenis_dkh'=>9, //ex-dkh
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}							
						}																										
						if($tanggal_ex_dkh4 != null)
						{
							if($alasan_2_mutasi != null)
							{
								$alasan = DB::table('jenis_dkh')->where('nama_dkh', '=', $alasan_2_mutasi)->first();
								if(count($alasan) != 0) //alasan untuk atestasi
								{	
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_ex_dkh4,
											'id_jenis_dkh'=>$alasan->id, //ex-dkh4
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);
								}
								else
								{
									DB::table('dkh')->insert(
										array(
											'no_dkh'=>"",
											'id_jemaat'=>$new_anggota->id,
											'tanggal_dkh'=>$tanggal_ex_dkh4,
											'id_jenis_dkh'=>13, //ex-dkh4
											'keterangan'=>"",
											'deleted'=>0,
											'created_at'=>Carbon::now(),
											'updated_at'=>Carbon::now()
										)						
									);
								}
							}
							else
							{
								DB::table('dkh')->insert(
									array(
										'no_dkh'=>"",
										'id_jemaat'=>$new_anggota->id,
										'tanggal_dkh'=>$tanggal_ex_dkh4,
										'id_jenis_dkh'=>13, //ex-dkh4
										'keterangan'=>"",
										'deleted'=>0,
										'created_at'=>Carbon::now(),
										'updated_at'=>Carbon::now()
									)						
								);
							}						
						}								
						//END INSERT						
					}																					
				}
			});
			
			//$message = "Berhasil";
			
			//return $message.count($arr_report);
			return 'Berhasil';
			// return $message;		
		}
		else{
			return 'Gagal upload file';
		}
	}

	public function export_kegiatan_plain($id_gereja,$tahun_awal,$tahun_akhir){
	
		$kegiatan = new Kegiatan();
		
		$gereja = Gereja::find($id_gereja);
				
		$result = $kegiatan->where('id_gereja','=',$id_gereja)->where('tanggal_mulai','>=',$tahun_awal.'-04-01')->where('tanggal_mulai','<=',$tahun_akhir.'-03-31')->orderBy('tanggal_mulai')->orderBy('id_jenis_kegiatan')->where('deleted', '=', 0)->get();
		
		//return $result;
		if(count($result) == 0){
			return 'Belum ada data.';
		}

		//create array data

		$arr_header1 = array("Laporan Kebaktian ".$gereja->nama,"","","","","","","","","","","","","","","","","","","","");
		$arr_tahun_pelayanan = array("Tahun Pelayanan ".$tahun_awal."-".$tahun_akhir,"","","","","","","","","","","","","","","","","","","","");
		$clear = array("","","","","","","","","","","","","","","","","","","","","");

		$arr_data = array();

		array_push($arr_data,$arr_header1);
		array_push($arr_data,$arr_tahun_pelayanan);
		array_push($arr_data,$clear);

		$title = array("No","Tanggal","Nama Kebaktian","Jam Mulai","Jam Selesai","Nama Pengkhotbah","Jemaat Pria","Jemaat Wanita","Total Jemaat","Simpatisan Pria","Simpatisan Wanita","Total Simpatisan","Penatua Pria","Penatua Wanita","Total Penatua","Pemusik Pria","Pemusik Wanita","Total Pemusik","Komisi Pria","Komisi Wanita","Total Komisi");
		array_push($arr_data,$title);

		$count = 1;
		foreach($result as $key){
			$row_data = array($count,$key->tanggal_mulai,$key->nama_jenis_kegiatan,$key->jam_mulai,$key->jam_selesai,$key->nama_pendeta,$key->banyak_jemaat_pria,$key->banyak_jemaat_wanita,$key->banyak_jemaat,$key->banyak_simpatisan_pria,$key->banyak_simpatisan_wanita,$key->banyak_simpatisan,$key->banyak_penatua_pria,$key->banyak_penatua_wanita,$key->banyak_penatua,$key->banyak_pemusik_pria,$key->banyak_pemusik_wanita,$key->banyak_pemusik,$key->banyak_komisi_pria,$key->banyak_komisi_wanita,$key->banyak_komisi);
			array_push($arr_data, $row_data);
			$count++;
		}

		Excel::create('Laporan Kebaktian '.$gereja->nama." Tahun Pelayanan ".$tahun_awal."-".$tahun_akhir, function($excel) use($arr_data,$count) {

		    $excel->sheet('Laporan Kebaktian', function($sheet) use($arr_data,$count) {
		        $sheet->fromArray($arr_data, null, 'A1', false, false);
		        $sheet->mergeCells('A1:U1');
		        $sheet->mergeCells('A2:U2');
		        $sheet->mergeCells('A3:U3');
		        $sheet->setBorder('A4:U'.($count+3), 'thin');
		        $sheet->cells('A1:U'.($count+3), function($cells) {						
					$cells->setAlignment('center');
				});
		    });

		})->export('xlsx');
		return "Berhasil";
	}

	public function import_kegiatan_plain($id_gereja){
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
		$uploadSuccess = true;
		if($uploadSuccess){
			$file_path = $destinationPath.$filename;
			$result = Excel::selectSheets('Laporan Kebaktian')->load($file_path, function($reader) use($id_gereja){
				$reader->noHeading();
				$reader->skip(4);
				$reader->formatDates(true, 'Y-m-d');
				$results = $reader->toArray();
				foreach($results as $row){
					$tanggal = $row[2];
					$nama_kegiatan = $row[3];
					if($nama_kegiatan == null || $nama_kegiatan == ""){
						break;
					}
					//check exist
					$kegiatan = Kegiatan::where('id_gereja','=',$id_gereja)->where('tanggal_mulai','=',$tanggal)->where('nama_jenis_kegiatan','=',$nama_kegiatan)->where('deleted','=',0)->get();

					$anggota = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->where('ang.id_gereja', '=', Auth::user()->id_gereja);	
					$anggota = $anggota->where(DB::raw('CONCAT(ang.nama_depan, " " ,ang.nama_tengah, " " ,ang.nama_belakang)'), 'LIKE', '%'.$row[6].'%')->first();
					$id_anggota = 1;
					if($anggota != null){
						$id_anggota = $anggota->id;
					}
					if(count($kegiatan)>0){
						//exist - update
						DB::table('kegiatan')->where('id',$kegiatan[0]->id)->update(
							array(
								'tanggal_mulai'=>$tanggal,
								'tanggal_selesai'=>$tanggal,
								'jam_mulai'=>$row[4],
								'jam_selesai'=>$row[5],
								'id_pendeta'=>$id_anggota,
								'nama_pendeta'=>$row[6],
								'banyak_jemaat_pria'=> $row[7],
								'banyak_jemaat_wanita'=> $row[8],
								'banyak_jemaat'=>$row[9],
								'banyak_simpatisan_pria'=> $row[10],
								'banyak_simpatisan_wanita'=> $row[11],
								'banyak_simpatisan'=>$row[12],
								'banyak_penatua_pria'=> $row[13],
								'banyak_penatua_wanita'=>$row[14],
								'banyak_penatua'=>$row[15],
								'banyak_pemusik_pria'=> $row[16],
								'banyak_pemusik_wanita'=> $row[17],
								'banyak_pemusik'=>$row[18],
								'banyak_komisi_pria'=> $row[19],
								'banyak_komisi_wanita'=> $row[20],
								'banyak_komisi'=>$row[21],
								'keterangan'=>'',
								'deleted'=>0,
								'updated_at'=>Carbon::now()
							)
						);

						$persembahan = Persembahan::where('id_kegiatan','=',$kegiatan[0]->id)->get();

						if(count($persembahan)>0){
							DB::table('persembahan')->where('id_kegiatan',"=",$kegiatan[0]->id)->where("tanggal_persembahan","=",$tanggal)->update(
								array(
									"jumlah_persembahan"=>$row[22],
									"id_gereja"=>$id_gereja,
									"updated_at"=>Carbon::now()
								)
							);
						}
						else{
							DB::table('persembahan')->insert(
								array(
									"tanggal_persembahan"=>$tanggal,
									"jumlah_persembahan"=>$row[22],
									"id_gereja"=>$id_gereja,
									"id_anggota"=>null,
									"id_kegiatan"=>$inserted->id,
									"jenis"=>1,
									'keterangan'=>'',
									'deleted'=>0,
									'created_at'=>Carbon::now(),
									'updated_at'=>Carbon::now()

								)
							);
						}

						
					}
					else{
						$jenis_kegiatan = JenisKegiatan::where('nama_kegiatan','=',$nama_kegiatan)->first()->id;

						//insert
						$inserted = DB::table('kegiatan')->insert(
							array(
								'id_jenis_kegiatan'=>$jenis_kegiatan,
								'nama_jenis_kegiatan'=>$nama_kegiatan,
								'id_gereja'=>$id_gereja,
								'tanggal_mulai'=>$tanggal,
								'tanggal_selesai'=>$tanggal,
								'jam_mulai'=>$row[4],
								'jam_selesai'=>$row[5],
								'id_pendeta'=>$id_anggota,
								'nama_pendeta'=>$row[6],
								'banyak_jemaat_pria'=> $row[7],
								'banyak_jemaat_wanita'=> $row[8],
								'banyak_jemaat'=>$row[9],
								'banyak_simpatisan_pria'=> $row[10],
								'banyak_simpatisan_wanita'=> $row[11],
								'banyak_simpatisan'=>$row[12],
								'banyak_penatua_pria'=> $row[13],
								'banyak_penatua_wanita'=>$row[14],
								'banyak_penatua'=>$row[15],
								'banyak_pemusik_pria'=> $row[16],
								'banyak_pemusik_wanita'=> $row[17],
								'banyak_pemusik'=>$row[18],
								'banyak_komisi_pria'=> $row[19],
								'banyak_komisi_wanita'=> $row[20],
								'banyak_komisi'=>$row[21],
								'keterangan'=>'',
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()
							)
						);

						DB::table('persembahan')->insert(
							array(
								"tanggal_persembahan"=>$tanggal,
								"jumlah_persembahan"=>$row[22],
								"id_gereja"=>$id_gereja,
								"id_anggota"=>null,
								"id_kegiatan"=>$inserted->id,
								"jenis"=>1,
								'keterangan'=>'',
								'deleted'=>0,
								'created_at'=>Carbon::now(),
								'updated_at'=>Carbon::now()

							)
						);
					}
				}
			});
			return "Berhasil";
		}
		else{
			return 'Gagal upload file';
		}
		
		//import begin
		
		

	}
	
	private function getMonthFromNumber($month){
		$month = $month%12;
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
			case 0: return 'Desember';
				
		endswitch;
	}
	
	private function getNumberFromMonth($month){

		switch ($month) :
			case  'Januari': return 1;
			case  'Februari': return 2;
			case  'Maret': return 3;
			case  'April': return 4;
			case  'Mei': return 5;
			case  'Juni': return 6;
			case  'Juli': return 7;
			case  'Agustus': return 8;
			case  'September': return 9;
			case 'Oktober': return 10;
			case 'November': return 11;
			case 'Desember': return 12;
				
		endswitch;
	}
	
	private function dateConverter($date){
		
		$arr_date = explode('-',$date);
		
		return ((int)$arr_date[2]).' '.$this->getMonthFromNumber((int)$arr_date[1]).' '.$arr_date[0];
		
	}
	
	private function dateReversal($date){
		$arr_date = explode(' ',$date);
		return $arr_date[2].'-'.$this->getNumberFromMonth($arr_date[1]).'-'.$arr_date[0];
	}
}

?>