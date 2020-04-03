<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
/*
|--------------------------------------------------------------------------
| Register dan Importnya Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'HomeController@index')->middleware('auth');
Route::resource('registrasi', 'RegisterPasienController')->middleware('register','auth');
Route::post('registrasi/{id}','RegisterPasienController@updatex')->middleware('register','auth');
Route::get('registrasi/delete/{id}','RegisterPasienController@delete')->middleware('register','auth');


Route::post('import/reg','ImportExportController@importpasien')->middleware('register','auth');
Route::get('import','ImportExportController@indeximport')->middleware('register','auth');

/*
|--------------------------------------------------------------------------
| Pengambilan Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/

Route::get('pengambilansampel','PengambilanSampleController@index')->middleware('lab1','auth');
Route::get('pengambilansampel/ambil/{noreg}','PengambilanSampleController@create')->middleware('lab1','auth');
Route::post('pengambilansampel/ambil','PengambilanSampleController@store')->middleware('lab1','auth');

Route::get('pengambilansampel/edit/{noreg}','PengambilanSampleController@edit')->middleware('lab1','auth');
Route::post('pengambilansampel/update','PengambilanSampleController@update')->middleware('lab1','auth');

Route::get('pengambilansampel/delete/{id}','PengambilanSampleController@delete')->middleware('lab1','auth');