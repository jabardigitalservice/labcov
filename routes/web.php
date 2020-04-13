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
Route::resource('registrasi', 'RegisterPasienController')->middleware('auth');
Route::get('rujukan', 'RegisterPasienController@rujukan')->middleware('auth');
Route::get('rujukan/registersampel/{id}', 'RegisterPasienController@registerbysampel')->middleware('auth');
Route::post('scanbarcoderujukan','RegisterPasienController@scanbarcoderujukan')->middleware('auth');
Route::post('rujukan/registersampel/', 'RegisterPasienController@storeregisterbysampel')->middleware('auth');
Route::post('registrasi/{id}','RegisterPasienController@updatex')->middleware('auth');
Route::get('registrasi/delete/{id}','RegisterPasienController@delete')->middleware('auth');


Route::post('import/reg','ImportExportController@importpasien')->middleware('auth');
Route::get('import','ImportExportController@indeximport')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Pengambilan Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/

Route::get('pengambilansampel','PengambilanSampleController@index')->middleware('auth');
Route::get('pengambilansampel/detail/{penid}','PengambilanSampleController@show')->middleware('auth');
Route::get('pengambilansampel/ambil/{noreg}','PengambilanSampleController@create')->middleware('auth');
Route::post('pengambilansampel/ambil','PengambilanSampleController@store')->middleware('auth');
Route::get('pengambilansampel/tambahsampel','PengambilanSampleController@tambahsampelrujukan')->middleware('auth');
Route::post('pengambilansampel/tambahsampel','PengambilanSampleController@storesampelrujukan')->middleware('auth');

Route::get('pengambilansampel/edit/{id}','PengambilanSampleController@edit')->middleware('auth');
Route::post('pengambilansampel/update','PengambilanSampleController@update')->middleware('auth');

Route::get('pengambilansampel/delete/{id}','PengambilanSampleController@delete')->middleware('auth');
Route::post('pengambilansampel/apidel/','PengambilanSampleController@apidelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Ekstraksi Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/

Route::get('ekstraksi','EkstraksiController@index')->middleware('auth');
Route::get('ekstraksi/detail/{eksid}','EkstraksiController@show')->middleware('auth');
Route::get('ekstraksi/pilih/{noreg}','EkstraksiController@create')->middleware('auth');
Route::post('ekstraksi/pilih','EkstraksiController@store')->middleware('auth');

Route::get('ekstraksi/edit/{id}','EkstraksiController@edit')->middleware('auth');
Route::post('ekstraksi/update','EkstraksiController@update')->middleware('auth');

Route::get('ekstraksi/delete/{id}','EkstraksiController@delete')->middleware('auth');
Route::post('ekstraksi/apidel/','EkstraksiController@apidelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Ekstraksi Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/ 

Route::get('pemeriksaansampel','PemeriksaanSampelController@index')->middleware('auth');
Route::get('pemeriksaansampel/detail/{eksid}','PemeriksaanSampelController@show')->middleware('auth');
Route::get('pemeriksaansampel/periksa/{noreg}','PemeriksaanSampelController@create')->middleware('auth');
Route::post('pemeriksaansampel/periksa','PemeriksaanSampelController@store')->middleware('auth');

Route::get('pemeriksaansampel/edit/{id}','PemeriksaanSampelController@edit')->middleware('auth');
Route::post('pemeriksaansampel/update','PemeriksaanSampelController@update')->middleware('auth');

Route::get('pemeriksaansampel/delete/{id}','PemeriksaanSampelController@delete')->middleware('auth');
Route::post('pemeriksaansampel/apidel/','PemeriksaanSampelController@apidelete')->middleware('auth');