<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Drama;
class PostController extends Controller
{
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      $posts = null;
      if ($cond_title != '') {
        $posts= Drama::whereRaw('title LIKE ?', "%" . $cond_title . "%")->get();
      } else {
        $posts = Drama::all()->sortByDesc('updated_at');;
      }
  
      return view('dramas.show', ['post' => $posts, 'cond_title' => $cond_title]);
    }
    public function create()
    {
        return view('posts.create');
    }
   
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        $posts = new Post;
        $form = $request->all();
        $posts->fill($form);
        $posts->save();
       
        return redirect()->route('dramas.show', ['drama' => $request->drama_id]);
    }
    public function show($post_id)
    {
        $posts = Post::find($post_id);
        return view('posts.show' , [
            'posts' => $posts
        ]);
    }
    public function edit($post_id)
    {
        $post = Post::find($post_id);
    
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    
    public function update($post_id, Request $request)
    {
        $post = Post::find($post_id);
        $form = $request->all();
        $post->fill($form)->save();
    
        return redirect()->route('dramas.show', ['drama' => $post->drama_id]);
    }
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
    
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });
    
        return redirect()->route('dramas.show', ['drama' => $post->drama_id]);
        ;
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





