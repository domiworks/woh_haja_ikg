<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGereja extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gereja', function (Blueprint $table){
			$table->create();
			$table->increments('id');			
			$table->string('nama');	
			$table->string('alamat');
			$table->string('kota');
			$table->string('kodepos');
			$table->string('telp');
			$table->integer('id_parent_gereja')->unsigned()->nullable();				
			$table->integer('status'); //posjem, bajem, jemaat, klassis, sw, ...
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
		Schema::table('gereja', function (Blueprint $table){
			$table->drop();
		});
	}

}
