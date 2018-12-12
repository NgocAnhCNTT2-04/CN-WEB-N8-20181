<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\Room;

class AdminController extends Controller
{
    //
    public function showAdminPage()
    {
        $hotels = Hotel::all();
        $users = User::all();
        $rooms = Room::getRoomAndHotel();
        return view('admin', ['hotels' => $hotels, 'users' => $users, 'rooms' => $rooms]);
    }
}
