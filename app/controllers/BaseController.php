<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function setHeader()
	{
		$nama_gereja = $this->get_gereja('nama');
		
		$alamat_gereja = $this->get_gereja('alamat');
		
		$telepon_gereja = $this->get_gereja('telp');				
		
		$arr = array(
			'nama' => $nama_gereja,
			'alamat' => $alamat_gereja, 
			'telp' => $telepon_gereja
		);
		
		return $arr;
	}
	
	private function get_gereja($kembalian)
	{
		//get gereja status:jemaat yang pertama di get di database
		$count = Gereja::where('status','=', '2')->first();		
		if(count($count) != 0)
		{
			return $count->$kembalian;
		}else
		{
			return "";
		}
	}
	
	//--------------------------------------------------GET LIST--------------------------------------------------
	
	//get list gereja
	public function getListGereja()
	{		
		$count = DB::table('gereja')->orderBy('id','asc')->lists('nama','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list wilayah
	public function getListWilayah()
	{
		$arrWilayah = array(
			'' => 'pilih!',
			'I' => 'I',
			'II' => 'II',
			'III' => 'III',
			'IV' => 'IV',
			'V' => 'V',
			'VI' => 'VI',
			'VII' => 'VII',
			'VIII' => 'VIII',
			'IX' => 'IX',
			'X' => 'X',
			'XI' => 'X1',
			'XII' => 'XII',
			'XIII' => 'XIII',
			'XIV' => 'XIV',
			'XV' => 'XI'
		);		
		return $arrWilayah;
	}
	
	//get list gol_darah	
	public function getListGolonganDarah()
	{
		$arrGolonganDarah = array(
			'' => 'pilih!',
			'A +' => 'A +',
			'B +' => 'B +',
			'A B+' => 'AB +',
			'O +' => 'O +',
			'A -' => 'A -',
			'B -' => 'B -',
			'A B-' => 'AB -',
			'O -' => 'O -'	
		);
		return $arrGolonganDarah;
	}
			
	//get list pendidikan
	public function getListPendidikan()
	{
		$arrPendidikan = array(
			'' => 'pilih!',
			'TK' => 'TK',
			'SD' => 'SD',
			'SLTP' => 'SLTP',
			'SMU' => 'SMU',
			'Kejuruan' => 'Kejuruan',
			'D-1' => 'D-1',
			'D-2' => 'D-2',
			'D-3' => 'D-3',
			'S-1' => 'S-1',
			'S-2' => 'S-2',
			'S-3' => 'S-3',
			'Lain-Lain' => 'Lain-Lain'
		);			
		return $arrPendidikan;
	}
	
	//get list pekerjaan
	public function getListPekerjaan()
	{
		$arrPekerjaan = array(
			'' => 'pilih!',
			'Wirausaha' => 'Wirausaha',
			'P.Negeri' => 'P.Negeri',
			'P.Swasta' => 'P.Swasta',
			'Profesional' => 'Profesional',
			'Pensiunan' => 'Pensiunan',
			'Ibu RT' => 'Ibu RT',
			'Petani' => 'Petani',
			'Pel/Mhs' => 'Pel/Mhs',
			'Lain-Lain' => 'Lain-Lain'
		);
		return $arrPekerjaan;
	}
	
	//get list etnis
	public function getListEtnis()
	{	
		$arrEtnis = array(
			'' => 'pilih!',
			'T.Hoa' => 'T.Hoa',
			'Sunda' => 'Sunda',
			'Batak' => 'Batak',
			'Jawa' => 'Jawa',
			'Ambon' => 'Ambon',
			'Minahasa' => 'Minahasa',
			'Nias' => 'Nias',
			'Timor' => 'Timor',
			'Toraja' => 'Toraja',
			'Dayak' => 'Dayak',
			'Papua' => 'Papua',
			'Lain-Lain' => 'Lain-Lain'
		);
		return $arrEtnis;
	}
	
	//get list role anggota
	public function getListRoleAnggota()
	{
		$arrRoleAnggota = array(			
			'1' => 'jemaat',
			'2' => 'pendeta',
			'3' => 'penatua',
			'4' => 'majelis'
		);
		return $arrRoleAnggota;
	}
	
	//get list jenis kegiatan
	public function getListJenisKegiatan()
	{
		$count = DB::table('jenis_kegiatan')->orderBy('id','asc')->lists('nama_kegiatan','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jenis baptis
	public function getListJenisBaptis()
	{
		$count = DB::table('jenis_baptis')->orderBy('id','asc')->lists('nama_jenis_baptis','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jenis atestasi
	public function getListJenisAtestasi()
	{
		$count = DB::table('jenis_atestasi')->orderBy('id','asc')->lists('nama_atestasi','id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list pendeta
	public function getListPendeta()
	{		
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 2)
					->orderBy('nama_depan')								
					->lists('nama_lengkap', 'id');					
		if(count($count) != 0)
		{			
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat
	public function getListJemaat()
	{				
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat pria
	public function getListJemaatPria()
	{		
		// $count = DB::table('anggota')->where('role', '=', 2)->orderBy('nama_depan','asc')
				// ->lists('nama_depan'.' '.'nama_tengah'. ' '.'nama_belakang','id');
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->where('gender', '=', 1)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
	
	//get list jemaat wanita
	public function getListJemaatWanita()
	{		
		// $count = DB::table('anggota')->where('role', '=', 2)->orderBy('nama_depan','asc')
				// ->lists('nama_depan'.' '.'nama_tengah'. ' '.'nama_belakang','id');
		$count = Anggota::select('id', DB::raw('CONCAT(nama_depan, " " ,nama_tengah, " " ,nama_belakang) AS nama_lengkap'))
					->where('role', '=', 1)
					->where('gender', '=', 0)
					->orderBy('nama_depan')
					->lists('nama_lengkap', 'id');
		if(count($count) != 0)
		{
			return $count;
		}
		else
		{
			return null;
		}
	}
}
