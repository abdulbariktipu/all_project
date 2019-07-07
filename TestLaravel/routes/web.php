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
    //return view('Home');
    return "Home";
});

Route::get('/about', function () {
    //return view('Home');
    return "About";
});

Route::get('/contact', function () {
    return view('contact');
    //return "About";
});

Route::get('/alluser', function () {
    return view('user');
    //return "About";
});

// Route::get('alluser/{id}', function ($id) {
//     return 'User '.$id;
// });

Route::get('alluser/{id}/{name}', function ($id, $name) {
    return 'User '.$id.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
