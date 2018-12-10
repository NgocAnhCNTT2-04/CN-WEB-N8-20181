<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = "review";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }


    public static function getReviewOfHotel($hotel_id)
    {
        $reviews = Review::join("user", "review.user_id", "user.id")
                        ->where('hotel_id', '=', $hotel_id)
                        ->get();
        return $reviews;
    }
}
