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

    public function bookRoom(Request $request) {
        $user_id = $request->input('userid');
        $room_id = $request->input('roomid');
        $check_in = session('checkin');
        $check_out = session('checkout');

        Book::bookRoom($user_id,$room_id,$check_in,$check_out);
    }

    public function showBookedPage(Request $request) {
        $id = $request->input('id_book');
        $booked = Book::find($id);
        $room = Room::find($booked->room_id);
        $hotel = Hotel::find($room->hotel_id);
        $user = User::find(session('userid'));
        $checkin = $booked->check_in;
        $checkout = $booked->check_out;
        
        $days = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);

        return view('detailbooked', ['idbooked' => $id,'room' => $room, 'hotel' => $hotel, 'user' => $user, 'days' => $days, 'checkin' => $checkin, 'checkout' => $checkout]);
    }

    public function cancelBook(Request $request) {
        $id = $request->input('idbooked');
        Book::cancelBook($id);
    }
}
