<?php

use Carbon\Carbon;

class HomeAdminController extends BaseController {
	
	/*
		THIS CONTROLLER TEMPORARY UNUSED
	*/
	
	public function view_adminPanel()
	{		
		return View::make('pages.adminpanel');
	}
	
}

?>