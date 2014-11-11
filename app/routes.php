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
			
	// get view_kebaktian
	Route::get('/kebaktian', ['as' => 'view_kebaktian', 'uses' => 'InputEditController@view_kebaktian']);
	// get view_anggota
	Route::get('/anggota', ['as' => 'view_anggota', 'uses' => 'InputEditController@view_anggota']);
	// get view_baptis
	Route::get('/baptis', ['as' => 'view_baptis', 'uses' => 'InputEditController@view_baptis']);
	// get view_atestasi
	Route::get('/atestasi', ['as' => 'view_atestasi', 'uses' => 'InputEditController@view_atestasi']);
	// get view_pernikahan
	Route::get('/pernikahan', ['as' => 'view_pernikahan', 'uses' => 'InputEditController@view_pernikahan']);
	// get view_kedukaan
	Route::get('/kedukaan', ['as' => 'view_kedukaan', 'uses' => 'InputEditController@view_kedukaan']);
	// get view_dkh
	Route::get('/dkh', ['as' => 'view_dkh', 'uses' => 'InputEditController@view_dkh']);
	
	// post kebaktian
	Route::post('/post_kebaktian', ['as' => 'post_kebaktian', 'uses' => 'InputEditController@postKebaktian']);
	// post anggota
	Route::post('/post_anggota', ['as' => 'post_anggota', 'uses' => 'InputEditController@postAnggota']);
	// post baptis
	Route::post('/post_baptis', ['as' => 'post_baptis', 'uses' => 'InputEditController@postBaptis']);
	// post atestasi
	Route::post('/post_atestasi', ['as' => 'post_atestasi', 'uses' => 'InputEditController@postAtestasi']);
	// post pernikahan
	Route::post('/post_pernikahan', ['as' => 'post_pernikahan', 'uses' => 'InputEditController@postPernikahan']);
	// post kedukaan
	Route::post('/post_kedukaan', ['as' => 'post_kedukaan', 'uses' => 'InputEditController@postKedukaan']);
	// post dkh
	Route::post('/post_dkh', ['as' => 'post_dkh', 'uses' => 'InputEditController@postDkh']);
	
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
