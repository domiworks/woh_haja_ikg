<?php

class Pernikahan extends Eloquent
{
	public $timestamps = true;
	protected $table = 'pernikahan';
	
	public static $rules = 
				['no_pernikahan' => 'required',
				'tanggal_pernikahan' => 'required',				
				'id_pendeta' => 'required',				
						// 'id_gereja' => 'required',
						// 'id_jemaat_wanita' => 'required',
						// 'id_jemaat_pria' => 'required',
				'nama_pria' => 'required',
				'nama_wanita' => 'required'];		
	
	public $fillable = 
				['no_pernikahan',
				'tanggal_pernikahan',				
				'id_pendeta',				
				'id_gereja',
				'id_jemaat_wanita',
				'id_jemaat_pria',
				'nama_pria',
				'nama_wanita'];		
				
}