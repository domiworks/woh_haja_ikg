<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePernikahan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// buat table ini ada sedikit redundant data
		// kalo ternyata salah satu mempelai tidak terdapat di table jemaat (non anggota gereja)
		// maka bisa diisi namanya saja, id nya bisa dikosongkan
		// kalo terdapat di table jemaat, maka id nya wajib diisi dan langsung otomatis isi namanya sesuai yang ada di table jemaat
		Schema::table('pernikahan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_pernikahan');
			$table->date('tanggal_pernikahan');
			$table->integer('id_pendeta')->unsigned(); //pendeta yang memberkati
			$table->integer('id_gereja')->unsigned(); 			
			$table->integer('id_jemaat_wanita')->unsigned()->nullable();
			$table->integer('id_jemaat_pria')->unsigned()->nullable();			
			$table->string('nama_pria'); //diisi hanya jika merupakan jemaat gereja lain
			$table->string('nama_wanita'); //diisi hanya jika merupakan jemaat gereja lain
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
		Schema::table('pernikahan', function (Blueprint $table){
			$table->drop();
		});
	}

}
