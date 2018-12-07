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

Route:: get('/user', function (){
    return view('user');
});


Route:: get('/detail',function (){
    return view('detail');
});

Route:: get('/filter',function(){
	return view('hotel');
});

Route:: get('/admin', 'AdminController@showAdminPage');


Route:: post('/profile/update', 'UserController@updateProfile') -> name('update');

Route:: post('/profile/changepassword', 'UserController@changePassword') -> name('changepassword');

Route:: post('/profile/favorite/delete', 'FavoriteController@deleteHotel');

Route:: post('/admin/updatehotel', 'HotelController@updateHotel') -> name('updatehotel');

