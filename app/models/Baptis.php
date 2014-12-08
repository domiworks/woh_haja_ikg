<?php

class Baptis extends Eloquent
{
	public $timestamps = true;
	protected $table = 'baptis';
	
	public static $rules = 
				['no_baptis' => 'required',
				'id_jemaat' => 'required',
				'id_pendeta' => 'required',
				'tanggal_baptis' => 'required',
				'id_jenis_baptis' => 'required',
				'id_gereja' => 'required'];
	
	public $fillable = 
				['no_baptis',
				'id_jemaat',
				'id_pendeta',
				'tanggal_baptis',
				'id_jenis_baptis',
				'id_gereja'];
} 