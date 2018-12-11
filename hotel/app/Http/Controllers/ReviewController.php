<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\Review;
use App\Book;

class ReviewController extends Controller
{
    //
    public function addReview(Request $request)
    {
        $userid = session('userid');
        $hotelid = $request->input('hotelid');

        // chỉ cho phép người dùng thêm review khi người đó đã từng đặt phòng khách sạn
        $booking = Book::getBook($userid, $hotelid);
        if (empty($booking))
        {
            $result = 0;
            return $result;
        }

        $review = $request->input('review');
        $date = date('Y-m-d');
        $location = $request->input('location');
        $room = $request->input('room');
        $service = $request->input('service');
        $cleaness = $request->input('cleaness');
        $value = $request->input('value');
        $comfort = $request->input('comfort');
        $equipment = $request->input('equipment');
        $hotel = $request->input('hotel');
        $meal = $request->input('meal');
        $avg_rating = number_format(($location + $room + $service + $cleaness + $value +$comfort + $equipment + $hotel + $meal) / 9, 1);

        Review::addReview($userid, $hotelid, $review, $date, $location, $room, $service, $cleaness, $value, $comfort, $equipment, $hotel, $meal, $avg_rating);

        Hotel::updateReview($hotelid,$avg_rating);

        $result = 1;
        return $result;
    }
}
