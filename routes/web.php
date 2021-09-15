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

Route::get('/', function () {
	return redirect(route('login'));
})->name('front');


Route::get('/clear', function () {
	Artisan::call('optimize:clear');
    return 'cleard';
});
Route::get('/undercontraction', 'HomeController@underContraction');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
