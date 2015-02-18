<?php

class Dkh extends Eloquent
{
	public $timestamps = true;
	protected $table = 'dkh';
	
	public static $rules = 
				['no_dkh' => 'required',				
				'id_jemaat' => 'required',
				'id_jenis_dkh' => 'required',
				'keterangan' => 'required'];
	
	public $fillable = 
				['no_dkh',
				'id_jemaat',				
				'id_jenis_dkh',
				'keterangan',
				'deleted'];		
}