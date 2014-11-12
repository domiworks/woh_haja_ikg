<?php

use Carbon\Carbon;

class OlahDataController extends BaseController {

	public function view_kebaktian()
	{	
		return null;
	}		

	public function view_anggota()
	{
		$list_gereja = $this->getListGereja();
		$list_wilayah = $this->getListWilayah();
		$list_gol_darah = $this->getListGolonganDarah();
		$list_pendidikan = $this->getListPendidikan();
		$list_pekerjaan = $this->getListPekerjaan();
		$list_etnis = $this->getListEtnis();
		$list_role = $this->getListRoleAnggota();
		return View::make('pages.user_olahdata.anggota', compact('list_gereja','list_wilayah','list_gol_darah','list_pendidikan','list_pekerjaan','list_etnis','list_role'));
	}	
	
	public function view_baptis()
	{	
		return null;
	}
	
	public function view_atestasi()
	{	
		return null;
	}
	
	public function view_pernikahan()
	{	
		return null;
	}
	
	public function view_kedukaan()
	{	
		return null;
	}
	
	public function view_dkh()
	{	
		return null;
	}
	
	/*--------------------------------SEARCH----------------------------------------*/	
	
	public function search_anggota()
	{		
		$no_anggota = Input::get('no_anggota');
		$nama = Input::get('nama');
		$kota = Input::get('kota');
		$gender = Input::get('gender');
		$wilayah = Input::get('wilayah');
		$gol_darah = Input::get('gol_darah');
		$pendidikan = Input::get('pendidikan');
		$pekerjaan = Input::get('pekerjaan');
		$etnis = Input::get('etnis');
		$tanggal_lahir = Input::get('tanggal_lahir');
		$id_gereja = Input::get('id_gereja');
		$role = Input::get('role');
		return $no_anggota;
		
		$anggota = DB::table('anggota')->where('role', '=', $role)->get();
		return $anggota;
		
		$anggota = DB::table('anggota AS ang')
					->join('alamat AS alm', 'ang.id', '=', 'alm.id_anggota');
					
		if($no_anggota != "")
		{
			$anggota = $anggota->where('ang.no_anggota', 'LIKE', '%'.$no_anggota.'%');
		}
		if($kota != "")
		{	
			$anggota = $anggota->where('alm.kota', 'LIKE', '%'.$kota.'%');
		}
		if($gender != "") //pasti terima value 1 atau 0
		{
			$anggota = $anggota->where('ang.gender', '=', $gender);
		}
		if($wilayah != "")
		{
			$anggota = $anggota->where('ang.wilayah', '=', $wilayah);
		}
		if($gol_darah != "")
		{
			$anggota = $anggota->where('ang.gol_darah', '=', $gol_darah);
		}
		if($pendidikan != "")
		{
			$anggota = $anggota->where('ang.pendidikan', '=', $pendidikan);
		}
		if($pekerjaan != "")
		{
			$anggota = $anggota->where('ang.pekerjaan', '=', $pekerjaan);
		}
		if($etnis != "")
		{
			$anggota = $anggota->where('ang.etnis', '=', $etnis);
		}if($tanggal_lahir != "")
		{
			$anggota = $anggota->where('ang.tanggal_lahir', '=', $tanggal_lahir);
		}
		if($id_gereja != "") //pasti terima value 1-...
		{
			$anggota = $anggota->where('ang.id_gereja', '=', $id_gereja);
		}
		if($role != "") //pasti terima value 1-...
		{
			$anggota = $anggota->where('ang.role', '=', $role);
		}
		if($nama != "")
		{
			$anggota = $anggota->where('ang.nama_depan', 'LIKE', '%'.$nama.'%')
								->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama.'%')
								->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama.'%');
		}
		
		$anggota = $anggota->get();
					
									
					
		
		// $anggota = $anggota->where('ang.nama_depan', 'LIKE', '%'.$nama.'%')
							// ->orWhere('ang.nama_tengah', 'LIKE', '%'.$nama.'%')
							// ->orWhere('ang.nama_belakang', 'LIKE', '%'.$nama.'%')
							// ->get();
							
		if(count($anggota) == 0)
		{
			return "";
		}
		else
		{
			return $anggota;
		}		
		
	}
	
	/*--------------------------------POST UPDATE----------------------------------------*/	
	
	
}

?>