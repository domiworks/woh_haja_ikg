<?php

use Carbon\Carbon;

class InputEditAdminController extends BaseController {
	
	public function view_kebaktian()
	{		
		return View::make('pages.kebaktian');		
		// return null;
	}
	
	public function view_anggota()
	{
		// return View::make('pages.anggota');
		return null;
	}
	
	public function view_baptis()
	{
		// return View::make('pages.baptis');
		return null;
	}	
	
	public function view_atestasi()
	{
		// return View::make('pages.atestasi');
		return null;
	}
	
	public function view_pernikahan()
	{
		// return View::make('pages.pernikahan');
		return null;
	}
	
	public function view_kedukaan()
	{
		// return View::make('pages.kedukaan');
		return null;
	}
	
	public function view_dkh()
	{
		// return View::make('pages.dkh');
		return null;
	}
	
	public function postKebaktian()
	{
		return null;
	}
	
	public function postAnggota()
	{
		return null;
	}
	
	public function postBaptis()
	{
		return null;
	}
	
	public function postAtestasi()
	{
		return null;
	}
	
	public function postPernikahan()
	{
		return null;
	}
	
	public function postKedukaan()
	{
		return null;
	}
	
	public function postDkh()
	{
		return null;
	}
	
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
	
}

?>