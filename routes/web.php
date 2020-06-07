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
    return view('Master.CreateTransaksi');
});

Route::get('/cekUtang','PiutangController@sisaHari');

Route::get('/CreateTransaksi','journalController@vCreateBarang');
Route::post('/cobaCreateTransaksi','journalController@insertTransaksi');
Route::post('/cobaCreatePengeluaran','journalController@insertPengeluaran');
Route::get('/journal','journalController@showJournal');
Route::get('/bukuBesar','journalController@bukuBesar');
Route::get('/labaRugi','journalController@laporanLabaRugi');

// Route::post('/addTransaksi','TransaksiController@input');
Route::get('/detailPiutang/{id}','PiutangController@detail');
Route::post('/addCicilan','PiutangController@input');
Route::get('/bayarPiutang/{id}','PiutangController@cicil');


Route::get('/TampilPengeluaran','OutcomeController@read');
Route::post('/AddPengeluaran','OutcomeController@input');
Route::get('/editPengeluaran/{id}','OutcomeController@edit');
Route::post('/updatePengeluaran/{id}','OutcomeController@update');
Route::post('/delPengeluaran/{id}','OutcomeController@delete');


Route::get('/CreateBarang','BarangController@CreateBarang');
Route::get('/TampilBarang','BarangController@TampilBarang');
Route::post('/addBarang','BarangController@tambah');
Route::get('/delBarang/{id}','BarangController@hapus');
Route::get('/editBarang/{id}','BarangController@edit');
Route::post('/updateBarang/{id}','BarangController@update');

Route::get('/CreatePengeluaran','viewController@CreatePengeluaran');
//Route::get('/CreateTransaksi','viewController@CreateTransaksi');
Route::get('/Journal','viewController@journal');
Route::get('/BukuBesar','viewController@bukuBesar');
Route::get('/LabaRugi','viewController@laporanLabaRugi');
Route::get('/BayarUtang','viewController@bayarPiutang');
Route::get('/UmurPiutang','viewController@umurPiutang');
Route::get('/detailPiutang','viewController@detailPiutang');

Route::get('/cobaJumlahBarang','journalController@hitungStokBarang');