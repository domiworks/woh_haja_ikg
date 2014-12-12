<?php

/* 
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/import', ['as' => 'get.import' , 'uses' => 'ExcelController@import']);
Route::get('/export', ['as' => 'get.export' , 'uses' => 'ExcelController@export']);

Route::get('/tes', function(){
	$baptis = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->whereNotIn('ang.role', array(2));
		
		$baptis = $baptis->join('baptis AS bap', 'bap.id_jemaat', '=', 'ang.id');
		$baptis = $baptis->get();
		
		var_dump($baptis);
});


//view
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@view_index']); //langsung login view aja	

//post route
Route::post('/signin', ['as' => 'signin', 'uses' => 'HomeController@postSignIn']);

//admin ---> asumsi superuser atau majelis yang bisa lakuin akses apa aj
Route::group(['prefix' => 'admin', 'before' => 'authAdmin'], function () {
// Route::group(['prefix' => 'admin'], function () {
	Route::get('/', ['as' => 'home_admin', 'uses' => 'UserAdminController@view_homeadmin']);	
	//logout
	Route::get('/logout', ['as' => 'logout_admin' , 'uses' => 'UserAdminController@postLogout']);

});


//user ---> asumsi orang TU yang jadi user bisa ngapain aja di sini
Route::group(['prefix' => 'user', 'before' => 'authUser'], function () {
// Route::group(['prefix' => 'user'], function() {	

	// Route::get('/', ['as' => 'profile_user', 'uses' => 'UserController@view_profile']);		
	Route::get('/', ['as' => 'profile_user', 'uses' => 'InputEditController@view_kebaktian']);		
	
	//logout
	Route::get('/logout', ['as' => 'logout_user' , 'uses' => 'UserController@postLogout']);					
	
	//input data 
	Route::get('/inputdata_kebaktian', ['as' => 'view_inputdata_kebaktian', 'uses' => 'InputEditController@view_kebaktian']);	
	Route::get('/inputdata_anggota', ['as' => 'view_inputdata_anggota', 'uses' => 'InputEditController@view_anggota']);	
	Route::get('/inputdata_baptis', ['as' => 'view_inputdata_baptis', 'uses' => 'InputEditController@view_baptis']);	
	Route::get('/inputdata_atestasi', ['as' => 'view_inputdata_atestasi', 'uses' => 'InputEditController@view_atestasi']);	
	Route::get('/inputdata_pernikahan', ['as' => 'view_inputdata_pernikahan', 'uses' => 'InputEditController@view_pernikahan']);	
	Route::get('/inputdata_kedukaan', ['as' => 'view_inputdata_kedukaan', 'uses' => 'InputEditController@view_kedukaan']);	
	Route::get('/inputdata_dkh', ['as' => 'view_inputdata_dkh', 'uses' => 'InputEditController@view_dkh']);	
		
	Route::post('/post_kebaktian', ['as' => 'post_kebaktian', 'uses' => 'InputEditController@postKebaktian']);	
	Route::post('/post_anggota', ['as' => 'post_anggota', 'uses' => 'InputEditController@postAnggota']);
	Route::post('/post_baptis', ['as' => 'post_baptis', 'uses' => 'InputEditController@postBaptis']);
	Route::post('/post_atestasi', ['as' => 'post_atestasi', 'uses' => 'InputEditController@postAtestasi']);	
	Route::post('/post_pernikahan', ['as' => 'post_pernikahan', 'uses' => 'InputEditController@postPernikahan']);	
	Route::post('/post_kedukaan', ['as' => 'post_kedukaan', 'uses' => 'InputEditController@postKedukaan']);	
	Route::post('/post_dkh', ['as' => 'post_dkh', 'uses' => 'InputEditController@postDkh']);
	
	// Route::get('/tes', function(){
		// return View::make('pages.user_olahdata.kedukaan_domi');
	// });
	
	//olah data
	Route::get('/olahdata_kebaktian', ['as' => 'view_olahdata_kebaktian', 'uses' => 'OlahDataController@view_kebaktian']);
	Route::get('/olahdata_anggota', ['as' => 'view_olahdata_anggota', 'uses' => 'OlahDataController@view_anggota']);
	Route::get('/olahdata_baptis', ['as' => 'view_olahdata_baptis', 'uses' => 'OlahDataController@view_baptis']);
	Route::get('/olahdata_atestasi', ['as' => 'view_olahdata_atestasi', 'uses' => 'OlahDataController@view_atestasi']);
	Route::get('/olahdata_pernikahan', ['as' => 'view_olahdata_pernikahan', 'uses' => 'OlahDataController@view_pernikahan']);
	Route::get('/olahdata_kedukaan', ['as' => 'view_olahdata_kedukaan', 'uses' => 'OlahDataController@view_kedukaan']);
	Route::get('/olahdata_dkh', ['as' => 'view_olahdata_dkh', 'uses' => 'OlahDataController@view_dkh']);
	
	//search 
	Route::post('/search_kebaktian', ['as' => 'search_kebaktian', 'uses' => 'OlahDataController@search_kebaktian']);
	Route::post('/search_anggota', ['as' => 'search_anggota', 'uses' => 'OlahDataController@search_anggota']);
	Route::post('/search_baptis', ['as' => 'search_baptis', 'uses' => 'OlahDataController@search_baptis']);
	Route::post('/search_atestasi', ['as' => 'search_atestasi', 'uses' => 'OlahDataController@search_atestasi']);
	Route::post('/search_pernikahan', ['as' => 'search_pernikahan', 'uses' => 'OlahDataController@search_pernikahan']);
	Route::post('/search_kedukaan', ['as' => 'search_kedukaan', 'uses' => 'OlahDataController@search_kedukaan']);
	Route::post('/search_dkh', ['as' => 'search_dkh', 'uses' => 'OlahDataController@search_dkh']);
	
	/*
	//get detail data
	Route::get('/detail_kebaktian', ['as' => 'detail_kebaktian', 'uses' => 'OlahDataController@detail_kebaktian']);
	Route::get('/detail_anggota', ['as' => 'detail_anggota', 'uses' => 'OlahDataController@detail_anggota']);	
	Route::get('/detail_baptis', ['as' => 'detail_baptis', 'uses' => 'OlahDataController@detail_baptis']);	
	Route::get('/detail_atestasi', ['as' => 'detail_atestasi', 'uses' => 'OlahDataController@detail_atestasi']);
	Route::get('/detail_pernikahan', ['as' => 'detail_pernikahan', 'uses' => 'OlahDataController@detail_pernikahan']);
	Route::get('/detail_kedukaan', ['as' => 'detail_kedukaan', 'uses' => 'OlahDataController@detail_kedukaan']);
	Route::get('/detail_dkh', ['as' => 'detail_dkh', 'uses' => 'OlahDataController@detail_dkh']);
	*/
	
	//edit or update
	Route::post('/edit_kebaktian', ['as' => 'edit_kebaktian', 'uses' => 'OlahDataController@edit_kebaktian']);
	Route::post('/edit_anggota', ['as' => 'edit_anggota', 'uses' => 'OlahDataController@edit_anggota']);
	Route::post('/edit_baptis', ['as' => 'edit_baptis', 'uses' => 'OlahDataController@edit_baptis']);	
	Route::post('/edit_atestasi', ['as' => 'edit_atestasi', 'uses' => 'OlahDataController@edit_atestasi']);
	Route::post('/edit_pernikahan', ['as' => 'edit_pernikahan', 'uses' => 'OlahDataController@edit_pernikahan']);
	Route::post('/edit_kedukaan', ['as' => 'edit_kedukaan', 'uses' => 'OlahDataController@edit_kedukaan']);
	Route::post('/edit_dkh', ['as' => 'edit_dkh', 'uses' => 'OlahDataController@edit_dkh']);
	
	//delete 
	Route::delete('/delete_kebaktian', ['as' => 'delete_kebaktian', 'uses' => 'OlahDataController@delete_kebaktian']);
	Route::delete('/delete_anggota', ['as' => 'delete_anggota', 'uses' => 'OlahDataController@delete_anggota']);
	Route::delete('/delete_baptis', ['as' => 'delete_baptis', 'uses' => 'OlahDataController@delete_baptis']);
	Route::delete('/delete_atestasi', ['as' => 'delete_atestasi', 'uses' => 'OlahDataController@delete_atestasi']);
	Route::delete('/delete_pernikahan', ['as' => 'delete_pernikahan', 'uses' => 'OlahDataController@delete_pernikahan']);
	Route::delete('/delete_kedukaan', ['as' => 'delete_kedukaan', 'uses' => 'OlahDataController@delete_kedukaan']);
	Route::delete('/delete_dkh', ['as' => 'delete_dkh', 'uses' => 'OlahDataController@delete_dkh']);
	
	//reporting
	Route::get('/reporting', ['as' => 'view_reporting', 'uses' => 'ReportingController@view_reporting']);	
	
	//import eksport
	Route::get('/importeksport', ['as' => 'view_importeksport', 'uses' => 'ImportEksportController@view_import_eksport']);	
	
	//tutorial
	Route::get('/tutorial', ['as' => 'view_tutorial', 'uses' => 'TutorialController@view_tutorial']);		
	
	
});




Route::get('/inputdata_kebaktian', function()
{
	return View::make('pages.user_inputdata.kebaktian_domi');
});

Route::get('/inputdata_anggota', function()
{
	return View::make('pages.user_inputdata.anggota_domi');
});
Route::get('/inputdata_anggota2', function()
{
	return View::make('pages.user_inputdata.anggota');
});

Route::get('/inputdata_baptis', function()
{
	return View::make('pages.user_inputdata.baptis_domi');
});

Route::get('/inputdata_atestasi', function()
{
	return View::make('pages.user_inputdata.atestasi_domi');
});

Route::get('/inputdata_kedukaan', function()
{
	return View::make('pages.user_inputdata.kedukaan_domi');
});

Route::get('/inputdata_dkh', function()
{
	return View::make('pages.user_inputdata.dkh_domi');
});


Route::get('/olahdata_anggota', function()
{
	return View::make('pages.user_olahdata.anggota_domi');
});
Route::get('/olahdata_anggota', function()
{
	return View::make('pages.user_olahdata.anggota_domi');
});
Route::get('/olahdata_atestasi', function()
{
	return View::make('pages.user_olahdata.atestasi_domi');
});

Route::get('/olahdata_baptis', function()
{
	return View::make('pages.user_olahdata.baptis_domi');
});
Route::get('/olahdata_dkh', function()
{
	return View::make('pages.user_olahdata.dkh_domi');
});

Route::get('/olahdata_kebaktian', function()
{
	return View::make('pages.user_olahdata.kebaktian_domi');
});

Route::get('/olahdata_kedukaan', function()
{
	return View::make('pages.user_olahdata.kedukaan_domi');
});
Route::get('/olahdata_pernikahan', function()
{
	return View::make('pages.user_olahdata.pernikahan_domi');
});
