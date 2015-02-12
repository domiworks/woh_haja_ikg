<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alamat', function (Blueprint $table){
			$table->create();
			$table->increments('id');			
			$table->string('jalan');
			$table->string('kota');
			$table->string('kodepos');
			$table->integer('id_anggota')->unsigned();
			//ada tidak nya record alamat tergantung dari anggota
			// $table->tinyInteger('deleted');
						
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
		Schema::table('alamat', function (Blueprint $table){
			$table->drop();
		});
	}

}
