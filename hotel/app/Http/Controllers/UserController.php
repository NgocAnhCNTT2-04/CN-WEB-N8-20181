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
    	$id = $request->id;
    	$name = $request->name;
    	$username = $request->username;
        $gender = $request->gender;
    	$email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        User::updateProfile($id,$name,$username,$gender,$email,$phone,$address);
        return redirect() -> back();
    }

    public function changePassword(Request $request){
        $this->validate($request,
            [
                'oldpassword'=>'required',
                'newpassword'=>'required',
                'newpassword2'=>'required|same:newpassword'
            ],
            [
                'oldpassword.required'=>'Vui lòng nhập mật khẩu',
                'newpassword.required'=>'Vui lòng nhập mật khẩu mới',
                'newpassword2.required'=>'Vui lòng nhập lại mật khẩu mới',
                'newpassword2.same'=>'Mật khẩu nhập lại không chính xác'
            ]);
        $id = $request->id;
        $username = $request->username;
        $password = $request->password;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        if($oldpassword === $password) {
            User::changePassword($id,$newpassword);
            return redirect()->back();
        }
    }

}
