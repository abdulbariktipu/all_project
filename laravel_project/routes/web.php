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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StudentController@index')->name('index');

Route::get('/create', 'StudentController@create')->name('create');

Route::post('/store', 'StudentController@store')->name('store');

Route::get('/edit/{id}', 'StudentController@edit')->name('edit');

Route::post('/update/{id}', 'StudentController@update')->name('update');

Route::post('/delete/{id}', 'StudentController@delete')->name('delete');

/*Route::get('/file_upload_page', 'StudentController@uploadPage')->name('file_upload_page');
Route::get('/saveFile', 'StudentController@saveFile')->name('saveFile');*/

Route::get('/fileis', 'StudentController@uploadPage')->name('file_upload_route');
Route::get('/saveFile', 'StudentController@saveFile');