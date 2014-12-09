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
		
		//---------------------------------- DAFTAR GEREJA KLASSIS ----------------------------------		
		// GKI Ayudia
		$gereja2 = new Gereja();		
		$gereja2 -> status = 3;
		$gereja2 -> nama = "GKI Ayudia";
		$gereja2 -> alamat = "Jalan Ayudia no. 10";
		$gereja2 -> kota = "Bandung";
		$gereja2 -> kodepos = "";
		$gereja2 -> telp = "";		
		//$gereja2 -> id_parent_gereja = -99;		
		$gereja2 -> save();
		// GKI Cianjur
		$gereja3 = new Gereja();		
		$gereja3 -> status = 3;
		$gereja3 -> nama = "GKI Cianjur";
		$gereja3 -> alamat = "Jalan HOS Cokroaminoto 55";
		$gereja3 -> kota = "Cianjur";
		$gereja3 -> kodepos = "43215";
		$gereja3 -> telp = "(0263)-262196";		
		//$gereja3 -> id_parent_gereja = -99;		
		$gereja3 -> save();
		// GKI Cimahi
		$gereja4 = new Gereja();		
		$gereja4 -> status = 3;
		$gereja4 -> nama = "GKI Cimahi";
		$gereja4 -> alamat = "Jalan Pacinan no. 32";
		$gereja4 -> kota = "Cimahi";
		$gereja4 -> kodepos = "40525";
		$gereja4 -> telp = "(022)-6632812";		
		//$gereja4 -> id_parent_gereja = -99;		
		$gereja4 -> save();
		// GKI Gatot Subroto
		$gereja5 = new Gereja();		
		$gereja5 -> status = 3;
		$gereja5 -> nama = "GKI Gatot Subroto";
		$gereja5 -> alamat = "Jalan Gatot Subroto no. 405-407";
		$gereja5 -> kota = "Bandung";
		$gereja5 -> kodepos = "40274";
		$gereja5 -> telp = "(022)-7310426";		
		//$gereja5 -> id_parent_gereja = -99;		
		$gereja5 -> save();		
		// GKI Guntur
		$gereja = new Gereja();		
		$gereja -> status = 3;
		$gereja -> nama = "GKI Guntur";
		$gereja -> alamat = "Jalan Guntur no. 13";
		$gereja -> kota = "Bandung";
		$gereja -> kodepos = "40262";
		$gereja -> telp = "(022)-7306232,7310468,7319237";		
		//$gereja -> id_parent_gereja = -99;		
		$gereja -> save();
		// GKI Kebonjati
		$gereja6 = new Gereja();		
		$gereja6 -> status = 3;
		$gereja6 -> nama = "GKI Kebonjati";
		$gereja6 -> alamat = "Jalan Kebonjati 100";
		$gereja6 -> kota = "Bandung";
		$gereja6 -> kodepos = "40181";
		$gereja6 -> telp = "(022)-4235701,4231063";		
		//$gereja6 -> id_parent_gereja = -99;		
		$gereja6 -> save();
		// GKI Maulana Yusuf
		$gereja7 = new Gereja();		
		$gereja7 -> status = 3;
		$gereja7 -> nama = "GKI Maulana Yusuf";
		$gereja7 -> alamat = "Jalan Maulana Yusuf no. 20";
		$gereja7 -> kota = "Bandung";
		$gereja7 -> kodepos = "40115";
		$gereja7 -> telp = "(022)-4232907,4265130";		
		//$gereja7 -> id_parent_gereja = -99;		
		$gereja7 -> save();
		// GKI Pamanukan
		$gereja8 = new Gereja();		
		$gereja8 -> status = 3;
		$gereja8 -> nama = "GKI Pamanukan";
		$gereja8 -> alamat = "Jalan Albasiah 37";
		$gereja8 -> kota = "Pamanukan";
		$gereja8 -> kodepos = "41254";
		$gereja8 -> telp = "(0260)-551172";		
		//$gereja8 -> id_parent_gereja = -99;		
		$gereja8 -> save();
		// GKI Pasirkoja
		$gereja9 = new Gereja();		
		$gereja9 -> status = 3;
		$gereja9 -> nama = "GKI Pasir Kaliki";
		$gereja9 -> alamat = "Jalan Pasirkaliki 157";
		$gereja9 -> kota = "Bandung";
		$gereja9 -> kodepos = "";
		$gereja9 -> telp = "";		
		//$gereja9 -> id_parent_gereja = -99;		
		$gereja9 -> save();
		// GKI Pasirkaliki
		$gereja10 = new Gereja();		
		$gereja10 -> status = 3;
		$gereja10 -> nama = "GKI Pasir Koja";
		$gereja10 -> alamat = "Jalan Terusan Pasirkoja 57";
		$gereja10 -> kota = "Bandung";
		$gereja10 -> kodepos = "40242";
		$gereja10 -> telp = "(022)-6014272";		
		//$gereja10 -> id_parent_gereja = -99;		
		$gereja10 -> save();
		// GKI Sudirman
		$gereja11 = new Gereja();		
		$gereja11 -> status = 3;
		$gereja11 -> nama = "GKI Sudirman";
		$gereja11 -> alamat = "Jalan Sudirman no. 638";
		$gereja11 -> kota = "Bandung";
		$gereja11 -> kodepos = "40213";
		$gereja11 -> telp = "(022)-6002374";		
		//$gereja11 -> id_parent_gereja = -99;		
		$gereja11 -> save();
		
		
		//---------------------------------- ADMIN ----------------------------------				
		$anggota = new Anggota();		
		$anggota -> no_anggota = "Guntur-XX-0001";
		$anggota -> nama_depan = "admin";
		$anggota -> nama_tengah = "admin";
		$anggota -> nama_belakang = "admin";
		$anggota -> telp = "9871235";
		$anggota -> gender = 1;
		$anggota -> wilayah = "I";
		$anggota -> gol_darah = "A +";
		$anggota -> pendidikan = "S-1";
		$anggota -> pekerjaan = "Wirausaha";
		$anggota -> etnis = "T.Hoa";
		$anggota -> kota_lahir = "Bandung";
		$anggota -> tanggal_lahir = "1980-03-03";
		// $anggota -> tanggal_meninggal = "";
		$anggota -> role = 4;	//sebagai majelis
		$anggota -> id_gereja = $gereja->id;
		// $anggota2 -> id_atestasi = -99;
		$anggota -> save();
		
		$acc = new Account();		
		$acc -> username = "admin";
		$acc -> password = Hash::make("admin");
		$acc -> id_anggota = $anggota->id;
		// $acc -> remember_token = "";
		$acc -> role = 1;	//untuk superadmin 
		$acc -> save();
		
		$alamat = new Alamat();
		$alamat -> id_anggota = $anggota->id;
		$alamat -> jalan = "Jalan Admin no 1";
		$alamat -> kota = "Bandung";
		$alamat -> kodepos = "41235";
		$alamat -> save();
		
		$hp = new Hp();
		$hp -> id_anggota = $anggota->id; 
		$hp -> no_hp = "081987123654";
		$hp -> save();
		
		$hp2 = new Hp();
		$hp2 -> id_anggota = $anggota->id;
		$hp2 -> no_hp = "081123987456";
		$hp2 -> save();	
		
		//---------------------------------- USER ----------------------------------									
		$anggota2 = new Anggota();		
		$anggota2 -> no_anggota = "Guntur-XX-0002";
		$anggota2 -> nama_depan = "Bernico";
		$anggota2 -> nama_tengah = "Wuzzy";
		$anggota2 -> nama_belakang = "Bear";
		$anggota2 -> telp = "7654321";
		$anggota2 -> gender = 1;
		$anggota2 -> wilayah = "I";
		$anggota2 -> gol_darah = "A +";
		$anggota2 -> pendidikan = "S-1";
		$anggota2 -> pekerjaan = "Wirausaha";
		$anggota2 -> etnis = "T.Hoa";
		$anggota2 -> kota_lahir = "Bandung";
		$anggota2 -> tanggal_lahir = "1992-09-13";
		$anggota2 -> tanggal_meninggal = null;
		$anggota2 -> role = 1;	//sebagai jemaat
		$anggota2 -> id_gereja = $gereja->id;		
		$anggota2 -> save();
		
		$acc2 = new Account();		
		$acc2 -> username = "userbernico";
		$acc2 -> password = Hash::make("userbernico");
		$acc2 -> id_anggota = $anggota2->id;
		// $acc2 -> remember_token = ""; //auto generate dari laravel
		$acc2 -> role = 0;	//untuk user biasa atau operator TU
		$acc2 -> save();
		
		$alamat2 = new Alamat();
		$alamat2 -> id_anggota = $anggota2->id;
		$alamat2 -> jalan = "Jalan WuzzyBeruang no 13";
		$alamat2 -> kota = "Bandung";
		$alamat2 -> kodepos = "45678";
		$alamat2 -> save();
		
		$hp3 = new Hp();
		$hp3 -> id_anggota = $anggota2->id; 
		$hp3 -> no_hp = "081987654321";
		$hp3 -> save();
		
		$hp4 = new Hp();
		$hp4 -> id_anggota = $anggota2->id;
		$hp4 -> no_hp = "081123456789";
		$hp4 -> save();
		
		//---------------------------------- PENDETA ----------------------------------		
		$anggota3 = new Anggota();		
		$anggota3 -> no_anggota = "Guntur-XX-0003";
		$anggota3 -> nama_depan = "Eddo";
		$anggota3 -> nama_tengah = "Ega";
		$anggota3 -> nama_belakang = "Wirakusuma";
		$anggota3 -> telp = "9876543";
		$anggota3 -> gender = 1;
		$anggota3 -> wilayah = "I";
		$anggota3 -> gol_darah = "A +";
		$anggota3 -> pendidikan = "S-1";
		$anggota3 -> pekerjaan = "Lain-Lain";
		$anggota3 -> etnis = "T.Hoa";
		$anggota3 -> kota_lahir = "Jakarta";
		$anggota3 -> tanggal_lahir = "1980-10-4";
		// $anggota3 -> tanggal_meninggal = "";
		$anggota3 -> role = 2;	//sebagai pendeta
		$anggota3 -> id_gereja = $gereja->id;		
		$anggota3 -> save();
		
		$anggota4 = new Anggota();		
		$anggota4 -> no_anggota = "Guntur-XX-0004";
		$anggota4 -> nama_depan = "Iwan";
		$anggota4 -> nama_tengah = "";
		$anggota4 -> nama_belakang = "Santoso";
		$anggota4 -> telp = "8761235";
		$anggota4 -> gender = 1;
		$anggota4 -> wilayah = "I";
		$anggota4 -> gol_darah = "A +";
		$anggota4 -> pendidikan = "S-1";
		$anggota4 -> pekerjaan = "Lain-Lain";
		$anggota4 -> etnis = "T.Hoa";
		$anggota4 -> kota_lahir = "Bandung";
		$anggota4 -> tanggal_lahir = "1970-12-8";
		// $anggota4 -> tanggal_meninggal = "";
		$anggota4 -> role = 2;	//sebagai pendeta
		$anggota4 -> id_gereja = $gereja->id;		
		$anggota4 -> save();
		
		
		//---------------------------------- USER COWO/CEWE ----------------------------------			
		$idx = 11;
		//insert cowo
		for($i = 1; $i <= 10; $i++)
		{		
			$anggotacowo = new Anggota();		
			$anggotacowo -> no_anggota = "Guntur-XX-000".$idx;
			$anggotacowo -> nama_depan = "pria".$i;
			$anggotacowo -> nama_tengah = "";
			$anggotacowo -> nama_belakang = "";
			$anggotacowo -> telp = "";
			$anggotacowo -> gender = 1;
			$anggotacowo -> wilayah = "I";
			$anggotacowo -> gol_darah = "A +";
			$anggotacowo -> pendidikan = "S-1";
			$anggotacowo -> pekerjaan = "Wirausaha";
			$anggotacowo -> etnis = "T.Hoa";
			$anggotacowo -> kota_lahir = "Bandung";
			$anggotacowo -> tanggal_lahir = "1990-03-03";
			$anggotacowo -> tanggal_meninggal = null;
			$anggotacowo -> role = 1;	//sebagai jemaat
			$anggotacowo -> id_gereja = $gereja->id;			
			$anggotacowo -> save();																
			
			$alamat = new Alamat();
			$alamat -> id_anggota = $anggotacowo->id;
			$alamat -> jalan = "Jalan pria".$i;
			$alamat -> kota = "Bandung";
			$alamat -> kodepos = "64738";
			$alamat -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacowo->id; 
			$hp -> no_hp = "081987654321";
			$hp -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacowo->id;
			$hp -> no_hp = "081123456789";
			$hp -> save();
			
			$idx++;
		}
		//insert cewe
		for($i = 1; $i <= 10; $i++)
		{		
			$anggotacewe = new Anggota();		
			$anggotacewe -> no_anggota = "Guntur-XX-000".$idx;
			$anggotacewe -> nama_depan = "wanita".$i;
			$anggotacewe -> nama_tengah = "";
			$anggotacewe -> nama_belakang = "";
			$anggotacewe -> telp = "";
			$anggotacewe -> gender = 0;
			$anggotacewe -> wilayah = "I";
			$anggotacewe -> gol_darah = "A +";
			$anggotacewe -> pendidikan = "S-1";
			$anggotacewe -> pekerjaan = "Wirausaha";
			$anggotacewe -> etnis = "T.Hoa";
			$anggotacewe -> kota_lahir = "Bandung";
			$anggotacewe -> tanggal_lahir = "1990-06-06";
			$anggotacewe -> tanggal_meninggal = null;
			$anggotacewe -> role = 1;	//sebagai jemaat
			$anggotacewe -> id_gereja = $gereja->id;			
			$anggotacewe -> save();																
			
			$alamat = new Alamat();
			$alamat -> id_anggota = $anggotacewe->id;
			$alamat -> jalan = "Jalan wanita".$i;
			$alamat -> kota = "Bandung";
			$alamat -> kodepos = "73846";
			$alamat -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacewe->id; 
			$hp -> no_hp = "081987654321";
			$hp -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacewe->id;
			$hp -> no_hp = "081123456789";
			$hp -> save();
			
			$idx++;
		}		
				
		//---------------------------------- JENIS KEGIATAN ----------------------------------		
		// note 'nama_kegiatan' :
				// - kebaktian umum 1
				// - kebaktian umum 2
				// - kebaktian umum 3
				// - kebaktian umum 4
				// - kebaktian umum 5
				// - kebaktian anak 
				// - kebaktian remaja
				// - kebaktian pemuda
				// yang tertulis di textfield sendiri : penyegaran iman, jumat agung, rabu abu, kamis putih			
		$jeniskegiatan1 = new JenisKegiatan();
		$jeniskegiatan1 -> nama_kegiatan = "kebaktian umum 1";
		$jeniskegiatan1 -> save();
		
		$jeniskegiatan2 = new JenisKegiatan();
		$jeniskegiatan2 -> nama_kegiatan = "kebaktian umum 2";
		$jeniskegiatan2 -> save();
		
		$jeniskegiatan3 = new JenisKegiatan();
		$jeniskegiatan3 -> nama_kegiatan = "kebaktian umum 3";
		$jeniskegiatan3 -> save();
		
		$jeniskegiatan4 = new JenisKegiatan();
		$jeniskegiatan4 -> nama_kegiatan = "kebaktian umum 4";
		$jeniskegiatan4 -> save();
		
		$jeniskegiatan5 = new JenisKegiatan();
		$jeniskegiatan5 -> nama_kegiatan = "kebaktian umum 5";
		$jeniskegiatan5 -> save();
		
		$jeniskegiatan6 = new JenisKegiatan();
		$jeniskegiatan6 -> nama_kegiatan = "kebaktian anak";
		$jeniskegiatan6 -> save();
		
		$jeniskegiatan7 = new JenisKegiatan();
		$jeniskegiatan7 -> nama_kegiatan = "kebaktian remaja";
		$jeniskegiatan7 -> save();
		
		$jeniskegiatan8 = new JenisKegiatan();
		$jeniskegiatan8 -> nama_kegiatan = "kebaktian pemuda";
		$jeniskegiatan8 -> save();		
				
		//---------------------------------- JENIS ATESTASI ----------------------------------
		$jenisatestasi1 = new JenisAtestasi();
		$jenisatestasi1 -> nama_atestasi = "atestasi masuk";
		$jenisatestasi1 -> keterangan = "surat pemindahan keanggotaan masuk ke suatu gereja";
		$jenisatestasi1 -> save();
		
		$jenisatestasi2 = new JenisAtestasi();
		$jenisatestasi2 -> nama_atestasi = "atestasi keluar";
		$jenisatestasi2 -> keterangan = "surat pemindahan keanggotaan keluar dari suatu gereja";
		$jenisatestasi2 -> save();
		
		$jenisatestasi3 = new JenisAtestasi();
		$jenisatestasi3 -> nama_atestasi = "(atestasi lain)";
		$jenisatestasi3 -> keterangan = "(surat pemindahan lain)";
		$jenisatestasi3 -> save();		
				
		//---------------------------------- JENIS BAPTIS ----------------------------------
		$jenisbaptis1 = new JenisBaptis();
		$jenisbaptis1 -> nama_jenis_baptis = "baptis anak";
		$jenisbaptis1 -> keterangan = "pembaptisan untuk anak";
		$jenisbaptis1 -> save();
		
		$jenisbaptis2 = new JenisBaptis();
		$jenisbaptis2 -> nama_jenis_baptis = "baptis sidi";
		$jenisbaptis2 -> keterangan = "pembaptisan secara sidi";
		$jenisbaptis2 -> save();
		
		$jenisbaptis3 = new JenisBaptis();
		$jenisbaptis3 -> nama_jenis_baptis = "baptis dewasa";
		$jenisbaptis3 -> keterangan = "pembaptisan untuk dewasa";
		$jenisbaptis3 -> save();		
		
				
	}

}
