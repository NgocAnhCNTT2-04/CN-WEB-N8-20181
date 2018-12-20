<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Room;
use DB;

class Book extends Model
{
    //
    protected $table = "book";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo('App\Hotel', 'room_id', 'id');
    }

    public static function getRoomLeft($ds_room)
    {
        $room_left = array();
        foreach ($ds_room as $room)
        {
            $booked_room = array();
            if (session('checkin') && session('checkout')) {
                $booked_room = Book::where([["room_id", "=", $room->id], ["check_in", ">=", session('checkin')], ["check_in", "<=", session("checkout")],])
                    ->orWhere([["room_id", "=", $room->id], ["check_out", ">=", session('checkin')], ["check_out", "<=", session("checkout")],])
                    ->orWhere([["room_id", "=", $room->id], ["check_in", "<=", session('checkin')], ["check_out", ">=", session("checkout")],])
                    ->get();
            }
            $room_left[] = [$room, $room->amount - count($booked_room)];
        }
        return $room_left;
    }

    public static function getBook($userid, $hotelid)
    {
        $book = Book::join("room", "book.room_id", "room.id")
                    ->where([["user_id", "=", $userid], ["hotel_id", "like", $hotelid],])
                    ->first();
        return $book;
    }

    public static function bookRoom($user_id,$room_id,$check_in,$check_out) {
        $book = new Book();
        $book->user_id = $user_id;
        $book->room_id = $room_id;
        $book->check_in = $check_in;
        $book->check_out = $check_out;
        $book -> save();
    }

    public static function cancelBook($id) {
        //$deleted = DB::delete('delete from book where id = '.$id);
        $delete = Book::where([['id','=',$id]])->delete();
    }
}
