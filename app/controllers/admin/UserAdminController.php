<?php

use Carbon\Carbon;

class UserAdminController extends BaseController {
	
	public function view_homeadmin()
	{		
		return View::make('pages.admin.homeadmin');
	}
	
}

?>