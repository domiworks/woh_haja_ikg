<?php
/* copy ke route

//lookbook
	//Route::get('/lookbook/exist', ['as' => 'check.lookbook.exist' , 'uses' => 'LookbooksController@exist']);
	Route::get('/lookbook', ['as' => 'get.lookbook.list' , 'uses' => 'LookbooksController@getAll']);
	Route::get('/lookbook/{id}', ['as' => 'get.lookbook.detail' , 'uses' => 'LookbooksController@getById']);
	//Route::get('/lookbook/<column>/{id}', ['as' => 'get.lookbook.by<column>' , 'uses' => 'LookbooksController@getBy<column>']);
	Route::post('/lookbook', ['as' => 'add.lookbook' , 'uses' => 'LookbooksController@insert']);
	Route::put('/lookbook/{id}', ['as' => 'edit.lookbook' , 'uses' => 'LookbooksController@updateFull']);
	//Route::put('/lookbook/<column>/{id}', ['as' => 'edit.lookbook.<column>' , 'uses' => 'LookbooksController@update<column>']);
	Route::delete('/lookbook/{id}', ['as' => 'delete.lookbook' , 'uses' => 'LookbooksController@delete']);

*/
class LookbooksController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Lookbook::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Lookbook::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($lookbook)
	{
		$respond = array();
		if (count($lookbook) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$lookbook);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$lookbook = Lookbook::all();
		return $this->getReturn($lookbook);
	}

	public function getById($id)
	{
		$lookbook = Lookbook::find($id);
		return $this->getReturn($lookbook);
	}
	
	/*
	public function getBy<column>()
	{
		$lookbook = Lookbook::where('','=','')->get();
		return $this->getReturn($lookbook);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$lookbook = Lookbook::find($id);
		if ($lookbook == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Lookbook::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$lookbook->update($data);
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
		$lookbook = Lookbook::find($id);
		if ($lookbook == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$lookbook-> = ;
			try {
				$lookbook->save();
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
		$lookbook = Lookbook::find($id);
		if ($lookbook == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$lookbook->delete();
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
		$lookbook = Lookbook::where('','=','')->get();
		if (count($lookbook) >= 0)
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

}
