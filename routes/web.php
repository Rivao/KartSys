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

//Route::get('/register', 'auth\RegisterController@index')->name('regist');

Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('karts/add', 'KartController@create')->name('kartAdd')->middleware('auth'); //displays form for adding karts in view "add"

Route::get('karts', 'KartController@index')->name('kartPage')->middleware('auth'); //displays all karts as a list in view "show"

Route::post('karts', 'KartController@store')->middleware('auth');

Route::get('karts/{kart_id}', 'KartController@show')->name('kart')->middleware('auth');

Route::post('karts/{kart_id}', 'CommentController@store')->name('add_comment')->middleware('auth');

Route::get('karts/{kart}/edit', 'KartController@edit')->name('kartEdit')->middleware('auth');

Route::post('karts/{kart}/edit', 'KartController@update')->name('kartPost')->middleware('auth');

Route::delete('karts/{kart}', 'KartController@destroy')->name('kartDel')->middleware('auth');

Route::get('reservations/add', 'ReservationController@create')->name('reservAdd')->middleware('auth');
