<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $table = "hotels";
    public $timestamps = false;
    protected $fillable = array('name','description','city','address','distance_to_centre','wifi','park','elevator','restaurant','coffee','bar','swimming_pool','spa','gym','pets','lowest_price','type','stars');

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
        $ds_hotel = Hotel::where('city', 'like', $city)
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
        $ds_hotel = Hotel::where('city', 'like', $city)
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
}
