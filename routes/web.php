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


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::resource('/category','CategoryController');

Route::post('/store','CategoryController@store');

Route::resource('/crime','CrimeController');
Route::resource('/map','MapController');

Route::post('/storeCrime','CrimeController@storeCrime');
