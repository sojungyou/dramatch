<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function intro()
    {
        return view('guest.intro');
    } 
    public function register()
    {
        return view('guest.login');
    }
    public function login()
    {
        return view('guest.register');
    }
}
