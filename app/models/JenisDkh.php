<?php

class JenisDkh extends Eloquent
{
	public $timestamps = true;
	protected $table = 'jenis_dkh';
	
	public static $rules = 
				['nama_dkh' => 'required',
				'keterangan' => 'required'];
	
	public $fillable = 
				['nama_dkh',
				'keterangan',				
				'deleted'];	
	
}