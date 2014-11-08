<?php
/* copy ke route

//gallery
	//Route::get('/gallery/exist', ['as' => 'check.gallery.exist' , 'uses' => 'GalleriesController@exist']);
	Route::get('/gallery', ['as' => 'get.gallery.list' , 'uses' => 'GalleriesController@getAll']);
	Route::get('/gallery/{id}', ['as' => 'get.gallery.detail' , 'uses' => 'GalleriesController@getById']);
	//Route::get('/gallery/<column>/{id}', ['as' => 'get.gallery.by<column>' , 'uses' => 'GalleriesController@getBy<column>']);
	Route::post('/gallery', ['as' => 'add.gallery' , 'uses' => 'GalleriesController@insert']);
	Route::put('/gallery/{id}', ['as' => 'edit.gallery' , 'uses' => 'GalleriesController@updateFull']);
	//Route::put('/gallery/<column>/{id}', ['as' => 'edit.gallery.<column>' , 'uses' => 'GalleriesController@update<column>']);
	Route::delete('/gallery/{id}', ['as' => 'delete.gallery' , 'uses' => 'GalleriesController@delete']);

*/
class GalleriesController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Gallery::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Gallery::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($gallery)
	{
		$respond = array();
		if (count($gallery) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$gallery);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$gallery = Gallery::all();
		return $this->getReturn($gallery);
	}

	public function getById($id)
	{
		$gallery = Gallery::find($id);
		return $this->getReturn($gallery);
	}
	
	/*
	public function getBy<column>()
	{
		$gallery = Gallery::where('','=','')->get();
		return $this->getReturn($gallery);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$gallery = Gallery::find($id);
		if ($gallery == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Gallery::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$gallery->update($data);
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
		$gallery = Gallery::find($id);
		if ($gallery == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$gallery-> = ;
			try {
				$gallery->save();
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
		$gallery = Gallery::find($id);
		if ($gallery == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$gallery->delete();
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
		$gallery = Gallery::where('','=','')->get();
		if (count($gallery) >= 0)
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
