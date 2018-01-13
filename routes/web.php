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

Route::get('karts/', 'KartController@show'); //displays all karts as a list in view "show"
