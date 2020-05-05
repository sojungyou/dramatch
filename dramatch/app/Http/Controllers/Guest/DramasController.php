<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Drama;
use App\Post;


class DramasController extends Controller
{
    public function add()
    {
        $dramas = Drama::all();
        return view('guest.main' , [
            'dramas' => $dramas
        ]);
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != ' '){
            $dramas = Drama::where('title', 'like', '%'.$cond_title.'%')->get();
        }
        else {
            $dramas = Drama::all()->sortByDesc('updated_at');
        }
        return view('guest.index', ['dramas' => $dramas,'cond_title' => $cond_title]);
    }
    public function show($id)
    {
        $drama = Drama::find($id);
        return view('guest.show' , [
            'drama' => $drama , 'id' => $id
        ]);
    }
    
}

