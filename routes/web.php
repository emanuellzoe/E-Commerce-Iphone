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

Route::get('/', 'PageController@home');

// Menampilkan daftar produk
Route::get('/product', 'PageController@product');

// Menampilkan form tambah produk
Route::get('/product/addform', 'PageController@productAddForm');

// Menyimpan data produk baru ke database
Route::post('/product/save', 'PageController@productSave');