<?php

class Persembahan extends Eloquent
{
	public $timestamps = true;
	protected $table = 'persembahan';
	
	// public static $rules = 
				// ['no_pernikahan' => 'required',
				// 'tanggal_pernikahan' => 'required',				
				// 'id_pendeta' => 'required',					
				// 'nama_pria' => 'required',
				// 'nama_wanita' => 'required'];		
	
	public $fillable = 
				['tanggal_persembahan',
				'jumlah_persembahan',				
				'id_gereja',				
				'id_anggota',
				'nama_pemberi',
				'id_kegiatan',
				'jenis',
				'keterangan',
				'deleted'];	
}