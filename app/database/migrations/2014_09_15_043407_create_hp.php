<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hp', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_hp');
			$table->integer('id_anggota')->unsigned();
			//ada tidak nya record hp tergantung dari anggota
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
		Schema::table('hp', function (Blueprint $table){
			$table->drop();
		});
	}

}
