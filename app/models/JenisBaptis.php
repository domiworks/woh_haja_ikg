<?php

class JenisBaptis extends Eloquent
{
	public $timestamps = true;
	protected $table = 'jenis_baptis';
	
	public static $rules = 
				['nama_jenis_baptis' => 'required'];
	
	public $fillable = 
				['nama_jenis_baptis',
				'keterangan',				
				'deleted'];	
	
}