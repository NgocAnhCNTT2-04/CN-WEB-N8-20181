<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = "user";
    public $timestamps = false;
    protected $fillable = array('name','username','sex','email','phone','address','password');

    public static function getProfile($id) {
    	$user = User::find($id);
    	return $user;
    }

    public static function updateProfile($id,$name,$username,$sex,$email,$phone,$address){
    	$user = User::find($id);
    	$user->update(['name'=>$name,'username'=>$username,'sex'=>$sex,'email'=>$email,'phone'=>$phone,'address'=>$address]);
    }

    public static function changePassword($id,$newPassword){
        $user = User::find($id);
        $user->update(['password'=>$newPassword]);
    }
}
