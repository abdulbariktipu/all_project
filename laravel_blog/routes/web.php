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
    return view('homePage');
});*/

Route::get('/', 'UserRegisController@index')->name('index');
Route::post('/addUser', 'UserRegisController@addUser')->name('addUser');

/*Route::get('/', 'UserRegisController@index');
Route::get('/getUsers', 'UserRegisController@getUsers');
Route::post('/addUser', 'UserRegisController@addUser');
Route::post('/updateUser', 'UserRegisController@updateUser');
Route::get('/deleteUser/{id}', 'UserRegisController@deleteUser');*/
