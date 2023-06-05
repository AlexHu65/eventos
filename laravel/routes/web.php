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
  return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@conferencia')->name('home');
Route::get('/conferencia/{slug}', 'HomeController@conferencia')->name('conferencia.start');
Route::post('/contacto', 'HomeController@sendComentario')->name('home');
Route::post('/ciudades', 'HomeController@ciudades')->name('ciudades');



Route::group(['prefix' => 'admTemplate'], function () {
  Voyager::routes();
});
