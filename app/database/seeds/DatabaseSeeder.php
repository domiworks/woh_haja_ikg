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
		$gereja1 = new Gereja();		
		$gereja1 -> status = 3;
		$gereja1 -> nama = "GKI Ayudia";
		$gereja1 -> alamat = "Jalan Ayudia no. 10";
		$gereja1 -> kota = "Bandung";
		$gereja1 -> kodepos = "40172";
		$gereja1 -> telp = "(022)-6013341";		
		//$gereja1 -> id_parent_gereja = -99;		
		$gereja1 -> save();
		// GKI Cianjur
		$gereja2 = new Gereja();		
		$gereja2 -> status = 3;
		$gereja2 -> nama = "GKI Cianjur";
		$gereja2 -> alamat = "Jalan HOS Cokroaminoto 55";
		$gereja2 -> kota = "Cianjur";
		$gereja2 -> kodepos = "43215";
		$gereja2 -> telp = "(0263)-262196";		
		//$gereja2 -> id_parent_gereja = -99;		
		$gereja2 -> save();
		// GKI Cimahi
		$gereja3 = new Gereja();		
		$gereja3 -> status = 3;
		$gereja3 -> nama = "GKI Cimahi";
		$gereja3 -> alamat = "Jalan Pacinan no. 32";
		$gereja3 -> kota = "Cimahi";
		$gereja3 -> kodepos = "40525";
		$gereja3 -> telp = "(022)-6632812";		
		//$gereja3 -> id_parent_gereja = -99;		
		$gereja3 -> save();
		// GKI Gatot Subroto
		$gereja4 = new Gereja();		
		$gereja4 -> status = 3;
		$gereja4 -> nama = "GKI Gatot Subroto";
		$gereja4 -> alamat = "Jalan Gatot Subroto no. 405-407";
		$gereja4 -> kota = "Bandung";
		$gereja4 -> kodepos = "40274";
		$gereja4 -> telp = "(022)-7310426";		
		//$gereja4 -> id_parent_gereja = -99;		
		$gereja4 -> save();		
		// GKI Guntur
		$gereja5 = new Gereja();		
		$gereja5 -> status = 3;
		$gereja5 -> nama = "GKI Guntur";
		$gereja5 -> alamat = "Jalan Guntur no. 13";
		$gereja5 -> kota = "Bandung";
		$gereja5 -> kodepos = "40262";
		$gereja5 -> telp = "(022)-7306232,7310468,7319237";		
		//$gereja5 -> id_parent_gereja = -99;		
		$gereja5 -> save();
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
		$acc1 -> id_gereja = $gereja1->id; //GKI Ayudia
		$acc1 -> role = 1;	//untuk admin
		$acc1 -> save();

		$acc2 = new Account();
		$acc2 -> username = "admincianjur";
		$acc2 -> password = Hash::make("admincianjur");
		$acc2 -> id_gereja = $gereja2->id; //GKI Cianjur
		$acc2 -> role = 1;	//untuk admin
		$acc2 -> save();

		$acc3 = new Account();
		$acc3 -> username = "admincimahi";
		$acc3 -> password = Hash::make("admincimahi");
		$acc3 -> id_gereja = $gereja3->id; //GKI Cimahi
		$acc3 -> role = 1;	//untuk admin
		$acc3 -> save();

		$acc4 = new Account();
		$acc4 -> username = "admingatotsubroto";
		$acc4 -> password = Hash::make("admingatotsubroto");
		$acc4 -> id_gereja = $gereja4->id; //GKI Gatot Subroto
		$acc4 -> role = 1;	//untuk admin
		$acc4 -> save();

		$acc5 = new Account();
		$acc5 -> username = "adminguntur";
		$acc5 -> password = Hash::make("adminguntur");
		$acc5 -> id_gereja = $gereja5->id; //GKI Guntur
		$acc5 -> role = 1;	//untuk admin
		$acc5 -> save();

		$acc6 = new Account();
		$acc6 -> username = "adminkebonjati";
		$acc6 -> password = Hash::make("adminkebonjati");
		$acc6 -> id_gereja = $gereja6->id; //GKI Kebonjati
		$acc6 -> role = 1;	//untuk admin
		$acc6 -> save();

		$acc7 = new Account();
		$acc7 -> username = "adminmaulanayusuf";
		$acc7 -> password = Hash::make("adminmaulanayusuf");
		$acc7 -> id_gereja = $gereja7->id; //GKI Maulana Yusuf
		$acc7 -> role = 1;	//untuk admin
		$acc7 -> save();

		$acc8 = new Account();
		$acc8 -> username = "adminpamanukan";
		$acc8 -> password = Hash::make("adminpamanukan");
		$acc8 -> id_gereja = $gereja8->id; //GKI Pamanukan
		$acc8 -> role = 1;	//untuk admin
		$acc8 -> save();

		$acc9 = new Account();
		$acc9 -> username = "adminpasirkaliki";
		$acc9 -> password = Hash::make("adminpasirkaliki");
		$acc9 -> id_gereja = $gereja9->id; //GKI Pasir Kaliki
		$acc9 -> role = 1;	//untuk admin
		$acc9 -> save();

		$acc10 = new Account();
		$acc10 -> username = "adminpasirkoja";
		$acc10 -> password = Hash::make("adminpasirkoja");
		$acc10 -> id_gereja = $gereja10->id; //GKI Pasir Koja
		$acc10 -> role = 1;	//untuk admin
		$acc10 -> save();

		$acc11 = new Account();
		$acc11 -> username = "adminsudirman";
		$acc11 -> password = Hash::make("adminsudirman");
		$acc11 -> id_gereja = $gereja11->id; //GKI Sudirman
		$acc11 -> role = 1;	//untuk admin
		$acc11 -> save();
			//-----------------------------
		$acc1 = new Account();
		$acc1 -> username = "userayudia";
		$acc1 -> password = Hash::make("userayudia");
		$acc1 -> id_gereja = $gereja1->id; //GKI Ayudia
		$acc1 -> role = 0;	//untuk user
		$acc1 -> save();

		$acc2 = new Account();
		$acc2 -> username = "usercianjur";
		$acc2 -> password = Hash::make("usercianjur");
		$acc2 -> id_gereja = $gereja2->id; //GKI Cianjur
		$acc2 -> role = 0;	//untuk user
		$acc2 -> save();

		$acc3 = new Account();
		$acc3 -> username = "usercimahi";
		$acc3 -> password = Hash::make("usercimahi");
		$acc3 -> id_gereja = $gereja3->id; //GKI Cimahi
		$acc3 -> role = 0;	//untuk user
		$acc3 -> save();

		$acc4 = new Account();
		$acc4 -> username = "usergatotsubroto";
		$acc4 -> password = Hash::make("usergatotsubroto");
		$acc4 -> id_gereja = $gereja4->id; //GKI Gatot Subroto
		$acc4 -> role = 0;	//untuk user
		$acc4 -> save();

		$acc5 = new Account();
		$acc5 -> username = "userguntur";
		$acc5 -> password = Hash::make("userguntur");
		$acc5 -> id_gereja = $gereja5->id; //GKI Guntur
		$acc5 -> role = 0;	//untuk user
		$acc5 -> save();

		$acc6 = new Account();
		$acc6 -> username = "userkebonjati";
		$acc6 -> password = Hash::make("userkebonjati");
		$acc6 -> id_gereja = $gereja6->id; //GKI Kebonjati
		$acc6 -> role = 0;	//untuk user
		$acc6 -> save();

		$acc7 = new Account();
		$acc7 -> username = "usermaulanayusuf";
		$acc7 -> password = Hash::make("usermaulanayusuf");
		$acc7 -> id_gereja = $gereja7->id; //GKI Maulana Yusuf
		$acc7 -> role = 0;	//untuk user
		$acc7 -> save();

		$acc8 = new Account();
		$acc8 -> username = "userpamanukan";
		$acc8 -> password = Hash::make("userpamanukan");
		$acc8 -> id_gereja = $gereja8->id; //GKI Pamanukan
		$acc8 -> role = 0;	//untuk user
		$acc8 -> save();

		$acc9 = new Account();
		$acc9 -> username = "userpasirkaliki";
		$acc9 -> password = Hash::make("userpasirkaliki");
		$acc9 -> id_gereja = $gereja9->id; //GKI Pasir Kaliki
		$acc9 -> role = 0;	//untuk user
		$acc9 -> save();

		$acc10 = new Account();
		$acc10 -> username = "userpasirkoja";
		$acc10 -> password = Hash::make("userpasirkoja");
		$acc10 -> id_gereja = $gereja10->id; //GKI Pasir Koja
		$acc10 -> role = 0;	//untuk user
		$acc10 -> save();

		$acc11 = new Account();
		$acc11 -> username = "usersudirman";
		$acc11 -> password = Hash::make("usersudirman");
		$acc11 -> id_gereja = $gereja11->id; //GKI Sudirman
		$acc11 -> role = 0;	//untuk user
		$acc11 -> save();			
		
		
		//---------------------------------- PENDETA ----------------------------------		
		
		$anggota1 = new Anggota();		
		$anggota1 -> no_anggota = $gereja1->id."-1";
		$anggota1 -> nama_depan = "Pdt. ".$gereja1->nama; //required
		$anggota1 -> nama_tengah = "";
		$anggota1 -> nama_belakang = "";
		$anggota1 -> telp = "";
		$anggota1 -> gender = 1; //required
		//$anggota1 -> status_anggota = 0;
		$anggota1 -> wilayah = "";
		$anggota1 -> gol_darah = "";
		$anggota1 -> pendidikan = "";
		$anggota1 -> pekerjaan = "";
		$anggota1 -> etnis = "";
		$anggota1 -> kota_lahir = "";
		$anggota1 -> tanggal_lahir = "1970-".$gereja1->id."-".$gereja1->id; //required
		// $anggota1 -> tanggal_meninggal = "";
		$anggota1 -> role = 2;	//sebagai pendeta
		$anggota1 -> id_gereja = $gereja1->id;		
		$anggota1 -> save();
		
			$alamat1 = new Alamat();
			$alamat1 -> id_anggota = $anggota1->id;
			$alamat1 -> jalan = "Jalan xxxx";
			$alamat1 -> kota = "Kota xxxx";
			$alamat1 -> kodepos = "11111";
			$alamat1 -> save();
			
			$hp1 = new Hp();
			$hp1 -> id_anggota = $anggota1->id; 
			$hp1 -> no_hp = "081123456789";
			$hp1 -> save();

		$anggota2 = new Anggota();		
		$anggota2 -> no_anggota = $gereja2->id."-1";
		$anggota2 -> nama_depan = "Pdt. ".$gereja2->nama; //required
		$anggota2 -> nama_tengah = "";
		$anggota2 -> nama_belakang = "";
		$anggota2 -> telp = "";
		$anggota2 -> gender = 1; //required
		//$anggota2 -> status_anggota = 0;
		$anggota2 -> wilayah = "";
		$anggota2 -> gol_darah = "";
		$anggota2 -> pendidikan = "";
		$anggota2 -> pekerjaan = "";
		$anggota2 -> etnis = "";
		$anggota2 -> kota_lahir = "";
		$anggota2 -> tanggal_lahir = "1970-".$gereja2->id."-".$gereja2->id; //required
		// $anggota2 -> tanggal_meninggal = "";
		$anggota2 -> role = 2;	//sebagai pendeta
		$anggota2 -> id_gereja = $gereja2->id;		
		$anggota2 -> save();
		
			$alamat2 = new Alamat();
			$alamat2 -> id_anggota = $anggota2->id;
			$alamat2 -> jalan = "Jalan xxxx";
			$alamat2 -> kota = "Kota xxxx";
			$alamat2 -> kodepos = "11111";
			$alamat2 -> save();
			
			$hp2 = new Hp();
			$hp2 -> id_anggota = $anggota2->id; 
			$hp2 -> no_hp = "081123456789";
			$hp2 -> save();
			
		$anggota3 = new Anggota();		
		$anggota3 -> no_anggota = $gereja3->id."-1";
		$anggota3 -> nama_depan = "Pdt. ".$gereja3->nama; //required
		$anggota3 -> nama_tengah = "";
		$anggota3 -> nama_belakang = "";
		$anggota3 -> telp = "";
		$anggota3 -> gender = 1; //required
		//$anggota3 -> status_anggota = 0;
		$anggota3 -> wilayah = "";
		$anggota3 -> gol_darah = "";
		$anggota3 -> pendidikan = "";
		$anggota3 -> pekerjaan = "";
		$anggota3 -> etnis = "";
		$anggota3 -> kota_lahir = "";
		$anggota3 -> tanggal_lahir = "1970-".$gereja3->id."-".$gereja3->id; //required
		// $anggota3 -> tanggal_meninggal = "";
		$anggota3 -> role = 2;	//sebagai pendeta
		$anggota3 -> id_gereja = $gereja3->id;		
		$anggota3 -> save();
		
			$alamat3 = new Alamat();
			$alamat3 -> id_anggota = $anggota3->id;
			$alamat3 -> jalan = "Jalan xxxx";
			$alamat3 -> kota = "Kota xxxx";
			$alamat3 -> kodepos = "11111";
			$alamat3 -> save();
			
			$hp3 = new Hp();
			$hp3 -> id_anggota = $anggota3->id; 
			$hp3 -> no_hp = "081123456789";
			$hp3 -> save();

		$anggota4 = new Anggota();		
		$anggota4 -> no_anggota = $gereja4->id."-1";
		$anggota4 -> nama_depan = "Pdt. ".$gereja4->nama; //required
		$anggota4 -> nama_tengah = "";
		$anggota4 -> nama_belakang = "";
		$anggota4 -> telp = "";
		$anggota4 -> gender = 1; //required
		//$anggota4 -> status_anggota = 0;
		$anggota4 -> wilayah = "";
		$anggota4 -> gol_darah = "";
		$anggota4 -> pendidikan = "";
		$anggota4 -> pekerjaan = "";
		$anggota4 -> etnis = "";
		$anggota4 -> kota_lahir = "";
		$anggota4 -> tanggal_lahir = "1970-".$gereja4->id."-".$gereja4->id; //required
		// $anggota4 -> tanggal_meninggal = "";
		$anggota4 -> role = 2;	//sebagai pendeta
		$anggota4 -> id_gereja = $gereja4->id;		
		$anggota4 -> save();
		
			$alamat4 = new Alamat();
			$alamat4 -> id_anggota = $anggota4->id;
			$alamat4 -> jalan = "Jalan xxxx";
			$alamat4 -> kota = "Kota xxxx";
			$alamat4 -> kodepos = "11111";
			$alamat4 -> save();
			
			$hp4 = new Hp();
			$hp4 -> id_anggota = $anggota4->id; 
			$hp4 -> no_hp = "081123456789";
			$hp4 -> save();				
	
		$anggota5 = new Anggota();		
		$anggota5 -> no_anggota = $gereja5->id."-1";
		$anggota5 -> nama_depan = "Pdt. ".$gereja5->nama; //required
		$anggota5 -> nama_tengah = "";
		$anggota5 -> nama_belakang = "";
		$anggota5 -> telp = "";
		$anggota5 -> gender = 1; //required
		//$anggota5 -> status_anggota = 0;
		$anggota5 -> wilayah = "";
		$anggota5 -> gol_darah = "";
		$anggota5 -> pendidikan = "";
		$anggota5 -> pekerjaan = "";
		$anggota5 -> etnis = "";
		$anggota5 -> kota_lahir = "";
		$anggota5 -> tanggal_lahir = "1970-".$gereja5->id."-".$gereja5->id; //required
		// $anggota5 -> tanggal_meninggal = "";
		$anggota5 -> role = 2;	//sebagai pendeta
		$anggota5 -> id_gereja = $gereja5->id;		
		$anggota5 -> save();
		
			$alamat5 = new Alamat();
			$alamat5 -> id_anggota = $anggota5->id;
			$alamat5 -> jalan = "Jalan xxxx";
			$alamat5 -> kota = "Kota xxxx";
			$alamat5 -> kodepos = "11111";
			$alamat5 -> save();
			
			$hp5 = new Hp();
			$hp5 -> id_anggota = $anggota5->id; 
			$hp5 -> no_hp = "081123456789";
			$hp5 -> save();

		$anggota6 = new Anggota();		
		$anggota6 -> no_anggota = $gereja6->id."-1";
		$anggota6 -> nama_depan = "Pdt. ".$gereja6->nama; //required
		$anggota6 -> nama_tengah = "";
		$anggota6 -> nama_belakang = "";
		$anggota6 -> telp = "";
		$anggota6 -> gender = 1; //required
		//$anggota6 -> status_anggota = 0;
		$anggota6 -> wilayah = "";
		$anggota6 -> gol_darah = "";
		$anggota6 -> pendidikan = "";
		$anggota6 -> pekerjaan = "";
		$anggota6 -> etnis = "";
		$anggota6 -> kota_lahir = "";
		$anggota6 -> tanggal_lahir = "1970-".$gereja6->id."-".$gereja6->id; //required
		// $anggota6 -> tanggal_meninggal = "";
		$anggota6 -> role = 2;	//sebagai pendeta
		$anggota6 -> id_gereja = $gereja6->id;		
		$anggota6 -> save();
		
			$alamat6 = new Alamat();
			$alamat6 -> id_anggota = $anggota6->id;
			$alamat6 -> jalan = "Jalan xxxx";
			$alamat6 -> kota = "Kota xxxx";
			$alamat6 -> kodepos = "11111";
			$alamat6 -> save();
			
			$hp6 = new Hp();
			$hp6 -> id_anggota = $anggota6->id; 
			$hp6 -> no_hp = "081123456789";
			$hp6 -> save();

		$anggota7 = new Anggota();		
		$anggota7 -> no_anggota = $gereja7->id."-1";
		$anggota7 -> nama_depan = "Pdt. ".$gereja7->nama; //required
		$anggota7 -> nama_tengah = "";
		$anggota7 -> nama_belakang = "";
		$anggota7 -> telp = "";
		$anggota7 -> gender = 1; //required
		//$anggota7 -> status_anggota = 0;
		$anggota7 -> wilayah = "";
		$anggota7 -> gol_darah = "";
		$anggota7 -> pendidikan = "";
		$anggota7 -> pekerjaan = "";
		$anggota7 -> etnis = "";
		$anggota7 -> kota_lahir = "";
		$anggota7 -> tanggal_lahir = "1970-".$gereja7->id."-".$gereja7->id; //required
		// $anggota7 -> tanggal_meninggal = "";
		$anggota7 -> role = 2;	//sebagai pendeta
		$anggota7 -> id_gereja = $gereja7->id;		
		$anggota7 -> save();
		
			$alamat7 = new Alamat();
			$alamat7 -> id_anggota = $anggota7->id;
			$alamat7 -> jalan = "Jalan xxxx";
			$alamat7 -> kota = "Kota xxxx";
			$alamat7 -> kodepos = "11111";
			$alamat7 -> save();
			
			$hp7 = new Hp();
			$hp7 -> id_anggota = $anggota7->id; 
			$hp7 -> no_hp = "081123456789";
			$hp7 -> save();

		$anggota8 = new Anggota();		
		$anggota8 -> no_anggota = $gereja8->id."-1";
		$anggota8 -> nama_depan = "Pdt. ".$gereja8->nama; //required
		$anggota8 -> nama_tengah = "";
		$anggota8 -> nama_belakang = "";
		$anggota8 -> telp = "";
		$anggota8 -> gender = 1; //required
		//$anggota8 -> status_anggota = 0;
		$anggota8 -> wilayah = "";
		$anggota8 -> gol_darah = "";
		$anggota8 -> pendidikan = "";
		$anggota8 -> pekerjaan = "";
		$anggota8 -> etnis = "";
		$anggota8 -> kota_lahir = "";
		$anggota8 -> tanggal_lahir = "1970-".$gereja8->id."-".$gereja8->id; //required
		// $anggota8 -> tanggal_meninggal = "";
		$anggota8 -> role = 2;	//sebagai pendeta
		$anggota8 -> id_gereja = $gereja8->id;		
		$anggota8 -> save();
		
			$alamat8 = new Alamat();
			$alamat8 -> id_anggota = $anggota8->id;
			$alamat8 -> jalan = "Jalan xxxx";
			$alamat8 -> kota = "Kota xxxx";
			$alamat8 -> kodepos = "11111";
			$alamat8 -> save();
			
			$hp8 = new Hp();
			$hp8 -> id_anggota = $anggota8->id; 
			$hp8 -> no_hp = "081123456789";
			$hp8 -> save();

		$anggota9 = new Anggota();		
		$anggota9 -> no_anggota = $gereja9->id."-1";
		$anggota9 -> nama_depan = "Pdt. ".$gereja9->nama; //required
		$anggota9 -> nama_tengah = "";
		$anggota9 -> nama_belakang = "";
		$anggota9 -> telp = "";
		$anggota9 -> gender = 1; //required
		//$anggota9 -> status_anggota = 0;
		$anggota9 -> wilayah = "";
		$anggota9 -> gol_darah = "";
		$anggota9 -> pendidikan = "";
		$anggota9 -> pekerjaan = "";
		$anggota9 -> etnis = "";
		$anggota9 -> kota_lahir = "";
		$anggota9 -> tanggal_lahir = "1970-".$gereja9->id."-".$gereja9->id; //required
		// $anggota9 -> tanggal_meninggal = "";
		$anggota9 -> role = 2;	//sebagai pendeta
		$anggota9 -> id_gereja = $gereja9->id;		
		$anggota9 -> save();
		
			$alamat9 = new Alamat();
			$alamat9 -> id_anggota = $anggota9->id;
			$alamat9 -> jalan = "Jalan xxxx";
			$alamat9 -> kota = "Kota xxxx";
			$alamat9 -> kodepos = "11111";
			$alamat9 -> save();
			
			$hp9 = new Hp();
			$hp9 -> id_anggota = $anggota9->id; 
			$hp9 -> no_hp = "081123456789";
			$hp9 -> save();

		$anggota10 = new Anggota();		
		$anggota10 -> no_anggota = $gereja10->id."-1";
		$anggota10 -> nama_depan = "Pdt. ".$gereja10->nama; //required
		$anggota10 -> nama_tengah = "";
		$anggota10 -> nama_belakang = "";
		$anggota10 -> telp = "";
		$anggota10 -> gender = 1; //required
		//$anggota10 -> status_anggota = 0;
		$anggota10 -> wilayah = "";
		$anggota10 -> gol_darah = "";
		$anggota10 -> pendidikan = "";
		$anggota10 -> pekerjaan = "";
		$anggota10 -> etnis = "";
		$anggota10 -> kota_lahir = "";
		$anggota10 -> tanggal_lahir = "1970-".$gereja10->id."-".$gereja10->id; //required
		// $anggota10 -> tanggal_meninggal = "";
		$anggota10 -> role = 2;	//sebagai pendeta
		$anggota10 -> id_gereja = $gereja10->id;		
		$anggota10 -> save();
		
			$alamat10 = new Alamat();
			$alamat10 -> id_anggota = $anggota10->id;
			$alamat10 -> jalan = "Jalan xxxx";
			$alamat10 -> kota = "Kota xxxx";
			$alamat10 -> kodepos = "11111";
			$alamat10 -> save();
			
			$hp10 = new Hp();
			$hp10 -> id_anggota = $anggota10->id; 
			$hp10 -> no_hp = "081123456789";
			$hp10 -> save();

		$anggota11 = new Anggota();		
		$anggota11 -> no_anggota = $gereja11->id."-1";
		$anggota11 -> nama_depan = "Pdt. ".$gereja11->nama; //required
		$anggota11 -> nama_tengah = "";
		$anggota11 -> nama_belakang = "";
		$anggota11 -> telp = "";
		$anggota11 -> gender = 1; //required
		//$anggota11 -> status_anggota = 0;
		$anggota11 -> wilayah = "";
		$anggota11 -> gol_darah = "";
		$anggota11 -> pendidikan = "";
		$anggota11 -> pekerjaan = "";
		$anggota11 -> etnis = "";
		$anggota11 -> kota_lahir = "";
		$anggota11 -> tanggal_lahir = "1970-".$gereja11->id."-".$gereja11->id; //required
		// $anggota11 -> tanggal_meninggal = "";
		$anggota11 -> role = 2;	//sebagai pendeta
		$anggota11 -> id_gereja = $gereja11->id;		
		$anggota11 -> save();
		
			$alamat11 = new Alamat();
			$alamat11 -> id_anggota = $anggota11->id;
			$alamat11 -> jalan = "Jalan xxxx";
			$alamat11 -> kota = "Kota xxxx";
			$alamat11 -> kodepos = "11111";
			$alamat11 -> save();
			
			$hp11 = new Hp();
			$hp11 -> id_anggota = $anggota11->id; 
			$hp11 -> no_hp = "081123456789";
			$hp11 -> save();
		
		//---------------------------------- USER COWO/CEWE ----------------------------------			
		/*		
		//insert cowo guntur
		$idx = 2;	
		$date = date_create('2016-01-03');
		for($i = 1; $i <= 200; $i++)
		//for($i = 1; $i <= 10; $i++)
		{		
			$anggotacowo = new Anggota();		
			$anggotacowo -> no_anggota = $gereja5->id."-".$idx;
			$anggotacowo -> nama_depan = "cowo ".$idx; //required
			$anggotacowo -> nama_tengah = "";
			$anggotacowo -> nama_belakang = "";
			$anggotacowo -> telp = "";
			$anggotacowo -> gender = 1; //required
			//$anggotacowo -> status_anggota = 0;
			$anggotacowo -> wilayah = "";
			$anggotacowo -> gol_darah = "";
			$anggotacowo -> pendidikan = "";
			$anggotacowo -> pekerjaan = "";
			$anggotacowo -> etnis = "";
			$anggotacowo -> kota_lahir = "";
			$anggotacowo -> tanggal_lahir = rand(1950, 1990)."-".rand(1, 12)."-".rand(1, 31); //required
			// $anggotacowo -> tanggal_meninggal = "";
			$anggotacowo -> role = 1;	//sebagai jemaat
			$anggotacowo -> id_gereja = $gereja5->id;		
			$anggotacowo -> created_at = date_format($date, 'Y-m-d'); 
			$anggotacowo -> save();														
			
			$alamat = new Alamat();
			$alamat -> id_anggota = $anggotacowo->id;
			$alamat -> jalan = "Jalan pria".$i;
			$alamat -> kota = "Bandung";
			$alamat -> kodepos = "456382";
			$alamat -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacowo->id; 
			$hp -> no_hp = "081947382648";
			$hp -> save();						
			
			$idx++;		
			$count = rand(10, 20);	
			$count = $count." days";
			//date_add($date, date_interval_create_from_date_string('7 days'));	
			date_add($date, date_interval_create_from_date_string($count));	
		}
		//insert cewe guntur
		for($i = 1; $i <= 200; $i++)
		//for($i = 1; $i <= 10; $i++)
		{		
			$anggotacewe = new Anggota();		
			$anggotacewe -> no_anggota = $gereja5->id."-".$idx;
			$anggotacewe -> nama_depan = "cewe ".$idx; //required
			$anggotacewe -> nama_tengah = "";
			$anggotacewe -> nama_belakang = "";
			$anggotacewe -> telp = "";
			$anggotacewe -> gender = 0; //required
			//$anggotacewe -> status_anggota = 0;
			$anggotacewe -> wilayah = "";
			$anggotacewe -> gol_darah = "";
			$anggotacewe -> pendidikan = "";
			$anggotacewe -> pekerjaan = "";
			$anggotacewe -> etnis = "";
			$anggotacewe -> kota_lahir = "";
			$anggotacewe -> tanggal_lahir = rand(1950, 1990)."-".rand(1, 12)."-".rand(1, 31); //required
			// $anggotacewe -> tanggal_meninggal = "";
			$anggotacewe -> role = 1;	//sebagai jemaat
			$anggotacewe -> id_gereja = $gereja5->id;		
			$anggotacewe -> created_at = date_format($date, 'Y-m-d'); 
			$anggotacewe -> save();														
			
			$alamat = new Alamat();
			$alamat -> id_anggota = $anggotacewe->id;
			$alamat -> jalan = "Jalan wanita".$i;
			$alamat -> kota = "Bandung";
			$alamat -> kodepos = "758492";
			$alamat -> save();
			
			$hp = new Hp();
			$hp -> id_anggota = $anggotacewe->id; 
			$hp -> no_hp = "081738465912";
			$hp -> save();						
			
			$idx++;
			$count = rand(10, 20);	
			$count = $count." days";
			//date_add($date, date_interval_create_from_date_string('7 days'));	
			date_add($date, date_interval_create_from_date_string($count));	
		}				
		*/
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
		$jenisatestasi1 -> nama_atestasi = "AKK";
		$jenisatestasi1 -> keterangan = "Angka pengurangan, karena pindah keanggotaan ( Atestasi keluar )";
		$jenisatestasi1 -> save();

		$jenisatestasi2 = new JenisAtestasi();
		$jenisatestasi2 -> nama_atestasi = "AKK-1";
		$jenisatestasi2 -> keterangan = "Atestasi Keluar ( Wajar )";
		$jenisatestasi2 -> save();

		$jenisatestasi3 = new JenisAtestasi();
		$jenisatestasi3 -> nama_atestasi = "AKK-2";
		$jenisatestasi3 -> keterangan = "Daya dorong dari dalam / daya tarik dari luar";
		$jenisatestasi3 -> save();

		$jenisatestasi4 = new JenisAtestasi();
		$jenisatestasi4 -> nama_atestasi = "AKK-3";
		$jenisatestasi4 -> keterangan = "Atestasi Keluar Anak ( Ikut Ortu )";
		$jenisatestasi4 -> save();

		$jenisatestasi5 = new JenisAtestasi();
		$jenisatestasi5 -> nama_atestasi = "ATL";
		$jenisatestasi5 -> keterangan = "Angka pertambahan karena kelahiran dalam keluarga";
		$jenisatestasi5 -> save();

		$jenisatestasi6 = new JenisAtestasi();
		$jenisatestasi6 -> nama_atestasi = "ATD";
		$jenisatestasi6 -> keterangan = "Angka pertambahan karena Baptis Kudus Dewasa";
		$jenisatestasi6 -> save();

		$jenisatestasi7 = new JenisAtestasi();
		$jenisatestasi7 -> nama_atestasi = "ATD-1";
		$jenisatestasi7 -> keterangan = "Dari bukan keluarga Kristen (percaya baru)";
		$jenisatestasi7 -> save();

		$jenisatestasi8 = new JenisAtestasi();
		$jenisatestasi8 -> nama_atestasi = "ATD-2";
		$jenisatestasi8 -> keterangan = "Dari keluarga Kristen ( belum baptis anak )";
		$jenisatestasi8 -> save();

		$jenisatestasi9 = new JenisAtestasi();
		$jenisatestasi9 -> nama_atestasi = "ATIS";
		$jenisatestasi9 -> keterangan = "Angka pertumbuhan hasil inkubasi iman lintas generasi melalui Sidi";
		$jenisatestasi9 -> save();

		$jenisatestasi10 = new JenisAtestasi();
		$jenisatestasi10 -> nama_atestasi = "ATIOT";
		$jenisatestasi10 -> keterangan = "Angka pertambahan anak baru, karena ikut Baptis bersama-sama orang tuanya.";
		$jenisatestasi10 -> save();

		$jenisatestasi11 = new JenisAtestasi();
		$jenisatestasi11 -> nama_atestasi = "ATPS";
		$jenisatestasi11 -> keterangan = "Angka pertambahan karena pindah dari gereja lain melalui Sidi";
		$jenisatestasi11 -> save();

		$jenisatestasi12 = new JenisAtestasi();
		$jenisatestasi12 -> nama_atestasi = "ATP";
		$jenisatestasi12 -> keterangan = "Angka pertambahan, karena pindah dari gereja lain ( Atestasi Masuk )";
		$jenisatestasi12 -> save();

		$jenisatestasi13 = new JenisAtestasi();
		$jenisatestasi13 -> nama_atestasi = "ATP-1";
		$jenisatestasi13 -> keterangan = "Atestasi Masuk Dewasa";
		$jenisatestasi13 -> save();

		$jenisatestasi14 = new JenisAtestasi();
		$jenisatestasi14 -> nama_atestasi = "ATP-2";
		$jenisatestasi14 -> keterangan = "Atestasi Masuk Anak";
		$jenisatestasi14 -> save();

		$jenisatestasi15 = new JenisAtestasi();
		$jenisatestasi15 -> nama_atestasi = "APA";
		$jenisatestasi15 -> keterangan = "Anak Potensial Anggota";
		$jenisatestasi15 -> save();

				
		//---------------------------------- JENIS BAPTIS ----------------------------------

		$jenisbaptis1 = new JenisBaptis();
		$jenisbaptis1 -> nama_jenis_baptis = "baptis";
		$jenisbaptis1 -> keterangan = "baptis";
		$jenisbaptis1 -> save();
		
		$jenisbaptis2 = new JenisBaptis();
		$jenisbaptis2 -> nama_jenis_baptis = "sidi";
		$jenisbaptis2 -> keterangan = "sidi";
		$jenisbaptis2 -> save();				

		//---------------------------------- JENIS DKH ----------------------------------	

		$jenisdkh1 = new JenisDkh();
		$jenisdkh1 -> nama_dkh = "DKH";
		$jenisdkh1 -> keterangan = "(jenis dkh)";
		$jenisdkh1 -> save();

		$jenisdkh2 = new JenisDkh();
		$jenisdkh2 -> nama_dkh = "DKH-1";
		$jenisdkh2 -> keterangan = "Alamat tidak diketahui, luar kota, luar negeri";
		$jenisdkh2 -> save();

		$jenisdkh3 = new JenisDkh();
		$jenisdkh3 -> nama_dkh = "DKH-2";
		$jenisdkh3 -> keterangan = "Pindah Agama";
		$jenisdkh3 -> save();

		$jenisdkh4 = new JenisDkh();
		$jenisdkh4 -> nama_dkh = "DKH-3";
		$jenisdkh4 -> keterangan = "Pindah tanpa Atestasi";
		$jenisdkh4 -> save();

		$jenisdkh5 = new JenisDkh();
		$jenisdkh5 -> nama_dkh = "DKH-4";
		$jenisdkh5 -> keterangan = "Anggota Baptis Anak masuk DKH";
		$jenisdkh5 -> save();

		$jenisdkh6 = new JenisDkh();
		$jenisdkh6 -> nama_dkh = "AKM";
		$jenisdkh6 -> keterangan = "Angka pengurangan, karena jemaat meninggal";
		$jenisdkh6 -> save();

		$jenisdkh7 = new JenisDkh();
		$jenisdkh7 -> nama_dkh = "AKM-1";
		$jenisdkh7 -> keterangan = "( Anggota Dewasa Meninggal )";
		$jenisdkh7 -> save();

		$jenisdkh8 = new JenisDkh();
		$jenisdkh8 -> nama_dkh = "AKM-2";
		$jenisdkh8 -> keterangan = "( Anggota Anak Meninggal  )";
		$jenisdkh8 -> save();	

		$jenisdkh9 = new JenisDkh();
		$jenisdkh9 -> nama_dkh = "Ex.DKH";
		$jenisdkh9 -> keterangan = "Anggota DKH (S) yg aktif kembali";
		$jenisdkh9 -> save();

		$jenisdkh10 = new JenisDkh();
		$jenisdkh10 -> nama_dkh = "Ex.DKH-1";
		$jenisdkh10 -> keterangan = "Anggota DKH-1 (S) yg aktif kembali";
		$jenisdkh10 -> save();

		$jenisdkh11 = new JenisDkh();
		$jenisdkh11 -> nama_dkh = "Ex.DKH-2";
		$jenisdkh11 -> keterangan = "Anggota DKH-2 (S) yg aktif kembali";
		$jenisdkh11 -> save();

		$jenisdkh12 = new JenisDkh();
		$jenisdkh12 -> nama_dkh = "Ex.DKH-3";
		$jenisdkh12 -> keterangan = "Anggota DKH-3 (S) yg aktif kembali";
		$jenisdkh12 -> save();

		$jenisdkh13 = new JenisDkh();
		$jenisdkh13 -> nama_dkh = "Ex.DKH-4";
		$jenisdkh13 -> keterangan = "Anggota DKH-4 (B) yg aktif kembali";
		$jenisdkh13 -> save();

		
		//---------------------------------- DATA KEGIATAN/KEBAKTIAN ----------------------------------				
		
		//dummy data for demo -> GKI GUNTUR
		/*
		$date = date_create('2016-01-03');
		//for($i = 1 ; $i <= 100 ; $i++)		
		for($i = 1 ; $i <= 50 ; $i++)
		{			
			//kebaktian 1		
			$kebaktian = new Kegiatan();			
			$kebaktian->id_jenis_kegiatan = 1;
			$kebaktian->nama_jenis_kegiatan = 'kebaktian umum 1';
			$kebaktian->id_pendeta = 5; //pendeta gki guntur
			$kebaktian->nama_pendeta = 'Pdt. GKI Guntur';
			$kebaktian->tanggal_mulai = date_format($date, 'Y-m-d');
			$kebaktian->tanggal_selesai = date_format($date, 'Y-m-d');
			$kebaktian->jam_mulai = '07:00';
			$kebaktian->jam_selesai = '08:30';				
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_jemaat_pria = $cowo;
			$kebaktian->banyak_jemaat_wanita = $cewe;
			$kebaktian->banyak_jemaat = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_simpatisan_pria = $cowo;
			$kebaktian->banyak_simpatisan_wanita = $cewe;
			$kebaktian->banyak_simpatisan = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_penatua_pria = $cowo;
			$kebaktian->banyak_penatua_wanita = $cewe;
			$kebaktian->banyak_penatua = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_komisi_pria = $cowo;
			$kebaktian->banyak_komisi_wanita = $cewe;
			$kebaktian->banyak_komisi = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;		
			$kebaktian->banyak_pemusik_pria = $cowo;
			$kebaktian->banyak_pemusik_wanita = $cewe;
			$kebaktian->banyak_pemusik = $total;				
			$kebaktian->id_gereja = $gereja5->id; //id GKI Guntur		
			$kebaktian->deleted = 0;
			$kebaktian->save();
				$persembahan = new Persembahan();
				$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
				$persembahan->jumlah_persembahan = 1000 * rand(1000, 5000);
				$persembahan->id_kegiatan = $kebaktian->id;
				$persembahan->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
				$persembahan->deleted = 0;			
				$persembahan->save();
			//kebaktian 2
			$kebaktian = new Kegiatan();			
			$kebaktian->id_jenis_kegiatan = 2;
			$kebaktian->nama_jenis_kegiatan = 'kebaktian umum 2';
			$kebaktian->id_pendeta = 5; //pendeta gki guntur
			$kebaktian->nama_pendeta = 'Pdt. GKI Guntur';
			$kebaktian->tanggal_mulai = date_format($date, 'Y-m-d');
			$kebaktian->tanggal_selesai = date_format($date, 'Y-m-d');
			$kebaktian->jam_mulai = '09:30';
			$kebaktian->jam_selesai = '11:00';				
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_jemaat_pria = $cowo;
			$kebaktian->banyak_jemaat_wanita = $cewe;
			$kebaktian->banyak_jemaat = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_simpatisan_pria = $cowo;
			$kebaktian->banyak_simpatisan_wanita = $cewe;
			$kebaktian->banyak_simpatisan = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_penatua_pria = $cowo;
			$kebaktian->banyak_penatua_wanita = $cewe;
			$kebaktian->banyak_penatua = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_komisi_pria = $cowo;
			$kebaktian->banyak_komisi_wanita = $cewe;
			$kebaktian->banyak_komisi = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;		
			$kebaktian->banyak_pemusik_pria = $cowo;
			$kebaktian->banyak_pemusik_wanita = $cewe;
			$kebaktian->banyak_pemusik = $total;				
			$kebaktian->id_gereja = $gereja5->id; //id GKI Guntur		
			$kebaktian->deleted = 0;
			$kebaktian->save();
				$persembahan = new Persembahan();
				$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
				$persembahan->jumlah_persembahan = 1000 * rand(1000, 5000);
				$persembahan->id_kegiatan = $kebaktian->id;
				$persembahan->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
				$persembahan->deleted = 0;			
				$persembahan->save();	
			//kebaktian 3
			$kebaktian = new Kegiatan();			
			$kebaktian->id_jenis_kegiatan = 3;
			$kebaktian->nama_jenis_kegiatan = 'kebaktian umum 3';
			$kebaktian->id_pendeta = 5; //pendeta gki guntur
			$kebaktian->nama_pendeta = 'Pdt. GKI Guntur';
			$kebaktian->tanggal_mulai = date_format($date, 'Y-m-d');
			$kebaktian->tanggal_selesai = date_format($date, 'Y-m-d');
			$kebaktian->jam_mulai = '17:00';
			$kebaktian->jam_selesai = '18:30';				
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_jemaat_pria = $cowo;
			$kebaktian->banyak_jemaat_wanita = $cewe;
			$kebaktian->banyak_jemaat = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_simpatisan_pria = $cowo;
			$kebaktian->banyak_simpatisan_wanita = $cewe;
			$kebaktian->banyak_simpatisan = $total;		
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_penatua_pria = $cowo;
			$kebaktian->banyak_penatua_wanita = $cewe;
			$kebaktian->banyak_penatua = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;
			$kebaktian->banyak_komisi_pria = $cowo;
			$kebaktian->banyak_komisi_wanita = $cewe;
			$kebaktian->banyak_komisi = $total;
				$cowo = rand(20, 70);
				$cewe = rand(20, 70);
				$total = $cowo + $cewe;		
			$kebaktian->banyak_pemusik_pria = $cowo;
			$kebaktian->banyak_pemusik_wanita = $cewe;
			$kebaktian->banyak_pemusik = $total;				
			$kebaktian->id_gereja = $gereja5->id; //id GKI Guntur		
			$kebaktian->deleted = 0;
			$kebaktian->save();
				$persembahan = new Persembahan();
				$persembahan->tanggal_persembahan = $kebaktian->tanggal_mulai;
				$persembahan->jumlah_persembahan = 1000 * rand(1000, 5000);
				$persembahan->id_kegiatan = $kebaktian->id;
				$persembahan->jenis = 1; //jenis 1 khusus untuk persembahan kebaktian
				$persembahan->deleted = 0;			
				$persembahan->save();

			//add date to next week
			date_add($date, date_interval_create_from_date_string('7 days'));	
		}	
		*/		
	
	}

}
