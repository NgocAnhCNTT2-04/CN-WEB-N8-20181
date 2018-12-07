<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class AdminController extends Controller
{
    //
    public function showAdminPage()
    {
        $hotels = Hotel::all();
        return view('admin', ['hotels' => $hotels]);
    }
}
