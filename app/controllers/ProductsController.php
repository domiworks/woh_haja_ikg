<?php
/* copy ke route

//product
	//Route::get('/product/exist', ['as' => 'check.product.exist' , 'uses' => 'ProductsController@exist']);
	Route::get('/product', ['as' => 'get.product.list' , 'uses' => 'ProductsController@getAll']);
	Route::get('/product/{id}', ['as' => 'get.product.detail' , 'uses' => 'ProductsController@getById']);
	//Route::get('/product/<column>/{id}', ['as' => 'get.product.by<column>' , 'uses' => 'ProductsController@getBy<column>']);
	Route::post('/product', ['as' => 'add.product' , 'uses' => 'ProductsController@insert']);
	Route::put('/product/{id}', ['as' => 'edit.product' , 'uses' => 'ProductsController@updateFull']);
	//Route::put('/product/<column>/{id}', ['as' => 'edit.product.<column>' , 'uses' => 'ProductsController@update<column>']);
	Route::delete('/product/{id}', ['as' => 'delete.product' , 'uses' => 'ProductsController@delete']);

*/
class ProductsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Product::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Product::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($product)
	{
		$respond = array();
		if (count($product) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$product);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$product = Product::all();
		return $this->getReturn($product);
	}

	public function getById($id)
	{
		$product = Product::find($id);
		return $this->getReturn($product);
	}
	
	/*
	public function getBy<column>()
	{
		$product = Product::where('','=','')->get();
		return $this->getReturn($product);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Product::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$product->update($data);
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
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$product-> = ;
			try {
				$product->save();
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
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$product->delete();
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
		$product = Product::where('','=','')->get();
		if (count($product) >= 0)
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
	
	public function getProduct($id) {
		$respond = array();
		$product = Product::find($id);
		if (count($product) == 0) {
			$respond = array('code'=>'404','status' => 'Not Found');
		} else {
			$respond = array('code'=>'200','status' => 'OK','messages' => $product);
		}
		return Response::json($respond);
	}
	
	public function getProductByCategory($id) {
		$respond = array();
		$product = DB::table('product')->join('category', 'product.id_category', '=', 'category.id')->where('category.id', '=', $id)->get();
		if (count($product) == 0) {
			$respond = array('code'=>'404', 'status'=>'Not Found');
		} else {
			$respond = array('code'=>'200', 'status'=>'OK', 'messages'=>$product);
		}
		return Repsonse::json($respond);
	}
	
	public function getProductGallery($id) {
		$respond = array();
		$productGallery = DB::table('product')->join('gallery', 'gallery.id_product', '=', 'product.id')->where('product.id', '=', $id)->get();
		if (count($productGallery) == 0) {
			$respond = array('code'=>'404', 'status'=>'Not Found');
		} else {
			$respond = array('code'=>'200', 'status'=>'OK', 'messages'=>$productGallery);
		}
		return Response::json($respond);
	}
	
	public function create()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Product::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Product::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function edit($id)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Product::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$product->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	//delete udh ada loh d ats..
}