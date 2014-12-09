<?php

class JenisKegiatan extends Eloquent
{
	public $timestamps = true;
	protected $table = 'jenis_kegiatan';
	
	public static $rules = 
				['nama_kegiatan' => 'required'];
	
	public $fillable = 
				['nama_kegiatan',
				'keterangan',				
				'deleted'];	
	
}