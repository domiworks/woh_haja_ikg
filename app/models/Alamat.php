<?php

class Alamat extends Eloquent
{
	public $timestamps = true;
	protected $table = 'alamat';
	
	public static $rules = 
				['jalan' => 'required',						
				'kota' => 'required'];	
	
	public $fillable = 
				['jalan',
				'kota',
				'kodepos',
				'id_anggota'];	
				
}