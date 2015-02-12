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

//example
Route::get('/import', ['as' => 'get.import' , 'uses' => 'ExcelController@import']);
Route::get('/import_kegiatan_gki_cianjur', ['as' => 'get.import_kegiatan_cianjur' , 'uses' => 'ImportEksportController@import_kegiatan_GKI_Cianjur']);
Route::get('/export', ['as' => 'get.export' , 'uses' => 'ExcelController@export']);




Route::get('/tes', function(){
	// $baptis = DB::table('anggota AS ang')->where('ang.deleted', '=', 0)->whereNotIn('ang.role', array(2));
		
		// $baptis = $baptis->join('baptis AS bap', 'bap.id_jemaat', '=', 'ang.id');
		// $baptis = $baptis->get();
		
		// var_dump($baptis);
	// $acc = new Account();		
		// $acc -> username = "superadmin";
		// $acc -> password = Hash::make("superadmin");
		// $acc -> id_gereja = null;
		//// $acc -> remember_token = "";
		// $acc -> role = 2;	//untuk superadmin 
		// $acc -> save();	
	// $keb = Kegiatan::find(1)->nama_jenis_kegiatan;
	// echo $keb;
	/*
	//nomor cabang
			// $cabang->kode = Input::get('kode_cabang');
			$max = 0;
			$rows = Kegiatan::all();
			if(count($rows))
			{
				foreach($rows as $key)
				{
					if($key->banyak_jemaat > $max)
					{
						$max = $key->banyak_jemaat;
					}
				}
				// $cabang->kode = $max+1; //nomor cabang paling terakhir di + 1
				echo $max+1;
			}
			else
			{
				// $cabang->kode = 1;
				echo "1";
			}
			*/
});


//view
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@view_index']); //langsung login view 

//post route
Route::post('/signin', ['as' => 'signin', 'uses' => 'AccountController@postSignIn']);

//logout
Route::get('/logout', ['as' => 'logout' , 'uses' => 'AccountController@postLogout']);					

//super admin ---> berhubungan dengan akun dll 
Route::group(['prefix' => 'superadmin', 'before' => 'authSuperAdmin'], function () {
	
	Route::get('/', ['as' => 'home_superadmin', 'uses' => 'SuperAdminController@superadmin_view_input_gereja']);		
	
	//ubah password super admin
	Route::post('/edit_password', ['as' => 'superadmin_edit_password', 'uses' => 'SuperAdminController@superadmin_edit_password']);
	
	//input data	
	Route::get('/view_gereja', ['as' => 'superadmin_view_input_gereja', 'uses' => 'SuperAdminController@superadmin_view_input_gereja']);	
	Route::get('/view_jenisbaptis', ['as' => 'superadmin_view_input_jenis_baptis', 'uses' => 'SuperAdminController@superadmin_view_input_jenis_baptis']);	
	Route::get('/view_jenisatestasi', ['as' => 'superadmin_view_input_jenis_atestasi', 'uses' => 'SuperAdminController@superadmin_view_input_jenis_atestasi']);	
	Route::get('/view_jeniskegiatan', ['as' => 'superadmin_view_input_jenis_kegiatan', 'uses' => 'SuperAdminController@superadmin_view_input_jenis_kegiatan']);	
	Route::get('/view_account', ['as' => 'superadmin_view_input_auth', 'uses' => 'SuperAdminController@superadmin_view_input_auth']);	
	Route::get('/view_ubah_password', ['as' => 'superadmin_view_input_ubah_password', 'uses' => 'SuperAdminController@superadmin_view_input_ubah_password']);
	
	//post data
	Route::post('/post_gereja', ['as' => 'superadmin_post_gereja', 'uses' => 'SuperAdminController@superadmin_postGereja']);
	Route::post('/post_jenis_baptis', ['as' => 'superadmin_post_jenis_baptis', 'uses' => 'SuperAdminController@superadmin_postJenisBaptis']);
	Route::post('/post_jenis_atestasi', ['as' => 'superadmin_post_jenis_atestasi', 'uses' => 'SuperAdminController@superadmin_postJenisAtestasi']);
	Route::post('/post_jenis_kegiatan', ['as' => 'superadmin_post_jenis_kegiatan', 'uses' => 'SuperAdminController@superadmin_postJenisKegiatan']);
	Route::post('/post_auth', ['as' => 'superadmin_post_auth', 'uses' => 'SuperAdminController@superadmin_postAuth']);
	
	//edit data
	Route::post('/edit_gereja', ['as' => 'superadmin_edit_gereja', 'uses' => 'SuperAdminController@superadmin_edit_gereja']);
	Route::post('/edit_jenis_baptis', ['as' => 'superadmin_edit_jenis_baptis', 'uses' => 'SuperAdminController@superadmin_edit_jenis_baptis']);
	Route::post('/edit_jenis_atestasi', ['as' => 'superadmin_edit_jenis_atestasi', 'uses' => 'SuperAdminController@superadmin_edit_jenis_atestasi']);
	Route::post('/edit_jenis_kegiatan', ['as' => 'superadmin_edit_jenis_kegiatan', 'uses' => 'SuperAdminController@superadmin_edit_jenis_kegiatan']);
	Route::post('/edit_auth', ['as' => 'superadmin_edit_auth', 'uses' => 'SuperAdminController@superadmin_edit_auth']);
	
	//change visible
	Route::post('/change_visible_gereja', ['as' => 'superadmin_change_visible_gereja', 'uses' => 'SuperAdminController@superadmin_change_visible_gereja']);
	Route::post('/change_visible_jenis_baptis', ['as' => 'superadmin_change_visible_jenis_baptis', 'uses' => 'SuperAdminController@superadmin_change_visible_jenis_baptis']);
	Route::post('/change_visible_jenis_atestasi', ['as' => 'superadmin_change_visible_jenis_atestasi', 'uses' => 'SuperAdminController@superadmin_change_visible_jenis_atestasi']);
	Route::post('/change_visible_jenis_kegiatan', ['as' => 'superadmin_change_visible_jenis_kegiatan', 'uses' => 'SuperAdminController@superadmin_change_visible_jenis_kegiatan']);
	// Route::post('/change_visible_auth', ['as' => 'superadmin_change_visible_auth', 'uses' => 'SuperAdminController@superadmin_change_visible_auth']);
	
	//delete data
	Route::delete('/delete_gereja', ['as' => 'superadmin_delete_gereja', 'uses' => 'SuperAdminController@superadmin_delete_gereja']);
	Route::delete('/delete_jenis_baptis', ['as' => 'superadmin_delete_jenis_baptis', 'uses' => 'SuperAdminController@superadmin_delete_jenis_baptis']);
	Route::delete('/delete_jenis_atestasi', ['as' => 'superadmin_delete_jenis_atestasi', 'uses' => 'SuperAdminController@superadmin_delete_jenis_atestasi']);
	Route::delete('/delete_jenis_kegiatan', ['as' => 'superadmin_delete_jenis_kegiatan', 'uses' => 'SuperAdminController@superadmin_delete_jenis_kegiatan']);
	Route::delete('/delete_auth', ['as' => 'superadmin_delete_auth', 'uses' => 'SuperAdminController@superadmin_delete_auth']);
});

//admin ---> asumsi superuser atau majelis yang bisa lakuin akses apa aj
Route::group(['prefix' => 'admin', 'before' => 'authAdmin'], function () {
	
	Route::get('/', ['as' => 'home_admin', 'uses' => 'UserBehaviorController@admin_view_kebaktian']);
		
	Route::get('/get_list_pendeta_by_gereja', ['as' => 'admin_get_list_pendeta_by_gereja', 'uses' => 'UserBehaviorController@admin_get_list_pendeta_by_gereja']);
	Route::get('/get_list_anggota_by_gereja', ['as' => 'admin_get_list_anggota_by_gereja', 'uses' => 'UserBehaviorController@admin_get_list_anggota_by_gereja']);	
	Route::get('/get_list_anggota_pria_by_gereja', ['as' => 'admin_get_list_anggota_pria_by_gereja', 'uses' => 'UserBehaviorController@admin_get_list_anggota_pria_by_gereja']);	
	Route::get('/get_list_anggota_wanita_by_gereja', ['as' => 'admin_get_list_anggota_wanita_by_gereja', 'uses' => 'UserBehaviorController@admin_get_list_anggota_wanita_by_gereja']);	
	Route::get('/get_list_anggota_hidup_by_gereja', ['as' => 'admin_get_list_anggota_hidup_by_gereja', 'uses' => 'UserBehaviorController@admin_get_list_anggota_hidup_by_gereja']);
	
	//view
	Route::get('/view_kebaktian', ['as' => 'admin_view_kebaktian', 'uses' => 'UserBehaviorController@admin_view_kebaktian']);
	Route::get('/view_anggota', ['as' => 'admin_view_anggota', 'uses' => 'UserBehaviorController@admin_view_anggota']);
	Route::get('/view_baptis', ['as' => 'admin_view_baptis', 'uses' => 'UserBehaviorController@admin_view_baptis']);
	Route::get('/view_atestasi', ['as' => 'admin_view_atestasi', 'uses' => 'UserBehaviorController@admin_view_atestasi']);
	Route::get('/view_pernikahan', ['as' => 'admin_view_pernikahan', 'uses' => 'UserBehaviorController@admin_view_pernikahan']);
	Route::get('/view_kedukaan', ['as' => 'admin_view_kedukaan', 'uses' => 'UserBehaviorController@admin_view_kedukaan']);
	Route::get('/view_dkh', ['as' => 'admin_view_dkh', 'uses' => 'UserBehaviorController@admin_view_dkh']);
	
	//search 
	Route::post('/search_kebaktian', ['as' => 'admin_search_kebaktian', 'uses' => 'UserBehaviorController@admin_search_kebaktian']);
	Route::post('/search_anggota', ['as' => 'admin_search_anggota', 'uses' => 'UserBehaviorController@admin_search_anggota']);
	Route::post('/search_baptis', ['as' => 'admin_search_baptis', 'uses' => 'UserBehaviorController@admin_search_baptis']);
	Route::post('/search_atestasi', ['as' => 'admin_search_atestasi', 'uses' => 'UserBehaviorController@admin_search_atestasi']);
	Route::post('/search_pernikahan', ['as' => 'admin_search_pernikahan', 'uses' => 'UserBehaviorController@admin_search_pernikahan']);
	Route::post('/search_kedukaan', ['as' => 'admin_search_kedukaan', 'uses' => 'UserBehaviorController@admin_search_kedukaan']);
	Route::post('/search_dkh', ['as' => 'admin_search_dkh', 'uses' => 'UserBehaviorController@admin_search_dkh']);
	
	//change visible
	Route::post('/change_visible_kebaktian', ['as' => 'change_visible_kebaktian', 'uses' => 'UserBehaviorController@admin_change_visible_kebaktian']);	
	Route::post('/change_visible_anggota', ['as' => 'change_visible_anggota', 'uses' => 'UserBehaviorController@admin_change_visible_anggota']);		
	Route::post('/change_visible_baptis', ['as' => 'change_visible_baptis', 'uses' => 'UserBehaviorController@admin_change_visible_baptis']);	
	Route::post('/change_visible_atestasi', ['as' => 'change_visible_atestasi', 'uses' => 'UserBehaviorController@admin_change_visible_atestasi']);	
	Route::post('/change_visible_pernikahan', ['as' => 'change_visible_pernikahan', 'uses' => 'UserBehaviorController@admin_change_visible_pernikahan']);	
	Route::post('/change_visible_kedukaan', ['as' => 'change_visible_kedukaan', 'uses' => 'UserBehaviorController@admin_change_visible_kedukaan']);	
	Route::post('/change_visible_dkh', ['as' => 'change_visible_dkh', 'uses' => 'UserBehaviorController@admin_change_visible_dkh']);	
	
	//edit data
	Route::post('/edit_kebaktian', ['as' => 'admin_edit_kebaktian', 'uses' => 'UserBehaviorController@admin_edit_kebaktian']);
	Route::post('/edit_anggota', ['as' => 'admin_edit_anggota', 'uses' => 'UserBehaviorController@admin_edit_anggota']);
	Route::post('/edit_baptis', ['as' => 'admin_edit_baptis', 'uses' => 'UserBehaviorController@admin_edit_baptis']);
	Route::post('/edit_atestasi', ['as' => 'admin_edit_atestasi', 'uses' => 'UserBehaviorController@admin_edit_atestasi']);
	Route::post('/edit_pernikahan', ['as' => 'admin_edit_pernikahan', 'uses' => 'UserBehaviorController@admin_edit_pernikahan']);
	Route::post('/edit_kedukaan', ['as' => 'admin_edit_kedukaan', 'uses' => 'UserBehaviorController@admin_edit_kedukaan']);
	Route::post('/edit_dkh', ['as' => 'admin_edit_dkh', 'uses' => 'UserBehaviorController@admin_edit_dkh']);
	
	//delete data
	Route::delete('/delete_kebaktian', ['as' => 'admin_delete_kebaktian', 'uses' => 'UserBehaviorController@admin_delete_kebaktian']);
	Route::delete('/delete_anggota', ['as' => 'admin_delete_anggota', 'uses' => 'UserBehaviorController@admin_delete_anggota']);
	Route::delete('/delete_baptis', ['as' => 'admin_delete_baptis', 'uses' => 'UserBehaviorController@admin_delete_baptis']);
	Route::delete('/delete_atestasi', ['as' => 'admin_delete_atestasi', 'uses' => 'UserBehaviorController@admin_delete_atestasi']);
	Route::delete('/delete_pernikahan', ['as' => 'admin_delete_pernikahan', 'uses' => 'UserBehaviorController@admin_delete_pernikahan']);
	Route::delete('/delete_kedukaan', ['as' => 'admin_delete_kedukaan', 'uses' => 'UserBehaviorController@admin_delete_kedukaan']);
	Route::delete('/delete_dkh', ['as' => 'admin_delete_dkh', 'uses' => 'UserBehaviorController@admin_delete_dkh']);
	
	//reporting
	Route::get('/reporting', ['as' => 'admin_view_reporting', 'uses' => 'ReportingController@admin_view_reporting']);
	Route::get('/jenis_kegiatan', ['as' => 'admin_get_jenis_kegiatan', 'uses' => 'ReportingController@get_jenis_kegiatan']);
	Route::get('/reporting/search_kebaktian/{from?}/{to?}/{jenis?}', ['as' => 'admin_report_kebaktian', 'uses' => 'ReportingController@search_kebaktian']);
	
	//import eksport
	// Route::get('/importeksport', ['as' => 'view_importeksport', 'uses' => 'ImportEksportController@view_import_eksport']);	
	
	//tutorial
	// Route::get('/tutorial', ['as' => 'view_tutorial', 'uses' => 'TutorialController@view_tutorial']);	
		
	
});


//user ---> asumsi orang TU yang jadi user bisa ngapain aja di sini
Route::group(['prefix' => 'user', 'before' => 'authUser'], function () {
	
	Route::get('/', ['as' => 'home_user', 'uses' => 'InputEditController@view_kebaktian']);				
	
	//get live search anggota
	// Route::get('/live_search_anggota', ['as' => 'user_search_anggota', 'uses' => 'InputEditController@user_search_anggota']);
	
	//view inputdata
	Route::get('/inputdata_kebaktian', ['as' => 'view_inputdata_kebaktian', 'uses' => 'InputEditController@view_kebaktian']);	
	Route::get('/inputdata_anggota', ['as' => 'view_inputdata_anggota', 'uses' => 'InputEditController@view_anggota']);	
	Route::get('/inputdata_baptis', ['as' => 'view_inputdata_baptis', 'uses' => 'InputEditController@view_baptis']);	
	Route::get('/inputdata_atestasi', ['as' => 'view_inputdata_atestasi', 'uses' => 'InputEditController@view_atestasi']);	
	Route::get('/inputdata_pernikahan', ['as' => 'view_inputdata_pernikahan', 'uses' => 'InputEditController@view_pernikahan']);	
	Route::get('/inputdata_kedukaan', ['as' => 'view_inputdata_kedukaan', 'uses' => 'InputEditController@view_kedukaan']);	
	Route::get('/inputdata_dkh', ['as' => 'view_inputdata_dkh', 'uses' => 'InputEditController@view_dkh']);	
		
	//post data
	Route::post('/post_kebaktian', ['as' => 'post_kebaktian', 'uses' => 'InputEditController@postKebaktian']);	
	Route::post('/post_anggota', ['as' => 'post_anggota', 'uses' => 'InputEditController@postAnggota']);
	Route::post('/post_baptis', ['as' => 'post_baptis', 'uses' => 'InputEditController@postBaptis']);
	Route::post('/post_atestasi', ['as' => 'post_atestasi', 'uses' => 'InputEditController@postAtestasi']);	
	Route::post('/post_pernikahan', ['as' => 'post_pernikahan', 'uses' => 'InputEditController@postPernikahan']);	
	Route::post('/post_kedukaan', ['as' => 'post_kedukaan', 'uses' => 'InputEditController@postKedukaan']);	
	Route::post('/post_dkh', ['as' => 'post_dkh', 'uses' => 'InputEditController@postDkh']);		
	
	//view olahdata
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
	Route::get('/jenis_kegiatan', ['as' => 'get_jenis_kegiatan', 'uses' => 'ReportingController@get_jenis_kegiatan']);
	Route::get('/reporting/search_kebaktian/{from?}/{to?}/{jenis?}', ['as' => 'report_kebaktian', 'uses' => 'ReportingController@search_kebaktian']);
	
	//import eksport
	Route::get('/importeksport', ['as' => 'view_importeksport', 'uses' => 'ImportEksportController@view_import_eksport']);
	
	Route::post('/import_kegiatan/{id_gereja}', ['as' => 'post.import_kegiatan' , 'uses' => 'ImportEksportController@import_kegiatan']);
	Route::post('/import_anggota/{id_gereja}', ['as' => 'post.import_anggota' , 'uses' => 'ImportEksportController@import_anggota']);
	
	Route::get('/export_kegiatan/{id_jenis_kegiatan?}/{id_gereja?}/{dateF?}/{dateT?}', ['as' => 'get.import_kegiatan' , 'uses' => 'ImportEksportController@export_kegiatan']);		
	// Route::get('/export_anggota/{id_jenis_kegiatan?}/{id_gereja?}/{dateF?}/{dateT?}', ['as' => 'get.import_kegiatan' , 'uses' => 'ImportEksportController@export_kegiatan']);		
		
	//tutorial
	Route::get('/tutorial', ['as' => 'view_tutorial', 'uses' => 'TutorialController@view_tutorial']);		
		
});



/*
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
*/
