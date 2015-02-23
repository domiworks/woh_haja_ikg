<?php

use Carbon\Carbon;

class ReportingController extends BaseController {

	public function admin_view_reporting()
	{	
		// $header = $this->setHeader();
		// return View::make('pages.admin_reporting',
				// compact('header'));	
		return View::make('pages.admin_reporting');	
	}
	
	public function view_reporting()
	{			
		// $header = $this->setHeader();
		// return View::make('pages.reporting',
				// compact('header'));	
		return View::make('pages.reporting');	
	}
	
	public function get_jenis_kegiatan(){
		return JenisKegiatan::all();
	}
	
	
	public function search_kebaktian($id_gereja,$from=0,$to=0,$jenis=-1){
		$where='';
		
		
		if($from==0){
			
		}
		else{
			//$dateFrom = date("Y-m-dd", strtotime($from));
			$where = 'tanggal_mulai >= "'.$from.'"';
		}
		
		if($to == 0){
			
		}
		else{
			//$dateTo = date("Y-m-dd", strtotime($to));
			if($where!=''){
				$where .= ' and tanggal_selesai <= "'.$to.'"';
			}
			else{
				$where = 'tanggal_selesai <= "'.$to.'"';
			}
		}
		
		if($jenis!=-1){
			if($where!=''){
				$where .= ' and id_jenis_kegiatan = '.$jenis;
			}
			else{
				$where = 'id_jenis_kegiatan = '.$jenis;
			}
		}
		
		if($where!=''){
			$where .=' and deleted = 0';
		}
		else{
			$where ='deleted = 0';
		}
		
		if($where!=''){
			return Kegiatan::whereRaw($where)->where('id_gereja','=',$id_gereja)->orderBy('tanggal_mulai')->get();
		}
		else{
			return Kegiatan::orderBy('tanggal_mulai')->get();
		}
		
	}
	
	public function get_anggota($id_gereja,$from, $to, $bulanan = 0){
	
		$anggota = Anggota::where('id_gereja','=',$id_gereja)->where('created_at','>=',$from)->where('created_at','<=',$to)->get();
		
		$arr_report = array();
		
		if($bulanan == 0){
			
		}
		else{
			
		}
		
		return $anggota;
	
	}
	
		
}

?>