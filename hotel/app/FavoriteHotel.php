<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Hotel;

class FavoriteHotel extends Model
{
    //
    protected $table = "favorite_hotel";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }

    public static function deleteHotel($user_id,$hotel_id){
    	$delete = FavoriteHotel::where([['user_id','=',$user_id],['hotel_id','=',$hotel_id]])->delete();
    }

    public static function addHotel($userid, $hotelid)
    {
        $new_fav = new FavoriteHotel();
        $new_fav->user_id = $userid;
        $new_fav->hotel_id = $hotelid;
        $new_fav->save();
    }
}
