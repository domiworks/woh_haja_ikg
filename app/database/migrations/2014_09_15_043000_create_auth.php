<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	//--------------------------------------------------------REVISI DATABASE--------------------------------------------------------
	/*	
	REVISI TABLE-TABLE DI DATABASE (8 DES 2015) :
		- jadi pakai tumbstone di setiap tabel kecuali di tabel 'auth'		
		- tambah id_anggota di tabel atestasi		
		- hapus id_atestasi di tabel anggota
		- hapus id_atestasi_baru di tabel atestasi
		- tambah keterangan di tabel baptis
		- tambah keterangan di tabel pernikahan
		- kolom jenis di table persembahan -> tinyInteger jadi integer
		- kolom status di table gereja -> tinyInteger jadi integer
		- kolom role di table anggota -> tinyInteger jadi integer
		- kolom role di table auth -> tinyInteger jadi integer 		
	REVISI TABLE-TABLE DI DATABASE (19 DES 2015) :
		- auth ga jadi referensi ke anggota karena ga bisa langsung liat
			profile pribadi, 
			JADI id_anggota diganti id_gereja,
			reference ke gereja
	*/
	//--------------------------------------------------------END REVISI DATABASE--------------------------------------------------------
	
	public function up()
	{		
		//NOTE : SEMUA TABLE YANG GA PUNYA FOREGIN KEY DIBUAT DULU	
		
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
			
			$table->foreign('id_parent_gereja')->references('id')->on('gereja');			
			$table->timestamps();
		});				
		
		Schema::table('jenis_atestasi', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_atestasi');
			$table->string('keterangan');
			$table->tinyInteger('deleted');
			$table->timestamps();
		});
			
		Schema::table('anggota', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_anggota')->unique();	//nomor anggota
			$table->string('nama_depan');
			$table->string('nama_tengah');
			$table->string('nama_belakang');
			$table->string('telp');
			$table->tinyInteger('gender'); //pria, wanita
			$table->string('wilayah');
			$table->string('gol_darah');
			$table->string('pendidikan');
			$table->string('pekerjaan');
			$table->string('etnis');
			$table->string('kota_lahir');
			$table->date('tanggal_lahir');
			$table->date('tanggal_meninggal')->nullable();
			$table->integer('role'); //jemaat, pendeta, majelis, penatua
			$table->string('foto')->nullable();			
			$table->integer('id_gereja')->unsigned();
			$table->tinyInteger('deleted');
			// $table->integer('id_atestasi')->unsigned()->nullable();
				
			$table->foreign('id_gereja')->references('id')->on('gereja');
			// $table->foreign('id_atestasi')->references('id')->on('atestasi');
			$table->timestamps();
		});
		
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
			
			// $table->foreign('id_atestasi_baru')->references('id')->on('atestasi');
			$table->foreign('id_gereja_lama')->references('id')->on('gereja');
			$table->foreign('id_gereja_baru')->references('id')->on('gereja');			
			$table->foreign('id_jenis_atestasi')->references('id')->on('jenis_atestasi');
			$table->foreign('id_anggota')->references('id')->on('anggota');
			$table->timestamps();
		});				
		
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
									
			$table->foreign('id_gereja')->references('id')->on('gereja');
			$table->timestamps();
		});
		
		Schema::table('hp', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_hp');
			$table->integer('id_anggota')->unsigned();
			//ada tidak nya record hp tergantung dari anggota
			// $table->tinyInteger('deleted'); 
						
			$table->foreign('id_anggota')->references('id')->on('anggota');
			$table->timestamps();
		});		

		Schema::table('alamat', function (Blueprint $table){
			$table->create();
			$table->increments('id');			
			$table->string('jalan');
			$table->string('kota');
			$table->string('kodepos');
			$table->integer('id_anggota')->unsigned();
			//ada tidak nya record alamat tergantung dari anggota
			// $table->tinyInteger('deleted');
			
			$table->foreign('id_anggota')->references('id')->on('anggota');
			$table->timestamps();
		});
		
		Schema::table('kedukaan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_kedukaan'); //atau nomor akta meninggal			
			$table->integer('id_gereja')->unsigned(); //pasti ambil dari database gereja
			$table->integer('id_jemaat')->unsigned(); //pasti ambil dari database jemaat karena pasti anggota jemaat						
			$table->string('keterangan')->nullable(); //alasan meninggal atau tempat meninggal dll
			$table->tinyInteger('deleted');
			
			$table->foreign('id_gereja')->references('id')->on('gereja');
			$table->foreign('id_jemaat')->references('id')->on('anggota');
			$table->timestamps();
		});
		
		Schema::table('jenis_baptis', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_jenis_baptis');
			$table->string('keterangan');
			$table->tinyInteger('deleted');
			$table->timestamps();
		});
		
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
							
			$table->foreign('id_jemaat')->references('id')->on('anggota');
			$table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_jenis_baptis')->references('id')->on('jenis_baptis');
			$table->foreign('id_gereja')->references('id')->on('gereja');
			$table->timestamps();
		});
		
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
			
			$table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_gereja')->references('id')->on('gereja');			
			$table->foreign('id_jemaat_wanita')->references('id')->on('anggota');
			$table->foreign('id_jemaat_pria')->references('id')->on('anggota');			
			$table->timestamps();
		});				
		
		Schema::table('jenis_kegiatan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('nama_kegiatan');
			$table->string('keterangan');
			$table->tinyInteger('deleted');
			$table->timestamps();
				// note 'nama_kegiatan' :
				// - kebaktian umum 1
				// - kebaktian umum 2
				// - kebaktian umum 3
				// - kebaktian umum 4
				// - kebaktian umum 5
				// - kebaktian anak 
				// - kebaktian remaja
				// - kebaktian pemuda
				// yang tertulis di textfield sendiri : penyegaran iman, jumat agung, rabu abu, kamis putih
		});				
		
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
				
			$table->foreign('id_pendeta')->references('id')->on('anggota');
			$table->foreign('id_jenis_kegiatan')->references('id')->on('jenis_kegiatan');
			$table->foreign('id_gereja')->references('id')->on('gereja');
			$table->timestamps();
		});
		
		Schema::table('persembahan', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->date('tanggal_persembahan');
			$table->integer('jumlah_persembahan');
			$table->integer('id_gereja')->unsigned()->nullable();
			$table->integer('id_anggota')->unsigned()->nullable();
			$table->string('nama_pemberi');
			$table->integer('id_kegiatan')->unsigned()->nullable();
			$table->integer('jenis');
			$table->string('keterangan');
			$table->tinyInteger('deleted');
			
			$table->foreign('id_gereja')->references('id')->on('gereja');
			$table->foreign('id_anggota')->references('id')->on('anggota');
			$table->foreign('id_kegiatan')->references('id')->on('kegiatan');
			$table->timestamps();
		});
		
		//DKH masih ga jelas gunanya buat apa
		Schema::table('dkh', function (Blueprint $table){
			$table->create();
			$table->increments('id');
			$table->string('no_dkh');
			$table->integer('id_jemaat')->unsigned();
			$table->string('keterangan');
			$table->tinyInteger('deleted');
						
			$table->foreign('id_jemaat')->references('id')->on('anggota');
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
