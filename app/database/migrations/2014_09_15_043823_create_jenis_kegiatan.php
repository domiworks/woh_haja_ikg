<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisKegiatan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis_kegiatan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_kegiatan');
				$table->integer('id_gereja')->unsigned()->nullable();
			$table->string('keterangan');
			$table->tinyInteger('deleted');
			$table->timestamps();
				// note 'nama_kegiatan' :
				// - kebaktian umum 1
				// - kebaktian umum 2
				// - kebaktian umum 3
				// - kebaktian umum 4
				// - kebaktian umum 5
				// - kebaktian anak 
				// - kebaktian remaja
				// - kebaktian pemuda
				// yang tertulis di textfield sendiri : penyegaran iman, jumat agung, rabu abu, kamis putih
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jenis_kegiatan', function (Blueprint $table){
			$table->drop();
		});
	}

}
