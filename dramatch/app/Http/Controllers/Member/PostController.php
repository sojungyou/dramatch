<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facade\Auth;
use App\Post;
use App\Comment;
use App\Drama;
class PostController extends Controller
{
    public function index(Request $request)
    {
  
    }
    public function create(Request $request)
    {
        $id = $request->id;
        return view('member.posts.create' , ['drama_id' => $id]);
    }
   
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        $posts = new Post;
        $form = $request->all();
        $posts->fill($form);
        $posts->save();

        return redirect()->route('member.show', ['id' => $request->drama_id]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
    
        return view('member.posts.edit', [
            'post' => $post,
        ]);
    }
    
    public function update(Request $request)
    {
        
        $post = Post::find($request->id);
        $form = $request->all();
        $post->fill($form)->save();
    
        return redirect()->route('member.show', ['id' => $post->drama_id]);
    }
    public function destroy(Request $request)
    {
        
        $post = Post::findOrFail($request->id);
        $drama_id = $post->drama_id;
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });
        return redirect()->route('member.show', ['id' => $drama_id]);
        
    }
    // public function search(Request $request)
    // {
    
    //     $post = post::where('title', 'like',"%{$request->search}%");
    //     $dramas = Drama::all();
    //     return view('dramas.show' , [
    //         'drama' => $drama
    //     ]);
    
    // }
}





