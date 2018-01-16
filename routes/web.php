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

Route::get('/', 'HomeController@index');

Route::get('karts/add', 'KartController@create'); //displays form for adding karts in view "add"

Route::get('karts', 'KartController@index')->name('kartPage'); //displays all karts as a list in view "show"

Route::post('karts', 'KartController@store');

Route::get('karts/{kart_id}', 'KartController@show')->name('kart');

Route::post('karts/{kart_id}', 'CommentController@store')->name('add_comment');

Route::get('karts/{kart}/edit', 'KartController@edit')->name('kartEdit');

Route::post('karts/{kart}/edit', 'KartController@update')->name('kartPost');

Route::delete('karts/{kart}', 'KartController@destroy')->name('kartDel');
