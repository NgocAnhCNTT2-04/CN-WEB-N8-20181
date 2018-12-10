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
})->name('home');

Route:: get('/login', function (){
    return view('login');
})->name('login');

Route:: post('checklogin', 'UserController@checkLogin');

Route:: get('/user', function (){
    return view('user');
});


Route::get('/hotel/detail/{id}', 'HotelController@getHotelDetailById');

Route:: get('/admin', 'AdminController@showAdminPage');


Route:: post('/profile/update', 'UserController@updateProfile') -> name('update');

Route:: post('/profile/changepassword', 'UserController@changePassword') -> name('changepassword');

Route:: post('/profile/favorite/delete', 'FavoriteController@deleteHotel');

Route:: post('/admin/updatehotel', 'HotelController@updateHotel') -> name('updatehotel');
Route:: post('/admin/addhoteltest', 'HotelController@addHotelTest')->name('addhotel');
Route:: post('/admin/saveimageupload', 'HotelController@saveImage');

Route::get('/hotel/search', 'HotelController@search');

Route::get('/hotel/{city}', 'HotelController@getHotelByCity');

Route::post('hotel/filter', 'HotelController@filterHotel');

Route::post('hotel/sort', 'HotelController@sortHotel');

Route::post('hotel/dss', 'HotelController@getDSS');

Route::post('user/updatestatus', 'UserController@updateStatus');

Route::post('user/updaterole', 'UserController@updateRole');

Route::post('/hotel/room/update', 'RoomController@updateStatusRoom');

