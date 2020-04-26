<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drama;
use App\Post;

class DramasController extends Controller
{
    public function index()
    {
        $dramas = Drama::all();
        return view('dramas.main' , [
            'dramas' => $dramas
        ]);
    }
    public function show($id)
    {
        $drama = Drama::find($id);
        return view('dramas.show' , [
            'drama' => $drama
        ]);
    }
}
