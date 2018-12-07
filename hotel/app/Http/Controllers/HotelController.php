<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function updateHotel(Request $request)
    {
        $hotelid = $request->input('hotelid');
        $type = $request->input('type');
        $name = $request->input('name');
        $description = $request->input('description');
        $city = $request->input('city');
        $address = $request->input('address');
        $distance = $request->input('distance');
        $wifi = $request->input('wifi');
        $park = $request->input('park');
        $elevator = $request->input('elevator');
        $restaurant = $request->input('restaurant');
        $coffee = $request->input('coffee');
        $bar = $request->input('bar');
        $pool = $request->input('pool');
        $spa = $request->input('spa');
        $gym = $request->input('gym');
        $pets = $request->input('pets');
        $lowest_price = $request->input('lowest_price');
        $stars = $request->input('stars');


        Hotel::updateHotel($hotelid, $type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars);
        return redirect() -> back();
    }
}
