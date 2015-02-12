<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// kalau tidak mengetahui jumlah pasti pria dan wanita yang hadir maka dapat diisi total seluruhnya saja
		// jika diketahui jumlah pasti pria dan wanita, maka jumlah pria dan wanita wajib diisi, dan total seluruhnya akan otomatis dijumlah dari pria + wanita
		Schema::table('kegiatan', function (Blueprint $table){
			$table->create();
			$table->increments('id');				
			$table->integer('id_pendeta')->unsigned()->nullable();
			$table->string('nama_pendeta');	//menangani pendeta luar
			$table->integer('id_jenis_kegiatan')->unsigned()->nullable();
			$table->string('nama_jenis_kegiatan');
			$table->integer('id_gereja')->unsigned();
			$table->date('tanggal_mulai');
			$table->date('tanggal_selesai');
			$table->time('jam_mulai');
			$table->time('jam_selesai');
			$table->integer('banyak_jemaat_pria')->nullable();
			$table->integer('banyak_jemaat_wanita')->nullable();
			$table->integer('banyak_jemaat');				
			$table->integer('banyak_simpatisan_pria')->nullable();
			$table->integer('banyak_simpatisan_wanita')->nullable();
			$table->integer('banyak_simpatisan');	
			$table->integer('banyak_penatua_pria')->nullable();
			$table->integer('banyak_penatua_wanita')->nullable();
			$table->integer('banyak_penatua');
			$table->integer('banyak_pemusik_pria')->nullable();
			$table->integer('banyak_pemusik_wanita')->nullable();
			$table->integer('banyak_pemusik');
			$table->integer('banyak_komisi_pria')->nullable();
			$table->integer('banyak_komisi_wanita')->nullable();
			$table->integer('banyak_komisi');		
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
		Schema::table('kegiatan', function (Blueprint $table){
			$table->drop();
		});
	}

}
