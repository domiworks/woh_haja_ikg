<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersembahan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persembahan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->date('tanggal_persembahan');
			$table->integer('jumlah_persembahan');
			$table->integer('id_gereja')->unsigned()->nullable();
			$table->integer('id_anggota')->unsigned()->nullable();
			$table->string('nama_pemberi');
			$table->integer('id_kegiatan')->unsigned()->nullable();
			$table->integer('jenis');
			$table->string('keterangan');
			$table->tinyInteger('deleted');
						
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
		Schema::table('persembahan', function (Blueprint $table){
			$table->drop();
		});
	}

}
