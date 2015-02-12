<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKedukaan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kedukaan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_kedukaan'); //atau nomor akta meninggal			
			$table->integer('id_gereja')->unsigned(); //pasti ambil dari database gereja
			$table->integer('id_jemaat')->unsigned(); //pasti ambil dari database jemaat karena pasti anggota jemaat						
			$table->string('keterangan')->nullable(); //alasan meninggal atau tempat meninggal dll
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
		Schema::table('kedukaan', function (Blueprint $table){
			$table->drop();
		});
	}

}
