<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisDkh extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis_dkh', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_dkh');
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
		Schema::table('jenis_dkh', function (Blueprint $table){
			$table->drop();
		});
	}

}
