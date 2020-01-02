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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('produk/delete-all', 'ProdukController@destroyAll')->name('produk.deleteAll');

Route::resource('produk', 'ProdukController');
Route::resource('kategori', 'KategoriController');
Route::resource('consumer', 'ConsumerController');

Route::get('/', 'OrderController@create')->name('halaman-utama');

Route::post('order', 'OrderController@store')->name('order.store');



//TODO: create order index

//TODO : include produk and kategori
