<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisBaptis extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis_baptis', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_jenis_baptis');
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
		Schema::table('jenis_baptis', function (Blueprint $table){
			$table->drop();
		});
	}

}
