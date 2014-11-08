<?php
/* copy ke route

//locator
	//Route::get('/locator/exist', ['as' => 'check.locator.exist' , 'uses' => 'LocatorsController@exist']);
	Route::get('/locator', ['as' => 'get.locator.list' , 'uses' => 'LocatorsController@getAll']);
	Route::get('/locator/{id}', ['as' => 'get.locator.detail' , 'uses' => 'LocatorsController@getById']);
	//Route::get('/locator/<column>/{id}', ['as' => 'get.locator.by<column>' , 'uses' => 'LocatorsController@getBy<column>']);
	Route::post('/locator', ['as' => 'add.locator' , 'uses' => 'LocatorsController@insert']);
	Route::put('/locator/{id}', ['as' => 'edit.locator' , 'uses' => 'LocatorsController@updateFull']);
	//Route::put('/locator/<column>/{id}', ['as' => 'edit.locator.<column>' , 'uses' => 'LocatorsController@update<column>']);
	Route::delete('/locator/{id}', ['as' => 'delete.locator' , 'uses' => 'LocatorsController@delete']);

*/
class LocatorsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Locator::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Locator::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($locator)
	{
		$respond = array();
		if (count($locator) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$locator);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$locator = Locator::all();
		return $this->getReturn($locator);
	}

	public function getById($id)
	{
		$locator = Locator::find($id);
		return $this->getReturn($locator);
	}
	
	/*
	public function getBy<column>()
	{
		$locator = Locator::where('','=','')->get();
		return $this->getReturn($locator);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$locator = Locator::find($id);
		if ($locator == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Locator::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$locator->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function update<column>($id)
	{
		$respond = array();
		$locator = Locator::find($id);
		if ($locator == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$locator-> = ;
			try {
				$locator->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	*/
	
	public function delete($id)
	{
		$respond = array();
		$locator = Locator::find($id);
		if ($locator == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$locator->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function exist()
	{
		$respond = array();
		$locator = Locator::where('','=','')->get();
		if (count($locator) >= 0)
		{
			$respond = array('code'=>'200','status' => 'OK');
		}
		else
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		return Response::json($respond);
	}
	*/
	
	public function create() {
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Locator::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Locator::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function update($id) {
		$respond = array();
		$locator = Locator::find($id);
		if ($locator == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Locator::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$locator->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
				//kenapa selalu 'no content'?
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function delete($id) {
		$respond = array();
		$locator = Locator::find($id);
		if ($locator == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$locator->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	public function getMain() 
	{
		$respond = array();
		$locator = Locator::where('main','=','1')->get();
		if (count($locator) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$locator);
		}
		return Response::json($respond);
	}
	
	public function getStore($id) {
		$respond = array();
		$locator = Locator::find($id);
		if (count($locator) == 0) {
			$respond = array('code'=>'404','status' => 'Not Found');
		} else {
			$respond = array('code'=>'200','status' => 'OK','messages' => $locator);
		}
		return Response::json($respond);
	}
	
}
