<?php

class Anggota extends Eloquent
{
	public $timestamps = true;
	protected $table = 'anggota';

	public static $rules = 
				[
						// 'no_anggota' => 'required', //digenerate system
				'nama_depan' => 'required',
						// 'nama_tengah' => 'required',
						// 'nama_belakang' => 'required',
						// 'telp' => 'required',
				'gender' => 'required',
						// 'status_anggota' => 'required',
						// 'wilayah' => 'required',
						// 'gol_darah' => 'required',
						// 'pendidikan' => 'required',
						// 'pekerjaan' => 'required',
						// 'etnis' => 'required',
						// 'kota_lahir' => 'required',
				'tanggal_lahir' => 'required',
						// 'tanggal_meninggal' => 'required',
				'role' => 'required',
						// 'foto' => 'required',
						// 'id_atestasi' => 'required',
				'id_gereja' => 'required'						
				];	
	
	public $fillable = 
				['no_anggota',
				'nama_depan',
				'nama_tengah',
				'nama_belakang',
				'telp',
				'gender',
				'status_anggota',
				'wilayah',
				'gol_darah',
				'pendidikan',
				'pekerjaan',
				'etnis',
				'kota_lahir',
				'tanggal_lahir',
				'tanggal_meninggal',
				'role',
				'foto',
				'id_gereja',
				'deleted'];	
}