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
Route::get('/course', 'StudentCourseController@course')->name('course');
Route::post('/addcourse', 'StudentCourseController@saveCourse')->name('saveCourse');
Route::post('/deleteCourse', 'StudentCourseController@destroy')->name('deleteCourse');

Route::get('/getCourse', 'StudentCourseController@getCourse')->name('getCourse');


