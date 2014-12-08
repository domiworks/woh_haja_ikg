<?php

class Kedukaan extends Eloquent
{
	public $timestamps = true;
	protected $table = 'kedukaan';
	
	public static $rules = 
				['no_kedukaan' => 'required',								
				// 'id_gereja' => 'required',
				'id_jemaat' => 'required',
				'keterangan' => 'required'];
	
	public $fillable = 
				['no_kedukaan',
				'id_gereja',				
				'id_jemaat',				
				'keterangan'];		
}