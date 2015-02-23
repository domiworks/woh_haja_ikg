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
	
	public function search_kebaktian($from=0,$to=0,$jenis=-1){
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
			return Kegiatan::whereRaw($where)->orderBy('tanggal_mulai')->get();
		}
		else{
			return Kegiatan::orderBy('tanggal_mulai')->get();
		}
		
	}
	
	public function search_persembahan($from=0,$to=0,$jenis=-1){
		$where='';
		
		
		if($from==0){
			
		}
		else{
			//$dateFrom = date("Y-m-dd", strtotime($from));
			$where = 'keg.tanggal_mulai >= "'.$from.'"';
		}
		
		if($to == 0){
			
		}
		else{
			//$dateTo = date("Y-m-dd", strtotime($to));
			if($where!=''){
				$where .= ' and keg.tanggal_selesai <= "'.$to.'"';
			}
			else{
				$where = 'keg.tanggal_selesai <= "'.$to.'"';
			}
		}
		
		if($jenis!=-1){
			if($where!=''){
				$where .= ' and keg.id_jenis_kegiatan = '.$jenis;
			}
			else{
				$where = 'keg.id_jenis_kegiatan = '.$jenis;
			}
		}
		
		if($where!=''){
			$where .=' and keg.deleted = 0';
		}
		else{
			$where ='keg.deleted = 0';
		}
		
		if($where!=''){
			$result = DB::table('kegiatan AS keg')->whereRaw($where)->orderBy('tanggal_mulai')
						->join('persembahan AS per', 'keg.id', '=', 'per.id_kegiatan')->get();	
			//return Kegiatan::whereRaw($where)->orderBy('tanggal_mulai')->get();
			return $result;
		}
		else{
			$result = DB::table('kegiatan AS keg')->orderBy('tanggal_mulai')
						->join('persembahan AS per', 'keg.id', '=', 'per.id_kegiatan')->get();	
			//return Kegiatan::orderBy('tanggal_mulai')->get();
			return $result;
		}
		
	}	
	
	public function search_anggota($id_gereja,$from, $to, $bulanan = 0){
	
		$report = array();
		
		$arr_report = array();
		$arr_tanggal = array();
		
		$arr_from = explode('-',$from);
		$arr_to = explode('-',$to);
		
		$year_from = (int)$arr_from[0];
		$month_from = (int)$arr_from[1];
		$date_from = (int)$arr_from[2];
		
		
		
		$year_to = (int)$arr_to[0];
		$month_to = (int)$arr_to[1];
		$date_to = (int)$arr_to[2];
		
		if($year_from>$year_to){
			$temp = $year_from;
			$year_from = $year_to;
			$year_to = $temp;
			$temp = $month_to;
			$month_to = $month_from;
			$month_from = $temp;
		}
		else if($year_from == $year_to && $month_to<$month_from){
			$temp = $month_to;
			$month_to = $month_from;
			$month_from = $temp;
		}
		
		
		
		if($bulanan == 0){
			for($year = $year_from;$year<=$year_to;$year++){
				if($year>$year_from){
					$month_from = 1;
				}
				for($month = $month_from;$month<=12;$month++){
					$range_f =	$year.'-'.$month.'-01'; 
					$range_t =	$year.'-'.$month.'-31'; 
					$anggota = Anggota::where('id_gereja','=',$id_gereja)->where('deleted','=',0)->where('created_at','>=',$range_f)->where('created_at','<=',$range_t)->where('created_at','<=',$to)->get();
					array_push($arr_report,count($anggota));
					array_push($arr_tanggal,($this->getMonthFromNumber($month).' '.$year));
				}
			}
		}
		else{
			for($year = $year_from;$year<=$year_to;$year++){
				$range_f =	$year.'-01-01'; 
				$range_t =	$year.'-12-31'; 
				$anggota = Anggota::where('id_gereja','=',$id_gereja)->where('deleted','=',0)->where('created_at','>=',$range_f)->where('created_at','<=',$range_t)->where('created_at','<=',$to)->get();
				array_push($arr_report,count($anggota));
				array_push($arr_tanggal,($year));
			}
		}
		
		array_push($report,$arr_report);
		array_push($report,$arr_tanggal);
		
		return $report;
	
	}
	
	private function dateConverter($date){
		
		$arr_date = explode('-',$date);
		
		return $this->getMonthFromNumber((int)$arr_date[0]).' '.$arr_date[1];
		
	}
	
	private function getMonthFromNumber($month){
		$month = $month%12;
		switch ($month) :
			case  1: return 'Januari';
			case  2: return 'Februari';
			case  3: return 'Maret';
			case  4: return 'April';
			case  5: return 'Mei';
			case  6: return 'Juni';
			case  7: return 'Juli';
			case  8: return 'Agustus';
			case  9: return 'September';
			case 10: return 'Oktober';
			case 11: return 'November';
			case 0: return 'Desember';
				
		endswitch;
	}
}

?>