<?php

use Carbon\Carbon;

class ReportingController extends BaseController {

	public function view_reporting()
	{			
		$header = $this->setHeader();
		return View::make('pages.reporting',
				compact('header'));	
	}	
		
}

?>