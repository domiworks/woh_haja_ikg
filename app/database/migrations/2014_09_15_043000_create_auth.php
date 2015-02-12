<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */	
	
	public function up()
	{															
		// note : 
		// - user biasa di tatausaha cuma bisa masukin data aja
		// - majelis tertentu di satu gereja cuma bisa akses data gerejanya
		// - majelis klasis bisa akses data semua gereja 				
		Schema::table('auth', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password');
			$table->integer('role'); //ngebedain user access, sementara user, superadmin
			$table->integer('id_gereja')->unsigned()->nullable();
			$table->string('remember_token')->nullable();
												
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
		Schema::table('auth', function (Blueprint $table){
			$table->drop();
		});
	}

}
