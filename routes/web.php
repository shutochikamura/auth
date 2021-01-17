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
Route::resource('board', 'BoardController');

Route::post('board/{id}/likes', 'LikeController@store')->name('likes');
Route::post('board/{id}/unlikes', 'LikeController@destroy')->name('unlikes');
