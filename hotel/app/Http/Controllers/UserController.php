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

    public function checkLogin(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");

        $user = User::where([['username', $username], ['password', $password],])
                    ->first();
        if (!empty($user))
        {
            if ($user->status == 1) {
                session(['userid' => $user->id]);
                session(['username' => $user->username]);
                if($user->admin == 1) {
                    session(['admin' => $user->admin]);
                }
                return redirect()->route('home');
            }
            else {
                return view('login', ['fail' => "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với bộ phận hỗ trợ để được giải đáp"]);
            }
        }
        else
        {
            return view('login', ['fail' => "Tài khoản hoặc mật khẩu không đúng"]);
        }
    }

    public function updateStatus(Request $request)
    {
        $userid = $request->input('userid');
        $status = $request->input('status');

        User::updateStatus($userid, $status);
    }

    public function updateRole(Request $request)
    {
        $userid = $request->input('userid');
        $role = $request->input('role');

        User::updateRole($userid, $role);
    }

}
