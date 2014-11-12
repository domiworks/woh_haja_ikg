<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');		
		
		//---------------------------------- USER ----------------------------------					
		$gereja = new Gereja();		
		$gereja -> status = 3;
		$gereja -> nama = "GKI Guntur";
		$gereja -> alamat = "Jalan Guntur 13 Bandung";
		$gereja -> telp = "022 1111111";		
		//$gereja -> id_parent_gereja = -99;		
		$gereja -> save();
		
		$anggota = new Anggota();		
		$anggota -> no_anggota = "1234";
		$anggota -> nama_depan = "bernico";
		$anggota -> nama_tengah = "wuzzy";
		$anggota -> nama_belakang = "bear";
		$anggota -> telp = "7654321";
		$anggota -> gender = 1;
		$anggota -> wilayah = "I";
		$anggota -> gol_darah = "A +";
		$anggota -> pendidikan = "S-1";
		$anggota -> pekerjaan = "Wirausaha";
		$anggota -> etnis = "T.Hoa";
		$anggota -> kota_lahir = "Bandung";
		$anggota -> tanggal_lahir = "1992-09-13";
		$anggota -> tanggal_meninggal = null;
		$anggota -> role = 1;	//sebagai jemaat
		$anggota -> id_gereja = $gereja->id;
		$anggota -> id_atestasi = null;
		$anggota -> save();
		
		$acc = new Account();		
		$acc -> username = "userbernico";
		$acc -> password = Hash::make("userbernico");
		$acc -> id_anggota = $anggota->id;
		// $acc -> remember_token = ""; //auto generate dari laravel
		$acc -> role = 0;	//untuk user biasa atau operator TU
		$acc -> save();
		
		$alamat = new Alamat();
		$alamat -> id_anggota = $anggota->id;
		$alamat -> jalan = "jalan userbernico";
		$alamat -> kota = "kota userbernico";
		$alamat -> kodepos = "kodepos userbernico";
		$alamat -> save();
		
		$hp = new Hp();
		$hp -> id_anggota = $anggota->id; 
		$hp -> no_hp = "hp1 userbernico";
		$hp -> save();
		
		$hp2 = new Hp();
		$hp2 -> id_anggota = $anggota->id;
		$hp2 -> no_hp = "hp2 userbernico";
		$hp2 -> save();
				
		
		//---------------------------------- ADMIN ----------------------------------				
		$anggota2 = new Anggota();		
		$anggota2 -> no_anggota = "nojemaat admin";
		$anggota2 -> nama_depan = "namadepan admin";
		$anggota2 -> nama_tengah = "namatengah admin";
		$anggota2 -> nama_belakang = "namabelakang admin";
		$anggota2 -> telp = "telp admin";
		$anggota2 -> gender = 1;
		$anggota2 -> wilayah = "I";
		$anggota2 -> gol_darah = "A +";
		$anggota2 -> pendidikan = "S-1";
		$anggota2 -> pekerjaan = "Wirausaha";
		$anggota2 -> etnis = "T.Hoa";
		$anggota2 -> kota_lahir = "kotalahir admin";
		$anggota2 -> tanggal_lahir = "1992-09-13";
		// $anggota2 -> tanggal_meninggal = "";
		$anggota2 -> role = 4;	//sebagai majelis
		$anggota2 -> id_gereja = $gereja->id;
		// $anggota2 -> id_atestasi = -99;
		$anggota2 -> save();
		
		$acc2 = new Account();		
		$acc2 -> username = "admin";
		$acc2 -> password = Hash::make("admin");
		$acc2 -> id_anggota = $anggota2->id;
		// $acc2 -> remember_token = "";
		$acc2 -> role = 1;	//untuk superadmin 
		$acc2 -> save();
		
		$alamat2 = new Alamat();
		$alamat2 -> id_anggota = $anggota2->id;
		$alamat2 -> jalan = "jalan admin";
		$alamat2 -> kota = "kota admin";
		$alamat2 -> kodepos = "kodepos admin";
		$alamat2 -> save();
		
		$hp3 = new Hp();
		$hp3 -> id_anggota = $anggota2->id; 
		$hp3 -> no_hp = "hp1 admin";
		$hp3 -> save();
		
		$hp4 = new Hp();
		$hp4 -> id_anggota = $anggota2->id;
		$hp4 -> no_hp = "hp2 admin";
		$hp4 -> save();		
				
		//---------------------------------- USER CEWE ----------------------------------	
		$anggotacewe = new Anggota();		
		$anggotacewe -> no_anggota = "4321";
		$anggotacewe -> nama_depan = "franda";
		$anggotacewe -> nama_tengah = "tengah";
		$anggotacewe -> nama_belakang = "belakang";
		$anggotacewe -> telp = "7654321";
		$anggotacewe -> gender = 0;
		$anggotacewe -> wilayah = "I";
		$anggotacewe -> gol_darah = "A +";
		$anggotacewe -> pendidikan = "S-1";
		$anggotacewe -> pekerjaan = "Wirausaha";
		$anggotacewe -> etnis = "T.Hoa";
		$anggotacewe -> kota_lahir = "Bandung";
		$anggotacewe -> tanggal_lahir = "1992-09-13";
		$anggotacewe -> tanggal_meninggal = null;
		$anggotacewe -> role = 1;	//sebagai jemaat
		$anggotacewe -> id_gereja = $gereja->id;
		$anggotacewe -> id_atestasi = null;
		$anggotacewe -> save();
		
		//---------------------------------- PENDETA ----------------------------------
		
		$anggota3 = new Anggota();		
		$anggota3 -> no_anggota = "no_ang pendeta1";
		$anggota3 -> nama_depan = "namadepan pendeta1";
		$anggota3 -> nama_tengah = "namatengah pendeta1";
		$anggota3 -> nama_belakang = "namabelakang pendeta1";
		$anggota3 -> telp = "telp pendeta1";
		$anggota3 -> gender = 1;
		$anggota3 -> wilayah = "I";
		$anggota3 -> gol_darah = "A +";
		$anggota3 -> pendidikan = "S-1";
		$anggota3 -> pekerjaan = "Wirausaha";
		$anggota3 -> etnis = "T.Hoa";
		$anggota3 -> kota_lahir = "kotalahir admin";
		$anggota3 -> tanggal_lahir = "1992-09-13";
		// $anggota3 -> tanggal_meninggal = "";
		$anggota3 -> role = 2;	//sebagai pendeta
		$anggota3 -> id_gereja = $gereja->id;
		// $anggota3 -> id_atestasi = -99;
		$anggota3 -> save();
		
		$anggota4 = new Anggota();		
		$anggota4 -> no_anggota = "no_ang pendeta2";
		$anggota4 -> nama_depan = "namadepan pendeta2";
		$anggota4 -> nama_tengah = "namatengah pendeta2";
		$anggota4 -> nama_belakang = "namabelakang pendeta2";
		$anggota4 -> telp = "telp pendeta2";
		$anggota4 -> gender = 0;
		$anggota4 -> wilayah = "I";
		$anggota4 -> gol_darah = "A +";
		$anggota4 -> pendidikan = "S-1";
		$anggota4 -> pekerjaan = "Wirausaha";
		$anggota4 -> etnis = "T.Hoa";
		$anggota4 -> kota_lahir = "kotalahir admin";
		$anggota4 -> tanggal_lahir = "1992-09-13";
		// $anggota4 -> tanggal_meninggal = "";
		$anggota4 -> role = 2;	//sebagai pendeta
		$anggota4 -> id_gereja = $gereja->id;
		// $anggota4 -> id_atestasi = -99;
		$anggota4 -> save();
		
		//---------------------------------- JENIS KEGIATAN ----------------------------------
		$jeniskegiatan1 = new JenisKegiatan();
		$jeniskegiatan1 -> nama_kegiatan = "kebaktian 1";
		$jeniskegiatan1 -> save();
		
		$jeniskegiatan2 = new JenisKegiatan();
		$jeniskegiatan2 -> nama_kegiatan = "kebaktian 2";
		$jeniskegiatan2 -> save();
		
		$jeniskegiatan3 = new JenisKegiatan();
		$jeniskegiatan3 -> nama_kegiatan = "kebaktian 3";
		$jeniskegiatan3 -> save();
		
		$jeniskegiatan4 = new JenisKegiatan();
		$jeniskegiatan4 -> nama_kegiatan = "kebaktian 4";
		$jeniskegiatan4 -> save();
		
		//---------------------------------- JENIS ATESTASI ----------------------------------
		$jenisatestasi1 = new JenisAtestasi();
		$jenisatestasi1 -> nama_atestasi = "jenis atestasi 1";
		$jenisatestasi1 -> save();
		
		$jenisatestasi2 = new JenisAtestasi();
		$jenisatestasi2 -> nama_atestasi = "jenis atestasi 2";
		$jenisatestasi2 -> save();
		
		$jenisatestasi3 = new JenisAtestasi();
		$jenisatestasi3 -> nama_atestasi = "jenis atestasi 3";
		$jenisatestasi3 -> save();
		
		//---------------------------------- JENIS BAPTIS ----------------------------------
		$jenisbaptis1 = new JenisBaptis();
		$jenisbaptis1 -> nama_jenis_baptis = "jenis baptis 1";
		$jenisbaptis1 -> save();
		
		$jenisbaptis2 = new JenisBaptis();
		$jenisbaptis2 -> nama_jenis_baptis = "jenis baptis 2";
		$jenisbaptis2 -> save();
		
		$jenisbaptis3 = new JenisBaptis();
		$jenisbaptis3 -> nama_jenis_baptis = "jenis baptis 3";
		$jenisbaptis3 -> save();
		
		//---------------------------------- DAFTAR GEREJA KLASSIS ----------------------------------
		// GKI Ayudia
		$gereja2 = new Gereja();		
		$gereja2 -> status = 3;
		$gereja2 -> nama = "GKI Ayudia";
		$gereja2 -> alamat = "Jalan GKI Ayudia";
		$gereja2 -> telp = "022 222222";		
		//$gereja2 -> id_parent_gereja = -99;		
		$gereja2 -> save();
		// GKI Cianjur
		$gereja3 = new Gereja();		
		$gereja3 -> status = 3;
		$gereja3 -> nama = "GKI Cianjur";
		$gereja3 -> alamat = "Jalan GKI Cianjur";
		$gereja3 -> telp = "022 333333";		
		//$gereja3 -> id_parent_gereja = -99;		
		$gereja3 -> save();
		// GKI Cimahi
		$gereja4 = new Gereja();		
		$gereja4 -> status = 3;
		$gereja4 -> nama = "GKI Cimahi";
		$gereja4 -> alamat = "Jalan GKI Cimahi";
		$gereja4 -> telp = "022 4444444";		
		//$gereja4 -> id_parent_gereja = -99;		
		$gereja4 -> save();
		// GKI Gatot Subroto
		$gereja5 = new Gereja();		
		$gereja5 -> status = 3;
		$gereja5 -> nama = "GKI Gatot Subroto";
		$gereja5 -> alamat = "Jalan GKI Gatot Subroto";
		$gereja5 -> telp = "022 5555555";		
		//$gereja5 -> id_parent_gereja = -99;		
		$gereja5 -> save();
		// GKI Guntur
			//udh di add di bagian atas line 17
		// GKI Kebonjati
		$gereja6 = new Gereja();		
		$gereja6 -> status = 3;
		$gereja6 -> nama = "GKI Kebonjati";
		$gereja6 -> alamat = "Jalan GKI Kebonjati";
		$gereja6 -> telp = "022 6666666";		
		//$gereja6 -> id_parent_gereja = -99;		
		$gereja6 -> save();
		// GKI Maulana Yusuf
		$gereja7 = new Gereja();		
		$gereja7 -> status = 3;
		$gereja7 -> nama = "GKI Maulana Yusuf";
		$gereja7 -> alamat = "Jalan GKI Maulana Yusuf";
		$gereja7 -> telp = "022 7777777";		
		//$gereja7 -> id_parent_gereja = -99;		
		$gereja7 -> save();
		// GKI Pamanukan
		$gereja8 = new Gereja();		
		$gereja8 -> status = 3;
		$gereja8 -> nama = "GKI Pamanukan";
		$gereja8 -> alamat = "Jalan GKI Pamanukan";
		$gereja8 -> telp = "022 88888888";		
		//$gereja8 -> id_parent_gereja = -99;		
		$gereja8 -> save();
		// GKI Pasirkoja
		$gereja9 = new Gereja();		
		$gereja9 -> status = 3;
		$gereja9 -> nama = "GKI Pasirkoja";
		$gereja9 -> alamat = "Jalan GKI Pasirkoja";
		$gereja9 -> telp = "022 99999999";		
		//$gereja9 -> id_parent_gereja = -99;		
		$gereja9 -> save();
		// GKI Pasirkaliki
		$gereja10 = new Gereja();		
		$gereja10 -> status = 3;
		$gereja10 -> nama = "GKI Pasirkaliki";
		$gereja10 -> alamat = "Jalan GKI Pasirkaliki";
		$gereja10 -> telp = "022 1010101010";		
		//$gereja10 -> id_parent_gereja = -99;		
		$gereja10 -> save();
		// GKI Sudirman
		$gereja11 = new Gereja();		
		$gereja11 -> status = 3;
		$gereja11 -> nama = "GKI Sudirman";
		$gereja11 -> alamat = "Jalan GKI Sudirman";
		$gereja11 -> telp = "022 11111111111";		
		//$gereja11 -> id_parent_gereja = -99;		
		$gereja11 -> save();	
			
	}

}
