<?php

use Carbon\Carbon;

class TutorialController extends BaseController {

	public function view_tutorial()
	{			
		$header = $this->setHeader();
		return View::make('pages.tutorial',
				compact('header'));	
	}	
		
}

?>