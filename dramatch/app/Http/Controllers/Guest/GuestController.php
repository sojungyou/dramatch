<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facade\Auth;

class GuestController extends Controller
{
    public function intro()
    {
        return view('guest.intro');
    } 
    
}

