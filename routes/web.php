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

Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::group(['middleware' => 'auth'], function(){
	Route::get('contact/import/google', ['as'=>'google.import', 'uses'=>'ContactController@importGoogleContact']);
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('users/{id}/edit', 'UsersController@edit');
	Route::put('users/{id}', 'UsersController@update');
	Route::get('families/create/{id}', 'FamiliesController@create');
	Route::get('families/{id}/edit', 'FamiliesController@edit');
	Route::post('families/{id}', 'FamiliesController@store');
	Route::put('families/{id}', 'FamiliesController@update');
	/* Route::get('contacts', 'ContactController@index'); */
	Route::delete('families/{id}', 'FamiliesController@destroy');
	Route::get('sms_infos', 'SmsController@index');
	Route::get('sms_infos/create', 'SmsController@create');
	Route::post('sms_infos', 'SmsController@store');
	Route::resource('jadwals', 'JadwalsController');
	Route::resource('contacts', 'ContactController');
	Route::get('jadwals/create', 'JadwalsController@create');
	Route::get('jenis_kegiatans/create', 'JenisKegiatansController@create');
	Route::get('jenis_kegiatans', 'JenisKegiatansController@index');


});
