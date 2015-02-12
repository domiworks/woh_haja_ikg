<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaptis extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('baptis', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_baptis');
			$table->integer('id_jemaat')->unsigned();			
			$table->integer('id_pendeta')->unsigned();			
			$table->date('tanggal_baptis');			
			$table->integer('id_jenis_baptis')->unsigned();
			$table->integer('id_gereja')->unsigned();
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
		Schema::table('baptis', function (Blueprint $table){
			$table->drop();
		});
	}

}
