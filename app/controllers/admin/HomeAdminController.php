<?php

use Carbon\Carbon;

class HomeAdminController extends BaseController {
	
	public function view_adminPanel()
	{		
		return View::make('pages.adminpanel');
	}
	
}

?>