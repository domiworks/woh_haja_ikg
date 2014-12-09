<?php

class Gereja extends Eloquent
{
	public $timestamps = true;
	protected $table = 'gereja';
	
	public static $rules = 
				['nama' => 'required',
				'alamat' => 'required',
				'kota' => 'required',
				'kodepos' => 'required',
				'telp' => 'required',
				'status' => 'required'];
	
	public $fillable = 
				['nama',
				'alamat',				
				'kota',
				'kodepos',
				'telp',
				'id_parent_gereja',
				'status',
				'deleted'];
	
	
}