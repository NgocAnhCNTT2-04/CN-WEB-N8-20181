<?php

namespace App;
use DB;
use App\Book;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = "room";
    public $timestamps = false;
    protected $fillable = array('quality','capacity','type_of_bed','amount','price_per_night','internet','air','hairdryer','tv','fridge','microwave','roomservice','cancellation','breakfast','img');

    public function book()
    {
        return $this->hasMany('App\Book', 'room_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }

    public static function getRoomByHotelId($hotel_id)
    {
        $ds_room = Room::where('hotel_id', '=', $hotel_id)
                        ->get();
        return $ds_room;
    }

    public static function getRoomAndHotel(){
        $ds_room = DB::select('select room.*,hotels.name as name from room,hotels where room.hotel_id = hotels.id order by room.hotel_id asc');
        return $ds_room;
    }

    public static function updateInfoRoom($roomid, $quality, $capacity, $type_of_bed, $amount, $price_per_night, $internet, $air, $hairdryer, $tv, $fridge, $microwave, $roomservice, $cancellation, $breakfast) {
        $room = Room::find($roomid);
        $room->update(['quality'=>$quality,'capacity'=>$capacity,'type_of_bed'=>$type_of_bed,'amount'=>$amount,'price_per_night'=>$price_per_night,'internet'=>$internet,'air'=>$air,'hairdryer'=>$hairdryer,'tv'=>$tv,'fridge'=>$fridge,'microwave'=>$microwave,'roomservice'=>$roomservice,'cancellation'=>$cancellation,'breakfast'=>$breakfast]);
    }

    public static function addNewRoom($hotel_id, $quality, $capacity, $type_of_bed, $amount, $price_per_night, $internet, $air, $hairdryer, $tv, $fridge, $microwave, $roomservice, $cancellation, $breakfast){
        $room = new Room();
        $room->hotel_id = $hotel_id;
        $room->quality = $quality;
        $room->capacity = $capacity;
        $room->type_of_bed = $type_of_bed;
        $room->amount = $amount;
        $room->internet = $internet;
        $room->air = $air;
        $room->hairdryer = $hairdryer;
        $room->tv = $tv;
        $room->fridge = $fridge;
        $room->microwave = $microwave;
        $room->roomservice = $roomservice;
        $room->cancellation = $cancellation;
        $room->breakfast = $breakfast;
        $room->price_per_night = $price_per_night;
        $room->img = '';
        $room->save();
    }

    public static function updateImg($folder,$hotel_id) {
        $rooms = Room::all();
        foreach ($rooms as $room) {
            # code...
            if($room->img != '') {
                continue;
            }
            $room->update(['img'=>$folder]);
        }
    }

    public static function deleteRoom($roomid)
    {
        $deleted = DB::delete('delete from book where room_id = '.$roomid);
        $deleted = DB::delete('delete from room where id = '.$roomid);
       
    }
}
