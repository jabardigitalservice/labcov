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
Route::resource('registrasi', 'RegisterPasienController')->middleware('auth');
Route::post('registrasi/{id}','RegisterPasienController@updatex')->middleware('auth');
Route::get('registrasi/delete/{id}','RegisterPasienController@delete')->middleware('auth');
Route::post('import/reg','ImportExportController@importpasien')->middleware('auth');
Route::get('import','ImportExportController@indeximport')->middleware('auth');