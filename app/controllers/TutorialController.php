<?php

use Carbon\Carbon;

class TutorialController extends BaseController {

	/*
		THIS CONTROLLER TEMPORARY UNUSED
	*/
	
	public function view_tutorial()
	{			
		// $header = $this->setHeader();
		// return View::make('pages.tutorial',
				// compact('header'));	
		return View::make('pages.tutorial');	
	}	
		
}

?>