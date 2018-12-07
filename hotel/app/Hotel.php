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
}
