<?php

use Carbon\Carbon;

class ReportingController extends BaseController {

	public function view_reporting()
	{			
		return View::make('pages.reporting');	
	}	
		
}

?>