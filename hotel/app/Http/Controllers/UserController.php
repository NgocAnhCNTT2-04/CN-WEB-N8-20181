<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function showProfile($id){
    	$profile = User::getProfile($id);
    	return view('profile',["profile" => $profile]);
    }

    public function updateProfile(Request $request){
    	$id = $request->input('id');
    	$name = $request->input('name');
    	$username = $request->input('username');
        $gender = $request->input('gender');
    	$email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        User::updateProfile($id,$name,$username,$gender,$email,$phone,$address);
        return redirect() -> back();
    }

    public function changePassword(Request $request){
        $id = $request->input('id');
        $oldpassword = $request->input('old');
        $newpassword = $request->input('new');
        User::changePassword($id,$newpassword);
        return redirect()->back();
    }

}
