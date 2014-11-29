<?php

use Carbon\Carbon;

class TutorialController extends BaseController {

	public function view_tutorial()
	{			
		return View::make('pages.tutorial');	
	}	
		
}

?>