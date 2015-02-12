<?php

use Carbon\Carbon;

class ImportEksportController extends BaseController {

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
	
	public function export_kegiatan($id_jenis_kegiatan=0,$id_gereja=0,$dateF=0,$dateT=0){
	
		$kegiatan = new Kegiatan();
		
		$where ='';
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
			
		}

		if($dateF != 0 || $dateT=0){
			if($where==''){
				$where.='tanggal_mulai >= "'.$dateF.'" and tanggal_selesai <= "'.$dateTo.'"';
			}
			else{
				$where.=' and tanggal_mulai >= "'.$dateF.'" and tanggal_selesai <= "'.$dateTo.'"';
			}
		}
		
		if($where!=''){
			$result = $kegiatan->whereRaw($where)->orderBy('tanggal_mulai')->orderBy('id_jenis_kegiatan')->get();
		}
		else{
			$result = $kegiatan->all();
		}
		
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
			
			$nama_gereja = array('LAPORAN BULANAN LKKJ GKI SW JABAR','','','','','','','','','','','','','','','');
			$pelayanan_gereja = array('Tahun Pelayanan: 2010-2011','','','','','','','','','','','','','','','');
			$alamat_gereja = array('Jl. HOS. Cokroaminoto 55 Cianjur','','','','','','','','','','','','','','','');
			$blank = array('','','','','','','','','','','','','','','','');
			
			$header = array('Tanggal','Nama Kegiatan','Jemaat Pria','Jemaat Wanita','Total Jemaat','Simpatisan Pria','Simpatisan Wanita','Total Simpatisan','Penatua Pria','Penatua Wanita','Total Penatua','Pemusik Pria','Pemusik Wanita','Total Pemusik','Komisi Pria','Komisi Wanita','Total Komisi');
			$data = array(
				$nama_gereja,
				$pelayanan_gereja,
				$alamat_gereja,
				$blank,
				$header
				
			);
			
			foreach($arr as $key){
				array_push($data,$key);
			}
			
			Excel::create('LKKJTest', function($excel) use($data) {

				$excel->sheet('Keb.Umum', function($sheet) use($data){
					
					$sheet->fromArray($data, null, 'A1', true, false);
					$sheet->mergeCells('A1:Q1');
					$sheet->mergeCells('A2:Q2');
					$sheet->mergeCells('A3:Q3');
					
					$sheet->cells('A1:Q1',function($cells){
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
					
					$sheet->setBorder('A5:Q'.(count($data)), 'thin');
					$sheet->setAutoSize(true);
					

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
				
				//$reader->each(function($row) use($id_gereja){				
				foreach($results as $row){			//select
							
					
					if($row[27] != NULL){ //no_anggota
						$no_anggota = $row[27];
					}
					else{
						//do nothing
					}
					
					$anggota = Anggota::where('id_gereja','=',$id_gereja)->where('no_anggota','=',$no_anggota)->get();
							
					//gender
					if($row[14] == "P")
					{
						$gender = 1;
					}
					else
					{
						$gender = 0;
					}
							
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
				}
			});
			
			// return 'Berhasil';
			return $message;
		}
		else{
			return 'Gagal upload file';
		}
				
		
		

	}
}

?>