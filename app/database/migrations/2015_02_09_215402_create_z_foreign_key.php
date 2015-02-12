<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gereja', function($table)
		{
		    $table->foreign('id_parent_gereja')->references('id')->on('gereja');			
		});
		
		Schema::table('anggota', function($table)
		{
		    $table->foreign('id_gereja')->references('id')->on('gereja');
			// $table->foreign('id_atestasi')->references('id')->on('atestasi');
		});
		
		Schema::table('atestasi', function($table)
		{
		    // $table->foreign('id_atestasi_baru')->references('id')->on('atestasi');
			$table->foreign('id_gereja_lama')->references('id')->on('gereja');
			$table->foreign('id_gereja_baru')->references('id')->on('gereja');			
			$table->foreign('id_jenis_atestasi')->references('id')->on('jenis_atestasi');
			$table->foreign('id_anggota')->references('id')->on('anggota');
		});
		
		Schema::table('hp', function($table)
		{
		    $table->foreign('id_anggota')->references('id')->on('anggota');
		});
		
		Schema::table('alamat', function($table)
		{
		    $table->foreign('id_anggota')->references('id')->on('anggota');
		});
		
		Schema::table('kedukaan', function($table)
		{
		    $table->foreign('id_gereja')->references('id')->on('gereja');
			$table->foreign('id_jemaat')->references('id')->on('anggota');
		});
		
		Schema::table('baptis', function($table)
		{
		    $table->foreign('id_jemaat')->references('id')->on('anggota');
			$table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_jenis_baptis')->references('id')->on('jenis_baptis');
			$table->foreign('id_gereja')->references('id')->on('gereja');
		});
		
		Schema::table('pernikahan', function($table)
		{
		    $table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_gereja')->references('id')->on('gereja');			
			$table->foreign('id_jemaat_wanita')->references('id')->on('anggota');
			$table->foreign('id_jemaat_pria')->references('id')->on('anggota');			
		});
		
		Schema::table('kegiatan', function($table)
		{
		    $table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_jenis_kegiatan')->references('id')->on('jenis_kegiatan');
			$table->foreign('id_gereja')->references('id')->on('gereja');
		});
		
		Schema::table('persembahan', function($table)
		{
		    $table->foreign('id_gereja')->references('id')->on('gereja');
			$table->foreign('id_anggota')->references('id')->on('anggota');
			$table->foreign('id_kegiatan')->references('id')->on('kegiatan');
		});
		
		Schema::table('dkh', function($table)
		{
		    $table->foreign('id_jemaat')->references('id')->on('anggota');
		});
		
		Schema::table('auth', function($table)
		{
		    $table->foreign('id_gereja')->references('id')->on('gereja');
		});			
				
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
