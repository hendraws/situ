<?php

use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'For');
Route::get('/', 'FrontController@index');

// Route::get('/', function () {
// 	return redirect(route('login'));
// })->name('front');


Route::get('/clear', function () {
	Artisan::call('optimize:clear');
	return 'clear';
});

Auth::routes();

// dibawah ini dibutuhkan akses autitentifikasi
Route::group(['middleware' => 'auth'], function () { 
	Route::get('/undercontraction', 'HomeController@underContraction');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/master-barang', 'MasterController');
	Route::get('/master/{id}/delete/', 'MasterController@delete');
	Route::resource('/scan-in', 'ScanInController');
	Route::resource('/setting-location', 'SettingLocationController');
	Route::resource('/inspection', 'InspectionController');
	Route::resource('/scan-out', 'ScanOutController');
	Route::get('/management-user/{id}/delete', 'UserController@delete');
	Route::resource('/management-user', 'UserController');
	// command
	Route::group(['prefix'=>'/command/artisan','as'=>'account.'], function(){ 
		Route::get('/migrate', function(){
			Artisan::call('migrate');
			return 'Migrated';
		});

		Route::get('/clear-cache', function(){
			Artisan::call('optimize:clear');
			return 'Clear Cache';
		});
	});

});