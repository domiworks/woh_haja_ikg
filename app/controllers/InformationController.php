<?php
/* copy ke route

//information
	//Route::get('/information/exist', ['as' => 'check.information.exist' , 'uses' => 'InformationController@exist']);
	Route::get('/information', ['as' => 'get.information.list' , 'uses' => 'InformationController@getAll']);
	Route::get('/information/{id}', ['as' => 'get.information.detail' , 'uses' => 'InformationController@getById']);
	//Route::get('/information/<column>/{id}', ['as' => 'get.information.by<column>' , 'uses' => 'InformationController@getBy<column>']);
	Route::post('/information', ['as' => 'add.information' , 'uses' => 'InformationController@insert']);
	Route::put('/information/{id}', ['as' => 'edit.information' , 'uses' => 'InformationController@updateFull']);
	//Route::put('/information/<column>/{id}', ['as' => 'edit.information.<column>' , 'uses' => 'InformationController@update<column>']);
	Route::delete('/information/{id}', ['as' => 'delete.information' , 'uses' => 'InformationController@delete']);

*/
class InformationController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Information::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Information::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($information)
	{
		$respond = array();
		if (count($information) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$information);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$information = Information::all();
		return $this->getReturn($information);
	}

	public function getById($id)
	{
		$information = Information::find($id);
		return $this->getReturn($information);
	}
	
	/*
	public function getBy<column>()
	{
		$information = Information::where('','=','')->get();
		return $this->getReturn($information);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$information = Information::find($id);
		if ($information == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Information::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$information->update($data);
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
		$information = Information::find($id);
		if ($information == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$information-> = ;
			try {
				$information->save();
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
		$information = Information::find($id);
		if ($information == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$information->delete();
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
		$information = Information::where('','=','')->get();
		if (count($information) >= 0)
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
		$validator = Validator::make($data, Information::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Information::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function edit($id) {
		$respond = array();
		$information = Information::find($id);
		if ($information == null) {
			$respond = array('code'=>'404', 'status'=>'Not Found');
		} else {
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Information::$rules);
			
			if ($validator->fails()) {
				$respond = array('code'=>'400', 'status'=>'Bad Request', 'messages'=>$validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$information->update($data);
				$respond = array('code'=>'204', 'status'=>'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500', 'status'=>'Internal Server Error', 'messages'=>$e);
			}
		}
		return Response::json($respond);
	}
	
	public function delete($id) {
		$respond = array();
		$information = Information::find($id);
		if ($information == null) {
			$respond = array('code'=>'404', 'status'=>'Not Found');
		} else {
			try {
				$information->delete();
				$respond = array('code'=>'204', 'status'=>'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500', 'status'=>'Internal Server Error', 'messages'=>$e);
			}
		}
		return Response::json($respond);
	}
	
	public function getAbout() {
		$respond = array();
		$information = Information::where('type','=','about')->get();
		if (count($information) == 0) {
			$respond = array('code'=>'404','status' => 'Not Found');
		} else {
			$respond = array('code'=>'200','status' => 'OK', 'messages'=>$information);
		}
		return Response::json($respond);
	}
}
