<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class User extends Model
{
    //
    protected $table = "user";
    public $timestamps = false;
    protected $fillable = array('name','username','sex','email','phone','address','password','status','admin');

    public function book(){
        return $this->hasMany('App\Book','user_id','id');
    }

    public function favorite_hotel(){
        return $this->hasMany('App\FavoriteHotel','user_id','id');
    }

    public static function getProfile($id) {
    	$user = User::find($id);
        $books = Book::where('user_id','=',$id)->get();
        $booked = array();
        foreach ($books as $book) {
            # code...
            $temp = Room::join('hotels','room.hotel_id','=','hotels.id')->where('room.id','=',$book->room_id)->first();
            $booked[] = $temp;
        }
        $favorite = FavoriteHotel::where('user_id','=',$id)->get();
        $hotels = array();
        foreach ($favorite as $fav) {
            # code...
            $hotels[] = Hotel::find($fav->hotel_id);
        }
    	return ['user' => $user,'booked' => $booked,'favorites' => $hotels];
    }

    public static function updateProfile($id,$name,$username,$sex,$email,$phone,$address){
    	$user = User::find($id);
    	$user->update(['name'=>$name,'username'=>$username,'sex'=>$sex,'email'=>$email,'phone'=>$phone,'address'=>$address]);
    }

    public static function changePassword($id,$newPassword){
        $user = User::find($id);
        $user->update(['password'=>$newPassword]);
    }

    public static function updateStatus($userid, $status)
    {
        $user = User::find($userid);

        $user->update(['status'=>$status]);
    }

    public static function updateRole($userid, $role)
    {
        $user = User::find($userid);
        
        $user->update(['admin'=>$role]);
    }
}
