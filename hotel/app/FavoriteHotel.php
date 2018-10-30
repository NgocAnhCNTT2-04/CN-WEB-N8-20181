<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteHotel extends Model
{
    //
    protected $table = "favorite_hotel";
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function hotels(){
    	return $this->belongsTo('App\Hotel','hotel_id','id');
    }

    public static function deleteHotel($user_id,$hotel_id){
    	$delete = FavoriteHotel::where([['user_id','=',$user_id],['hotel_id','=',$hotel_id]])->delete();
    }
}
