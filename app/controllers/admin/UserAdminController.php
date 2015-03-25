<?php

use Carbon\Carbon;

class UserAdminController extends BaseController {
	/*
		THIS CONTROLLER TEMPORARY UNUSED
	*/
	public function view_homeadmin()
	{		
		return View::make('pages.admin.homeadmin');
	}
	
}

?>