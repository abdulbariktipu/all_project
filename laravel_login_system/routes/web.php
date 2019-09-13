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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/login', 'UserLoginController@login')->name('login');
Route::post('/checklogin', 'UserLoginController@checklogin')->name('checklogin');
Route::get('/login/successlogin', 'UserLoginController@successlogin')->name('successlogin');
Route::get('/login/logout', 'UserLoginController@logout')->name('logout');