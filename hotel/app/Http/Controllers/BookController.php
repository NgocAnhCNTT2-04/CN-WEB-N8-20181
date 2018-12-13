<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Room;
use App\Hotel;
use App\User;

class BookController extends Controller
{
    //
    public function showBookingPage($id)
    {
        $room = Room::find($id);
        $hotel = Hotel::find($room->hotel_id);
        $user = User::find(session('userid'));
        $checkin = session('checkin');
        $checkout = session('checkout');
        
        $days = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
        $book_id = count(Book::all()) + 1;

        return view('book', ['room' => $room, 'hotel' => $hotel, 'user' => $user, 'days' => $days, 'book_id' => $book_id]);
    }
}
