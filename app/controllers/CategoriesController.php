<?php
/* copy ke route

//category
	//Route::get('/category/exist', ['as' => 'check.category.exist' , 'uses' => 'CategoriesController@exist']);
	Route::get('/category', ['as' => 'get.category.list' , 'uses' => 'CategoriesController@getAll']);
	Route::get('/category/{id}', ['as' => 'get.category.detail' , 'uses' => 'CategoriesController@getById']);
	//Route::get('/category/<column>/{id}', ['as' => 'get.category.by<column>' , 'uses' => 'CategoriesController@getBy<column>']);
	Route::post('/category', ['as' => 'add.category' , 'uses' => 'CategoriesController@insert']);
	Route::put('/category/{id}', ['as' => 'edit.category' , 'uses' => 'CategoriesController@updateFull']);
	//Route::put('/category/<column>/{id}', ['as' => 'edit.category.<column>' , 'uses' => 'CategoriesController@update<column>']);
	Route::delete('/category/{id}', ['as' => 'delete.category' , 'uses' => 'CategoriesController@delete']);

*/
class CategoriesController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Category::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Category::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($category)
	{
		$respond = array();
		if (count($category) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$category);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$category = Category::all();
		return $this->getReturn($category);
	}

	public function getById($id)
	{
		$category = Category::find($id);
		return $this->getReturn($category);
	}
	
	/*
	public function getBy<column>()
	{
		$category = Category::where('','=','')->get();
		return $this->getReturn($category);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$category = Category::find($id);
		if ($category == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Category::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$category->update($data);
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
		$category = Category::find($id);
		if ($category == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$category-> = ;
			try {
				$category->save();
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
		$category = Category::find($id);
		if ($category == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$category->delete();
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
		$category = Category::where('','=','')->get();
		if (count($category) >= 0)
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
	
	public function getParent() {
		$respond = array();
		$category = Category::where('id','=','$this->id_parent')->get();
		if (count($category) == 0) {
			$respond = array('code'=>'404', 'status'=>'Not Found');
		} else {
			$respond = array('code'=>'200', 'status'=>'OK', 'messages'=>$category);
		}
		return Response::json($respond);
	}
	
	public function getCategory($id) {
		$respond = array();
		$category = Category::find($id);
		if (count($category) == 0) {
			$respond = array('code'=>'404', 'satus'=>'Not Found');
		} else {
			$respond = array('code'=>'200', 'status'=>'OK', 'messages'=>$category);
		}
		return Response::json($respond);
	}
	
	public function create() {
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Category::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Category::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function edit($id) {
		$respond = array();
		$category = Category::find($id);
		if ($category == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Category::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$category->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	//di ats udh ada yg sama prsis :| bikin lagi?
	public function delete($id) {
		$respond = array();
		$category = Category::find($id);
		if ($category == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$category->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
}