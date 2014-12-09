<?php

class Kegiatan extends Eloquent
{
	public $timestamps = true;
	protected $table = 'kegiatan';		
		
	public static $rules = 
				['nama_pendeta' => 'required',				
				'nama_jenis_kegiatan' => 'required',
				'tanggal_mulai' => 'required',
				'tanggal_selesai' => 'required',
				'jam_mulai' => 'required',
				'jam_selesai' => 'required',
				'banyak_jemaat' => 'required',
				'banyak_simpatisan' => 'required',
				'banyak_penatua' => 'required',
				'banyak_pemusik' => 'required',
				'banyak_komisi' => 'required'];
	
	protected $fillable = 
				['id_pendeta',
				'nama_pendeta',
				'id_jenis_kegiatan',
				'nama_jenis_kegiatan',
				'tanggal_mulai',
				'tanggal_selesai',
				'jam_mulai',
				'jam_selesai',
				'banyak_jemaat_pria',
				'banyak_jemaat_wanita',
				'banyak_jemaat',
				'banyak_simpatisan_pria',
				'banyak_simpatisan_wanita',
				'banyak_simpatisan',
				'banyak_penatua_pria',
				'banyak_penatua_wanita',
				'banyak_penatua',
				'banyak_pemusik_pria',
				'banyak_pemusik_wanita',
				'banyak_pemusik',
				'banyak_komisi_pria',
				'banyak_komisi_wanita',
				'banyak_komisi',
				'keterangan',
				'deleted'];
}