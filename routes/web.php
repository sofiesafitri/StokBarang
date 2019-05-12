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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::resource('pegawai','Pegawai');
Route::resource('barang','Barang');
Route::resource('sales','Sales');
Route::resource('persediaan','Persediaan');
Route::resource('barang_in','InBarang');
Route::resource('barang_out','OutBarang');

Route::get('/search/pegawai','Pegawai@search');
Route::get('/search/sales','Sales@search');
Route::get('/search/daftar_barang','Barang@search');
Route::get('/search/persediaan','Persediaan@search');
Route::get('/search/in','InBarang@search');
Route::get('/search/out','OutBarang@search');

Route::get('/home', 'User@index');
Route::get('/', 'User@login');
Route::post('/loginPost', 'User@loginPost');
Route::get('/register', 'User@register');
Route::post('/registerPost', 'User@registerPost');
Route::get('/logout', 'User@logout');
