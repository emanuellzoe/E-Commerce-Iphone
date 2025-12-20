<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'auth'], function () {
    //admin page
    Route::get('/home', 'PageController@home');
    Route::get('product', 'PageController@product');
    Route::get('product/addform', 'PageController@productAddForm');
    Route::post('product/save', 'PageController@productSave');
    Route::get('product/edit/{id}', 'PageController@productEdit');
    Route::get('product/delete/{id}', 'PageController@productDelete');
    Route::put('product/update/{id}', 'PageController@productUpdate');
    Route::get('/users', 'PageController@users');
    Route::get('/users/addform', 'PageController@userAddForm');
    Route::post('/users/save', 'PageController@userSave');
    Route::get('/users/delete/{id}', 'PageController@usersDeleteForm');
    Route::get('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function () {
    //user biasa
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/ceklogin', 'AuthController@cekLogin');
    Route::get('/', 'VisitorController@search');
    Route::get('actsearch', 'VisitorController@actsearch');
    Route::get('search/live', 'VisitorController@liveSearch')->name('search.live');
});

Route::get('/setting', 'PageController@setting');
Route::put('/updatepass', 'PageController@updatepass');
