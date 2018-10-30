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
}
