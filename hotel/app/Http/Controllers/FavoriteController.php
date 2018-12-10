<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteHotel;

class FavoriteController extends Controller
{
    //

    public function deleteHotel(Request $request){
    	$id = 2;
    	$hotel_id = $request->input('hotel_id');
    	FavoriteHotel::deleteHotel($id,$hotel_id);
    	return redirect()->back();
    }

    public function addHotel(Request $request)
    {
        $userid = session('userid');
        $hotelid = $request->input('hotelid');

        $fav = FavoriteHotel::where([['user_id', '=', $userid], ['hotel_id', '=', $hotelid],])
                            ->first();
        if ($fav)
        {
            FavoriteHotel::deleteHotel($userid, $hotelid);
            return 0;
        }
        else
        {
            FavoriteHotel::addHotel($userid, $hotelid);
            return 1;
        }
    }
}
