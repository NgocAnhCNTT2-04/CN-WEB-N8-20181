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

//cac route nguoi dung chua dang nhap

Route::get('/', function(){
	return view('index');
})->name('home');

Route::get('/hotel/detail/{id}', 'HotelController@getHotelDetailById');

Route::get('/hotel/search', 'HotelController@search');

Route::get('/hotel/{city}', 'HotelController@getHotelByCity');

Route::post('hotel/filter', 'HotelController@filterHotel');

Route::post('hotel/sort', 'HotelController@sortHotel');

Route::post('hotel/dss', 'HotelController@getDSS');

Route::post('/hotel/room/update', 'RoomController@updateStatusRoom');

Route:: get('/register',function(){
	return view('register');
})->name('register');

Route::post('/profile/register', 'UserController@register');

//cac route phu trach login va logout
Route:: get('/login', function (){
    return view('login');
})->name('login');

Route:: post('checklogin', 'UserController@checkLogin');

Route::get('/logout', ['as'=>'logout', function(){
    session()->flush();
    return redirect()->route('home');
}])->middleware('checklogin');

//cac route cua nguoi dung da dang nhap
Route::post('/review/addreview', 'ReviewController@addReview')->middleware('checklogin');

Route::get('room/book/{id}', 'BookController@showBookingPage')->middleware('checklogin');

Route::get('/profile/{id}', 'UserController@showProfile')->middleware('checklogin');

Route::post('/profile/favorite/add', 'FavoriteController@addHotel')->middleware('checklogin');

Route:: post('/profile/update', 'UserController@updateProfile') -> name('update')->middleware('checklogin');

Route:: post('/profile/changepassword', 'UserController@changePassword') -> name('changepassword')->middleware('checklogin');

Route:: post('/profile/favorite/delete', 'FavoriteController@deleteHotel')->middleware('checklogin');

//cac route cho admin
Route:: get('/admin', 'AdminController@showAdminPage')->middleware('checkadmin');

Route:: post('/admin/updatehotel', 'HotelController@updateHotel') -> name('updatehotel')->middleware('checkadmin');
Route:: post('/admin/updateinforoom', 'RoomController@updateInfoRoom') -> name('updateinforoom')->middleware('checkadmin');
Route:: post('/admin/addhoteltest', 'HotelController@addHotelTest')->name('addhotel')->middleware('checkadmin');
Route:: post('/admin/saveimageupload', 'HotelController@saveImage')->middleware('checkadmin');

Route::post('user/updatestatus', 'UserController@updateStatus')->middleware('checkadmin');

Route::post('user/updaterole', 'UserController@updateRole')->middleware('checkadmin');

Route::post('/admin/deletehotel', 'HotelController@deleteHotel')->middleware('checkadmin');

Route:: post('/admin/addnewroom', 'RoomController@addNewRoom')->name('addroom')->middleware('checkadmin');

Route:: post('/admin/saveimageroom', 'RoomController@saveImageRoom')->middleware('checkadmin');

Route::post('/admin/deleteroom', 'RoomController@deleteRoom')->middleware('checkadmin');