<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;

class AdminController extends Controller
{
    //
    public function showAdminPage()
    {
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin', ['hotels' => $hotels, 'users' => $users]);
    }
}
