<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\support\Facade\Auth;
use App\Http\Controllers\Controller;
use App\Drama;
use App\Post;

class DramasController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != ' '){
            $dramas = Drama::where('title', 'like', '%'.$cond_title.'%')->get();
        }
        else {
            $dramas = Drama::all()->sortByDesc('updated_at');
        }
        return view('member.index', ['dramas' => $dramas,'cond_title' => $cond_title]);
    }
    public function show($id)
    {
        $drama = Drama::find($id);
        return view('member.show' , [
            'drama' => $drama , 'id' => $id
        ]);
    }
    public function add()
    {
        $dramas = Drama::all();
        return view('member.main' , [
            'dramas' => $dramas
        ]);
    }
 
}
