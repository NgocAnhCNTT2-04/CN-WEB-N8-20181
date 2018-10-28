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

Route::get('/profile/{id}', 'UserController@showProfile');

Route::get('/book', function(){
	return view('book');
});

Route::get('/', function(){
	return view('index');
});

Route:: get('/login', function (){
    return view('login');
});

Route:: post('/profile/update', 'UserController@updateProfile') -> name('update');

Route:: post('/profile/changepassword', 'UserController@changePassword') -> name('changepassword');
