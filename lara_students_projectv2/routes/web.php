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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/course', 'StudentCourseController@course')->name('course');
Route::post('/addcourse', 'StudentCourseController@saveCourse')->name('saveCourse');
Route::post('/deleteCourse', 'StudentCourseController@destroy')->name('deleteCourse');

Route::get('/getCourse', 'StudentCourseController@getCourse')->name('getCourse');

Route::get('/getProfile', 'StudentCourseController@getProfile')->name('getProfile');
Route::get('/profileEdit/{userId}', 'StudentCourseController@profileEdit')->name('profileEdit');
Route::post('/profileUpdate/{userId}', 'StudentCourseController@profileUpdate')->name('profileUpdate');

Route::get('/userReg', 'StudentCourseController@userReg')->name('userReg');


