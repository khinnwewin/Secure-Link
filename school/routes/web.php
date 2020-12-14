<?php

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
    return view('welcome');
});
 
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');


Route::group(['prefix' => 'admin'], function () {
	 Auth::routes(['verify' => true]);
	
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'Backend'], 
	function () {
	Route::resource('article', 'ArticleController');
	Route::resource('one', 'OneController');
		
});