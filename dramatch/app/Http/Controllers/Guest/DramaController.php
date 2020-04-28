<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Drama;
class DramaController extends Controller
{
    public function index()
    {
        $dramas = Drama::all();
        return view('guest.main' , [
            'dramas' => $dramas
        ]);

        
    }
    
}
