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
Route::post('pengambilansampel/labscanbarcode','PengambilanSampleController@labscanbarcode')->middleware('auth');
Route::post('pengambilansampel/savescanbarcode','PengambilanSampleController@savebyscan')->middleware('auth');
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


Route::get('ekstraksi/sampeldikembalikan/','EkstraksiController@sampeldikembalikan')->middleware('auth');
Route::get('ekstraksi/sampeldikembalikan/pilihulang/{id}','EkstraksiController@terima')->middleware('auth');
Route::post('ekstraksi/sampeldikembalikan/pilihulang/','EkstraksiController@kirimkembali')->middleware('auth');

Route::get('ekstraksi/delete/{id}','EkstraksiController@delete')->middleware('auth');

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


Route::get('pemeriksaansampel/kembalikan/{id}','PemeriksaanSampelController@return')->middleware('auth');
Route::post('pemeriksaansampel/kembalikan','PemeriksaanSampelController@returnupdate')->middleware('auth');


Route::get('pemeriksaansampel/periksaulang/{id}','PemeriksaanSampelController@periksakembali')->middleware('auth');
Route::get('pemeriksaansampel/pemeriksaandikembalikan','PemeriksaanSampelController@pemeriksaandikembalikan')->middleware('auth');
Route::post('pemeriksaansampel/periksaulang','PemeriksaanSampelController@kirimulang')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Ekstraksi Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/ 

Route::get('validasi','ValidasiController@index')->middleware('auth');
Route::get('validasi/detail/{pemid}','ValidasiController@showvalidated')->middleware('auth');
Route::get('validasi/verify/{pemid}','ValidasiController@show')->middleware('auth');
Route::post('validasi/verify','ValidasiController@verify')->middleware('auth');
Route::get('validasi/print/{id}','ValidasiController@print')->middleware('auth');


Route::get('validasi/edit/{id}','ValidasiController@edit')->middleware('auth');
Route::post('validasi/update','ValidasiController@update')->middleware('auth');


Route::get('validasi/kembalikan/{id}','ValidasiController@kembalikan')->middleware('auth');
Route::post('validasi/kembalikan','ValidasiController@kembalikanupdate')->middleware('auth');

Route::get('validasi/delete/{id}','ValidasiController@delete')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Ekstraksi Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/ 



Route::get('pelacakan','TracingController@pagetracing')->middleware('auth');
Route::post('pelacakan/sampel/','TracingController@tracingsampel')->middleware('auth');
Route::post('pelacakan/register/','TracingController@tracingregister')->middleware('auth');
Route::get('pelacakan/print/','TracingController@print')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Ekstraksi Sampel dan Importnya Routes
|--------------------------------------------------------------------------
|
*/ 


Route::get('pemeriksaanrdt','RDTController@index')->middleware('auth');
Route::get('pemeriksaanrdt/detail/{eksid}','RDTController@show')->middleware('auth');
Route::get('pemeriksaanrdt/periksa/{nosam}','RDTController@create')->middleware('auth');
Route::post('pemeriksaanrdt/periksa','RDTController@store')->middleware('auth');

Route::get('pemeriksaanrdt/edit/{id}','RDTController@edit')->middleware('auth');
Route::post('pemeriksaanrdt/update','RDTController@update')->middleware('auth');

Route::get('pemeriksaanrdt/periksaulang/{id}','RDTController@periksakembali')->middleware('auth');
Route::get('pemeriksaanrdt/pemeriksaandikembalikan','RDTController@pemeriksaandikembalikan')->middleware('auth');
Route::post('pemeriksaanrdt/periksaulang','RDTController@kirimulang')->middleware('auth');

Route::get('pemeriksaanrdt/delete/{id}','RDTController@delete')->middleware('auth');
Route::post('pemeriksaanrdt/apidel/','RDTController@apidelete')->middleware('auth');