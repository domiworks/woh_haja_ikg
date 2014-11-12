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
}
