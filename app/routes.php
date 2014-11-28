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
Route::get('/tes', 'InputEditController@getListPembicara');


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
	Route::get('/', ['as' => 'profile_user', 'uses' => 'UserController@view_profile']);		
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
	
	// edit kebaktian
	// Route::put('/kebaktian', ['as' => 'edit_kebaktian', 'uses' => 'InputEditController@editKebaktian']);
	// edit anggota
	// Route::post('/anggota', ['as' => 'edit_anggota', 'uses' => 'InputEditController@editAnggota']);
	// edit baptis
	// Route::put('/baptis', ['as' => 'edit_baptis', 'uses' => 'InputEditController@editBaptis']);
	// edit atestasi
	// Route::put('/atestasi', ['as' => 'edit_atestasi', 'uses' => 'InputEditController@editAtestasi']);
	// edit pernikahan
	// Route::put('/pernikahan', ['as' => 'edit_pernikahan', 'uses' => 'InputEditController@editPernikahan']);
	// adit kedukaan
	// Route::put('/kedukaan', ['as' => 'edit_kedukaan', 'uses' => 'InputEditController@editKedukaan']);
	// edit dkh
	// Route::put('/dkh', ['as' => 'edit_dkh', 'uses' => 'InputEditController@editDkh']);
	
	// delete kebaktian		
	// delete anggota
	// delete baptis
	// delete atestasi
	// delete pernikahan
	// delete kedukaan
	// delete dkh
});


Route::get('/inputdata_kebaktian', function()
{
	return View::make('pages.user_inputdata.kebaktian_domi');
});

Route::get('/inputdata_anggota', function()
{
	return View::make('pages.user_inputdata.anggota_domi');
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
