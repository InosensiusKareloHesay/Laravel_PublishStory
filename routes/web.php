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
    return view('item.home');
});

Route::get('/cerita', 'CeritaController@index');
Route::get('/cerita/create', 'CeritaController@create');
Route::get('/cerita/edit/{id}', 'CeritaController@edit');
Route::post('/cerita', 'CeritaController@store');
Route::get('/cerita/read/{id}', 'CeritaController@show');
Route::put('/cerita/edit/{id}', 'CeritaController@update');
Route::delete('/cerita/delete/{id}', 'CeritaController@destroy');

Route::get('/profil', 'UserController@index');
Route::put('/profil/update/{id}', 'UserController@update');

Route::get('/komentar', 'KomentarController@store');
Route::get('/komentar/edit/{id}', 'KomentarController@edit');
Route::put('/komentar/update/{id}', 'KomentarController@update');
Route::delete('/komentar/delete/{id}', 'KomentarController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/download/{id}', 'CeritaController@download');