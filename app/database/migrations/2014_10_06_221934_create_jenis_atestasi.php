<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisAtestasi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis_atestasi', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_atestasi');
			$table->tinyInteger('tipe'); //1 = masuk, 2 = keluar
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
		Schema::table('jenis_atestasi', function (Blueprint $table){
			$table->drop();
		});
	}

}
