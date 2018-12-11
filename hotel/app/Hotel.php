<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FavoriteHotel;
use App\Review;
use App\Room;
use App\Book;
use DB;

class Hotel extends Model
{
    //
    protected $table = "hotels";
    public $timestamps = false;
    protected $fillable = array('name','description','city','address','distance_to_centre','wifi','park','elevator','restaurant','coffee','bar','swimming_pool','spa','gym','pets','lowest_price','type','stars');

    public function review()
    {
        return $this->hasMany('App\Review', 'hotel_id', 'id');
    }

    public function room()
    {
        return $this->hasMany('App\Room', 'hotel_id', 'id');
    }

    public function favorite_hotel()
    {
        return $this->hasMany('App\FavoriteHotel', 'hotel_id', 'id');
    }

    public static function updateHotel($hotelid, $type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars)
    {
        $hotel = Hotel::find($hotelid);

        $hotel->update(['name'=>$name,'description'=>$description,'city'=>$city,'address'=>$address,'distance_to_centre'=>$distance,'wifi'=>$wifi,'park'=>$park,'elevator'=>$elevator,'restaurant'=>$restaurant,'coffee'=>$coffee,'bar'=>$bar,'swimming_pool'=>$pool,'spa'=>$spa,'gym'=>$gym,'pets'=>$pets,'lowest_price'=>$lowest_price,'type'=>$type,'stars'=>$stars]);
    }

    public static function getHotelByCity($city)
    {
        $ds_hotel = Hotel::where("city", "like", "%$city%")
                        ->orderBy("number_of_rate", "desc")
                        ->get();
        return $ds_hotel;
    }

    public static function filterHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references)
    {
        $ds_hotel = Hotel::where('city', 'like', "%$city%")
                        ->where('type', '=', $type)
                        ->whereIn('stars', $stars)
                        ->whereBetween('lowest_price', [$min_price, $max_price])
                        ->whereBetween('distance_to_centre', [$min_distance, $max_distance])
                        ->whereIn('wifi', [$references[0], 1])
                        ->whereIn('park', [$references[1], 1])
                        ->whereIn('elevator', [$references[2], 1])
                        ->whereIn('spa', [$references[3], 1])
                        ->whereIn('swimming_pool', [$references[4], 1])
                        ->whereIn('gym', [$references[5], 1])
                        ->whereIn('restaurant', [$references[6], 1])
                        ->whereIn('coffee', [$references[7], 1])
                        ->whereIn('bar', [$references[8], 1])
                        ->whereIn('pets', [$references[9], 1])
                        ->get();
        return $ds_hotel;
    }

    public static function sortHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references, $prop, $option)
    {
        $ds_hotel = Hotel::where('city', 'like', "%$city%")
            ->where('type', '=', $type)
            ->whereIn('stars', $stars)
            ->whereBetween('lowest_price', [$min_price, $max_price])
            ->whereBetween('distance_to_centre', [$min_distance, $max_distance])
            ->whereIn('wifi', [$references[0], 1])
            ->whereIn('park', [$references[1], 1])
            ->whereIn('elevator', [$references[2], 1])
            ->whereIn('spa', [$references[3], 1])
            ->whereIn('swimming_pool', [$references[4], 1])
            ->whereIn('gym', [$references[5], 1])
            ->whereIn('restaurant', [$references[6], 1])
            ->whereIn('coffee', [$references[7], 1])
            ->whereIn('bar', [$references[8], 1])
            ->whereIn('pets', [$references[9], 1])
            ->orderBy($prop, $option)
            ->get();
        return $ds_hotel;
    }

    public static function addHotel($type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars, $imgfolder)
    {
        $hotel = new Hotel();

        $hotel->type = $type;
        $hotel->name = $name;
        $hotel->description = $description;
        $hotel->city = $city;
        $hotel->address = $address;
        $hotel->distance_to_centre = $distance;
        $hotel->wifi = $wifi;
        $hotel->park = $park;
        $hotel->elevator = $elevator;
        $hotel->restaurant = $restaurant;
        $hotel->coffee = $coffee;
        $hotel->bar = $bar;
        $hotel->swimming_pool = $pool;
        $hotel->spa = $spa;
        $hotel->gym = $gym;
        $hotel->pets = $pets;
        $hotel->lowest_price = $lowest_price;
        $hotel->stars = $stars;
        $hotel->img_folder = $imgfolder;
        $hotel->rate = 0;
        $hotel->number_of_rate = 0;

        $hotel->save();
    }

    public static function deleteHotel($hotelid)
    {
        $deleted = DB::delete('delete from favorite_hotel where hotel_id = '.$hotelid);
        $deleted = DB::delete('delete from review where hotel_id = '.$hotelid);
        $rooms = DB::select('select * from room where hotel_id = ?', [$hotelid]);
        foreach ($rooms as $room) {
            # code...
            $deleted = DB::delete('delete from book where room_id = '.$room->id);
        }
        $deleted = DB::delete('delete from room where hotel_id = '.$hotelid);
        $deleted = DB::delete('delete from hotels where id = '.$hotelid);
       
    }
}
