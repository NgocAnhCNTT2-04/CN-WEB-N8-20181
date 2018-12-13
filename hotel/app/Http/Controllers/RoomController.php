<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Book;
use App\Hotel;

class RoomController extends Controller
{
    //
    public function updateStatusRoom(Request $request)
    {
        $id = $request->input('hotelid');

        $checkin = $request->input('checkin');
        if($checkin != '') {
            $checkin = strtotime($checkin);
            $checkin = date('Y-m-d', $checkin);
        }
        session(['checkin' => $checkin]);

        $checkout = $request->input('checkout');
        if($checkout != '') {
            $checkout = strtotime($checkout);
            $checkout = date('Y-m-d', $checkout);
        }
        session(['checkout' => $checkout]);

        $checkin1 = $request->input('checkin');
        if($checkin1 != '') {
            $checkin1 = strtotime($checkin1);
            $checkin1 = date('m/d/Y', $checkin1);
        }
        session(['checkin1' => $checkin1]);

        $checkout1 = $request->input('checkout');
        if($checkout1 != '') {
            $checkout1 = strtotime($checkout1);
            $checkout1 = date('m/d/Y', $checkout1);
        }
        session(['checkout1' => $checkout1]);

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

    public function addNewRoom(Request $request) {
        $hotel_id = $request->input('hotel_id');
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

        Room::addNewRoom($hotel_id, $quality, $capacity, $type_of_bed, $amount, $price_per_night, $internet, $air, $hairdryer, $tv, $fridge, $microwave, $roomservice, $cancellation, $breakfast);
    }

    public function saveImageRoom(Request $request) {
        $hotel_id = $request->hotelid;
        $hotel = Hotel::find($hotel_id);
        $link = 'images/' . $hotel->img_folder . '/room';
        if (!is_dir($link))
        {
            mkdir($link);
        }
        $images = $request->images;
        foreach ($images as $image) {
            $name = $image->getClientOriginalName();
            $folder = $hotel->img_folder . '/room/' . $name;
            if(file_exists($folder)) {
                unlink($folder);
            }
            $image->move($link,$name);
            $folder = $hotel->img_folder . '/room/' . $name;
            Room::updateImg($folder,$hotel_id);
        }
        $res = 1;
        return $res;
    }

    public function deleteRoom(Request $request) {
        $roomid = $request->input('roomid');
        Room::deleteRoom($roomid);
    }
}
