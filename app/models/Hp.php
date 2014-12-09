<?php

class Hp extends Eloquent
{
	public $timestamps = true;
	protected $table = 'hp';
	
	public static $rules = 
				['no_hp' => 'required',
				'id_anggota' => 'required'];				
	
	public $fillable = 
				['no_hp',
				'id_anggota',
				'deleted'];	
		
}