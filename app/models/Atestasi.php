<?php

class Atestasi extends Eloquent
{
	public $timestamps = true;
	protected $table = 'atestasi';
	
	public static $rules = 
				['no_atestasi' => 'required',
				'tanggal_atestasi' => 'required',
						// 'id_atestasi_baru' => 'required',
						// 'id_gereja_lama' => 'required',
				'nama_gereja_lama' => 'required',
						// 'id_gereja_baru' => 'required',
				'nama_gereja_baru' => 'required',
				'id_jenis_atestasi' => 'required'];
	
	public $fillable = 
				['no_atestasi',
				'tanggal_atestasi',
				'id_atestasi_baru',
				'id_gereja_lama',
				'nama_gereja_lama',
				'id_gereja_baru',
				'nama_gereja_baru',
				'id_jenis_atestasi',
				'keterangan'];				
}