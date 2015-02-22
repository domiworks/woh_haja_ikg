<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDkh extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//DKH masih ga jelas gunanya buat apa
		Schema::table('dkh', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_dkh');
			$table->integer('id_jemaat')->unsigned();
			$table->date('tanggal_dkh');
			$table->integer('id_jenis_dkh')->unsigned();
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
		Schema::table('dkh', function (Blueprint $table){
			$table->drop();
		});
	}

}
