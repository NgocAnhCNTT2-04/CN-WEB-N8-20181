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

Route::get('room/book/{id}', 'BookController@showBookingPage');

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
Route:: post('/admin/updateinforoom', 'RoomController@updateInfoRoom') -> name('updateinforoom');
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

Route::get('/logout', ['as'=>'logout', function(){
    session()->flush();
    return redirect()->route('home');
}]);

Route::post('/profile/favorite/add', 'FavoriteController@addHotel');

Route::post('/admin/deletehotel', 'HotelController@deleteHotel');

Route::post('/review/addreview', 'ReviewController@addReview');

Route:: get('/register',function(){
	return view('register');
})->name('register');

Route::post('/profile/register', 'UserController@register');

Route:: post('/admin/addnewroom', 'RoomController@addNewRoom')->name('addroom');

Route:: post('/admin/saveimageroom', 'RoomController@saveImageRoom');

Route::post('/admin/deleteroom', 'RoomController@deleteRoom');

