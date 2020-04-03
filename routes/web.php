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
| Home Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'HomeController@index')->middleware('auth');
Route::resource('registrasi', 'RegisterPasienController')->middleware('superadmin','register','auth');
Route::post('registrasi/{id}','RegisterPasienController@updatex')->middleware('superadmin','register','auth');
Route::get('registrasi/delete/{id}','RegisterPasienController@delete')->middleware('superadmin','register','auth');


Route::post('import/reg','ImportExportController@importpasien')->middleware('superadmin','register','auth');
Route::get('import','ImportExportController@indeximport')->middleware('superadmin','register','auth');


Route::resource('pengambilansampel', 'PengambilanSampleController')->middleware('lab1','auth');