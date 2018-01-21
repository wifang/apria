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

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/prescriber', 'Auth/PrescriberController@index')->name('home');
  // Prescribers Routes...
Route::get('prescriber', 'Auth\PrescriberController@showSubscriberForm')->name('prescriber');
Route::post('prescriber', 'Auth\PrescriberController@prescriber');
