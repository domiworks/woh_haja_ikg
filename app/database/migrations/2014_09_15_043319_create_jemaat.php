<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJemaat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('anggota', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_anggota')->unique();	//nomor anggota
			$table->string('nama_depan');
			$table->string('nama_tengah');
			$table->string('nama_belakang');
			$table->string('telp');
			$table->tinyInteger('gender'); //1=pria, 0=wanita
			$table->tinyInteger('status_anggota'); //1=B=Baptis, 2=S=Sidi
			$table->string('wilayah');
			$table->string('gol_darah');
			$table->string('pendidikan');
			$table->string('pekerjaan');
			$table->string('etnis');
			$table->string('kota_lahir');
			$table->date('tanggal_lahir');
			$table->date('tanggal_meninggal')->nullable();
			$table->integer('role'); //jemaat, pendeta, majelis, penatua
			$table->string('foto')->nullable();			
			$table->integer('id_gereja')->unsigned();
			$table->tinyInteger('deleted');
			// $table->integer('id_atestasi')->unsigned()->nullable();
				
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('anggota', function (Blueprint $table){
			$table->drop();
		});
	}

}
