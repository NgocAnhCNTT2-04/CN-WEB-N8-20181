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

    public function updateInfoRoom(Request $request)
    {
        $roomid = $request->input('roomid');
        $quality = $request->input('quality');
        $capacity = $request->input('capacity');
        $type_of_bed = $request->input('type_of_bed');
        $amount = $request->input('amount');
        $price_per_night = $request->input('price_per_night');
        $internet = $request->input('internet');
        $air = $request->input('air');
        $hairdryer = $request->input('hairdryer');
        $tv = $request->input('tv');
        $fridge = $request->input('fridge');
        $microwave = $request->input('microwave');
        $roomservice = $request->input('roomservice');
        $cancellation = $request->input('cancellation');
        $breakfast = $request->input('breakfast');


        Room::updateInfoRoom($roomid, $quality, $capacity, $type_of_bed, $amount, $price_per_night, $internet, $air, $hairdryer, $tv, $fridge, $microwave, $roomservice, $cancellation, $breakfast);
        return redirect() -> back();
    }
}
