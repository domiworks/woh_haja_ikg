<?php
use Carbon\Carbon;

Route::get('/tes', function(){
	$respond = array();
		$information = Information::where('type','=','about')->get();
		if (count($information) == 0) {
			$respond = array('code'=>'404','status' => 'Not Found');
		} else {
			$respond = array('code'=>'200','status' => 'OK', 'messages'=>$information);
		}
	echo $respond['messages'];
});

// copy ke route

//$RESOURCE$
	//Route::get('/$RESOURCE$/exist', ['as' => 'check.$RESOURCE$.exist' , 'uses' => '$NAME$@exist']);
Route::get('/$RESOURCE$', ['as' => 'get.$RESOURCE$.list' , 'uses' => '$NAME$@getAll']);
Route::get('/$RESOURCE$/{id}', ['as' => 'get.$RESOURCE$.detail' , 'uses' => '$NAME$@getById']);
	//Route::get('/$RESOURCE$/<column>/{id}', ['as' => 'get.$RESOURCE$.by<column>' , 'uses' => '$NAME$@getBy<column>']);
Route::post('/$RESOURCE$', ['as' => 'add.$RESOURCE$' , 'uses' => '$NAME$@insert']);
Route::put('/$RESOURCE$/{id}', ['as' => 'edit.$RESOURCE$' , 'uses' => '$NAME$@updateFull']);
	//Route::put('/$RESOURCE$/<column>/{id}', ['as' => 'edit.$RESOURCE$.<column>' , 'uses' => '$NAME$@update<column>']);
Route::delete('/$RESOURCE$/{id}', ['as' => 'delete.$RESOURCE$' , 'uses' => '$NAME$@delete']);

//

/* routing sementara buat coba html + css + jquery */
Route::group(array('prefix' => 'test'), function()
{

	//MOBILE FRUNK test/index_01
	Route::get('/index_01', function()
	{
		return View::make('pages.mobile.index_01');
	});

});