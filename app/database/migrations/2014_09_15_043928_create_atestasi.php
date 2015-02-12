<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtestasi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// buat table ini ada sedikit redundant data
		// kalo ternyata data gereja lama atau baru ada di table gereja
		// maka id_gereja_lama atau id_gereja_baru diisi trus otomatis isi juga nama_gereja_lama atau nama_gereja_baru yang diambil dari table gereja
		// kalo engga ada di table gereja maka id_gereja_lama atau id_gereja_baru bisa dikosongin, isi nama_gereja_lama atau nama_gereja_baru aja			
		// karna sekarang jadi ada tambahan id_anggota di tabel atestasi, maka jadi rada ga berguna id_atestasi_baru karena bisa nunjuk id_atestasi_baru berikutnya berdasarkan created_at
		
		Schema::table('atestasi', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_atestasi');
			$table->date('tanggal_atestasi'); //tanggal surat atestasi
			// $table->integer('id_atestasi_baru')->unsigned()->nullable(); //rekursif atestasi
			$table->integer('id_gereja_lama')->unsigned()->nullable();
			$table->integer('id_gereja_baru')->unsigned()->nullable();			
			$table->string('nama_gereja_lama');
			$table->string('nama_gereja_baru');					
			$table->integer('id_jenis_atestasi')->unsigned();
			$table->integer('id_anggota')->unsigned();
			$table->string('keterangan'); //alasan atestasi
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
		Schema::table('atestasi', function (Blueprint $table){
			$table->drop();
		});
	}

}
