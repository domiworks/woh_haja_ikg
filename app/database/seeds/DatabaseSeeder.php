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
		//SUMBER : http://sinodegki.org/
		// GKI Ayudia
		$gereja2 = new Gereja();		
		$gereja2 -> status = 3;
		$gereja2 -> nama = "GKI Ayudia";
		$gereja2 -> alamat = "Jalan Ayudia no. 10";
		$gereja2 -> kota = "Bandung";
		$gereja2 -> kodepos = "40172";
		$gereja2 -> telp = "(022)-6013341";		
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
		$gereja9 -> kodepos = "40164";
		$gereja9 -> telp = "(022)-2012354";		
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
		
		//---------------------------------- AKUN -----------------------------------				
		$acc = new Account();		
		$acc -> username = "superadmin";
		$acc -> password = Hash::make("superadmin");
		$acc -> id_gereja = null;		
		$acc -> role = 2;	//untuk superadmin 
		$acc -> save();
			//-----------------------------
		$acc1 = new Account();
		$acc1 -> username = "adminayudia";
		$acc1 -> password = Hash::make("adminayudia");
		$acc1 -> id_gereja = $gereja2->id; //GKI Ayudia
		$acc1 -> role = 1;
		$acc1 -> save();

		$acc2 = new Account();
		$acc2 -> username = "admincianjur";
		$acc2 -> password = Hash::make("admincianjur");
		$acc2 -> id_gereja = $gereja3->id; //GKI Cianjur
		$acc2 -> role = 1;
		$acc2 -> save();

		$acc3 = new Account();
		$acc3 -> username = "admincimahi";
		$acc3 -> password = Hash::make("admincimahi");
		$acc3 -> id_gereja = $gereja4->id; //GKI Cimahi
		$acc3 -> role = 1;
		$acc3 -> save();

		$acc4 = new Account();
		$acc4 -> username = "admingatotsubroto";
		$acc4 -> password = Hash::make("admingatotsubroto");
		$acc4 -> id_gereja = $gereja5->id; //GKI Gatot Subroto
		$acc4 -> role = 1;
		$acc4 -> save();

		$acc5 = new Account();
		$acc5 -> username = "adminguntur";
		$acc5 -> password = Hash::make("adminguntur");
		$acc5 -> id_gereja = $gereja->id; //GKI Guntur
		$acc5 -> role = 1;
		$acc5 -> save();

		$acc6 = new Account();
		$acc6 -> username = "adminkebonjati";
		$acc6 -> password = Hash::make("adminkebonjati");
		$acc6 -> id_gereja = $gereja6->id; //GKI Kebonjati
		$acc6 -> role = 1;
		$acc6 -> save();

		$acc7 = new Account();
		$acc7 -> username = "adminmaulanayusuf";
		$acc7 -> password = Hash::make("adminmaulanayusuf");
		$acc7 -> id_gereja = $gereja7->id; //GKI Maulana Yusuf
		$acc7 -> role = 1;
		$acc7 -> save();

		$acc8 = new Account();
		$acc8 -> username = "adminpamanukan";
		$acc8 -> password = Hash::make("adminpamanukan");
		$acc8 -> id_gereja = $gereja8->id; //GKI Pamanukan
		$acc8 -> role = 1;
		$acc8 -> save();

		$acc9 = new Account();
		$acc9 -> username = "adminpasirkaliki";
		$acc9 -> password = Hash::make("adminpasirkaliki");
		$acc9 -> id_gereja = $gereja9->id; //GKI Pasir Kaliki
		$acc9 -> role = 1;
		$acc9 -> save();

		$acc10 = new Account();
		$acc10 -> username = "adminpasirkoja";
		$acc10 -> password = Hash::make("adminpasirkoja");
		$acc10 -> id_gereja = $gereja10->id; //GKI Pasir Koja
		$acc10 -> role = 1;
		$acc10 -> save();

		$acc11 = new Account();
		$acc11 -> username = "adminsudirman";
		$acc11 -> password = Hash::make("adminsudirman");
		$acc11 -> id_gereja = $gereja11->id; //GKI Sudirman
		$acc11 -> role = 1;
		$acc11 -> save();
			//-----------------------------
		$acc1 = new Account();
		$acc1 -> username = "userayudia";
		$acc1 -> password = Hash::make("userayudia");
		$acc1 -> id_gereja = $gereja2->id; //GKI Ayudia
		$acc1 -> role = 0;
		$acc1 -> save();

		$acc2 = new Account();
		$acc2 -> username = "usercianjur";
		$acc2 -> password = Hash::make("usercianjur");
		$acc2 -> id_gereja = $gereja3->id; //GKI Cianjur
		$acc2 -> role = 0;
		$acc2 -> save();

		$acc3 = new Account();
		$acc3 -> username = "usercimahi";
		$acc3 -> password = Hash::make("usercimahi");
		$acc3 -> id_gereja = $gereja4->id; //GKI Cimahi
		$acc3 -> role = 0;
		$acc3 -> save();

		$acc4 = new Account();
		$acc4 -> username = "usergatotsubroto";
		$acc4 -> password = Hash::make("usergatotsubroto");
		$acc4 -> id_gereja = $gereja5->id; //GKI Gatot Subroto
		$acc4 -> role = 0;
		$acc4 -> save();

		$acc5 = new Account();
		$acc5 -> username = "userguntur";
		$acc5 -> password = Hash::make("userguntur");
		$acc5 -> id_gereja = $gereja->id; //GKI Guntur
		$acc5 -> role = 0;
		$acc5 -> save();

		$acc6 = new Account();
		$acc6 -> username = "userkebonjati";
		$acc6 -> password = Hash::make("userkebonjati");
		$acc6 -> id_gereja = $gereja6->id; //GKI Kebonjati
		$acc6 -> role = 0;
		$acc6 -> save();

		$acc7 = new Account();
		$acc7 -> username = "usermaulanayusuf";
		$acc7 -> password = Hash::make("usermaulanayusuf");
		$acc7 -> id_gereja = $gereja7->id; //GKI Maulana Yusuf
		$acc7 -> role = 0;
		$acc7 -> save();

		$acc8 = new Account();
		$acc8 -> username = "userpamanukan";
		$acc8 -> password = Hash::make("userpamanukan");
		$acc8 -> id_gereja = $gereja8->id; //GKI Pamanukan
		$acc8 -> role = 0;
		$acc8 -> save();

		$acc9 = new Account();
		$acc9 -> username = "userpasirkaliki";
		$acc9 -> password = Hash::make("userpasirkaliki");
		$acc9 -> id_gereja = $gereja9->id; //GKI Pasir Kaliki
		$acc9 -> role = 0;
		$acc9 -> save();

		$acc10 = new Account();
		$acc10 -> username = "userpasirkoja";
		$acc10 -> password = Hash::make("userpasirkoja");
		$acc10 -> id_gereja = $gereja10->id; //GKI Pasir Koja
		$acc10 -> role = 0;
		$acc10 -> save();

		$acc11 = new Account();
		$acc11 -> username = "usersudirman";
		$acc11 -> password = Hash::make("usersudirman");
		$acc11 -> id_gereja = $gereja11->id; //GKI Sudirman
		$acc11 -> role = 0;
		$acc11 -> save();			
		
		
		//---------------------------------- PENDETA ----------------------------------		
		$anggota3 = new Anggota();		
		$anggota3 -> no_anggota = "Guntur-XX-0001";
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
		
			$alamat3 = new Alamat();
			$alamat3 -> id_anggota = $anggota3->id;
			$alamat3 -> jalan = "Jalan Macan";
			$alamat3 -> kota = "Bandung";
			$alamat3 -> kodepos = "45678";
			$alamat3 -> save();
			
			$hp3 = new Hp();
			$hp3 -> id_anggota = $anggota3->id; 
			$hp3 -> no_hp = "081987654321";
			$hp3 -> save();
			
			$hp3 = new Hp();
			$hp3 -> id_anggota = $anggota3->id;
			$hp3 -> no_hp = "081123456789";
			$hp3 -> save();
			
		$anggota4 = new Anggota();		
		$anggota4 -> no_anggota = "Guntur-XX-0002";
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
		
			$alamat4 = new Alamat();
			$alamat4 -> id_anggota = $anggota4->id;
			$alamat4 -> jalan = "Jalan Kangkung";
			$alamat4 -> kota = "Bandung";
			$alamat4 -> kodepos = "87642";
			$alamat4 -> save();
			
			$hp4 = new Hp();
			$hp4 -> id_anggota = $anggota4->id; 
			$hp4 -> no_hp = "081987654321";
			$hp4 -> save();
			
			$hp4 = new Hp();
			$hp4 -> id_anggota = $anggota4->id;
			$hp4 -> no_hp = "081123456789";
			$hp4 -> save();
			
		
		//---------------------------------- USER COWO/CEWE ----------------------------------			
		$idx = 3;
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
					
		
		//---------------------------------- DATA KEGIATAN/KEBAKTIAN ----------------------------------		
		$kebaktian = new Kegiatan();			
		$kebaktian->id_jenis_kegiatan = 1;
		$kebaktian->nama_jenis_kegiatan = 'kebaktian umum 1';
		$kebaktian->id_pendeta = 1; //pendeta eddo
		$kebaktian->nama_pendeta = 'Eddo Ega Wirakusuma';
		$kebaktian->tanggal_mulai = '2014-12-07';
		$kebaktian->tanggal_selesai = '2014-12-07';
		$kebaktian->jam_mulai = '07:00';
		$kebaktian->jam_selesai = '08:30';	
		$kebaktian->banyak_jemaat_pria = 0;
		$kebaktian->banyak_jemaat_wanita = 0;
		$kebaktian->banyak_jemaat = 150;		
		$kebaktian->banyak_simpatisan_pria = 0;
		$kebaktian->banyak_simpatisan_wanita = 0;
		$kebaktian->banyak_simpatisan = 10;		
		$kebaktian->banyak_penatua_pria = 0;
		$kebaktian->banyak_penatua_wanita = 0;
		$kebaktian->banyak_penatua = 20;
		$kebaktian->banyak_komisi_pria = 0;
		$kebaktian->banyak_komisi_wanita = 0;
		$kebaktian->banyak_komisi = 15;		
		$kebaktian->banyak_pemusik_pria = 0;
		$kebaktian->banyak_pemusik_wanita = 0;
		$kebaktian->banyak_pemusik = 5;				
		$kebaktian->id_gereja = $gereja->id; //id GKI Guntur		
		$kebaktian->deleted = 0;
		$kebaktian->save();
			$persembahan = new Persembahan();
			$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
			$persembahan->jumlah_persembahan = 4000000;
			$persembahan->id_kegiatan = $kebaktian->id;
			$persembahan->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
			$persembahan->deleted = 0;			
			$persembahan->save();
		
		$kebaktian2 = new Kegiatan();			
		$kebaktian2->id_jenis_kegiatan = 2;
		$kebaktian2->nama_jenis_kegiatan = 'kebaktian umum 2';
		$kebaktian2->id_pendeta = 1; //pendeta eddo
		$kebaktian2->nama_pendeta = 'Eddo Ega Wirakusuma';
		$kebaktian2->tanggal_mulai = '2014-12-07';
		$kebaktian2->tanggal_selesai = '2014-12-07';
		$kebaktian2->jam_mulai = '09:30';
		$kebaktian2->jam_selesai = '11:00';	
		$kebaktian2->banyak_jemaat_pria = 0;		
		$kebaktian2->banyak_jemaat_wanita = 0;
		$kebaktian2->banyak_jemaat = 200;
		$kebaktian2->banyak_simpatisan_pria = 0;		
		$kebaktian2->banyak_simpatisan_wanita = 0;
		$kebaktian2->banyak_simpatisan = 10;
		$kebaktian2->banyak_penatua_pria = 0;
		$kebaktian2->banyak_penatua_wanita = 0;
		$kebaktian2->banyak_penatua = 20;
		$kebaktian2->banyak_komisi_pria = 0;
		$kebaktian2->banyak_komisi_wanita = 0;
		$kebaktian2->banyak_komisi = 15;
		$kebaktian2->banyak_pemusik_pria = 0;
		$kebaktian2->banyak_pemusik_wanita = 0;
		$kebaktian2->banyak_pemusik = 5;				
		$kebaktian2->id_gereja = $gereja->id; //id GKI Guntur		
		$kebaktian2->deleted = 0;
		$kebaktian2->save();
			$persembahan2 = new Persembahan();
			$persembahan2->tanggal_persembahan = $kebaktian2->tanggal_mulai;
			$persembahan2->jumlah_persembahan = 5000000;
			$persembahan2->id_kegiatan = $kebaktian2->id;
			$persembahan2->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
			$persembahan2->deleted = 0;			
			$persembahan2->save();
			
		$kebaktian3 = new Kegiatan();			
		$kebaktian3->id_jenis_kegiatan = 3;
		$kebaktian3->nama_jenis_kegiatan = 'kebaktian umum 3';
		$kebaktian3->id_pendeta = 2; //pendeta eddo
		$kebaktian3->nama_pendeta = 'Iwan Santoso';
		$kebaktian3->tanggal_mulai = '2014-12-07';
		$kebaktian3->tanggal_selesai = '2014-12-07';
		$kebaktian3->jam_mulai = '17:00';
		$kebaktian3->jam_selesai = '18:30';		
		$kebaktian3->banyak_jemaat_pria = 0;		
		$kebaktian3->banyak_jemaat_wanita = 0;
		$kebaktian3->banyak_jemaat = 100;
		$kebaktian3->banyak_simpatisan_pria = 0;
		$kebaktian3->banyak_simpatisan_wanita = 0;
		$kebaktian3->banyak_simpatisan = 10;	
		$kebaktian3->banyak_penatua_pria = 0;
		$kebaktian3->banyak_penatua_wanita = 0;
		$kebaktian3->banyak_penatua = 20;		
		$kebaktian3->banyak_komisi_pria = 0;
		$kebaktian3->banyak_komisi_wanita = 0;
		$kebaktian3->banyak_komisi = 15;
		$kebaktian3->banyak_pemusik_pria = 0;
		$kebaktian3->banyak_pemusik_wanita = 0;
		$kebaktian3->banyak_pemusik = 5;				
		$kebaktian3->id_gereja = $gereja->id; //id GKI Guntur		
		$kebaktian3->deleted = 0;
		$kebaktian3->save();
			$persembahan3 = new Persembahan();
			$persembahan3->tanggal_persembahan = $kebaktian3->tanggal_mulai;
			$persembahan3->jumlah_persembahan = 3000000;
			$persembahan3->id_kegiatan = $kebaktian3->id;
			$persembahan3->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
			$persembahan3->deleted = 0;			
			$persembahan3->save();	
	}

}
