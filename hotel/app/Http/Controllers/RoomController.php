<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Book;

class RoomController extends Controller
{
    //
    public function updateStatusRoom(Request $request)
    {
        $id = $request->input('hotelid');

        $checkin = $request->input('checkin');
        $checkin = strtotime($checkin);
        $checkin = date('Y-m-d', $checkin);
        session(['checkin' => $checkin]);

        $checkout = $request->input('checkout');
        $checkout = strtotime($checkout);
        $checkout = date('Y-m-d', $checkout);
        session(['checkout' => $checkout]);

        $ds_room = Room::getRoomByHotelId($id);
        $room_left = Book::getRoomLeft($ds_room);

        return view('roomlist', ['ds_room' => $room_left]);
    }
}
