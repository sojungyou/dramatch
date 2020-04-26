<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Drama;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $dramas = Drama::all();
        return view('posts.index' , [
            'posts' => $posts, 
            'dramas' => $dramas
        ]);
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
       
        return redirect('dramas/'); 
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
    
        return redirect()->route('posts.show', ['post' => $post]);
    }
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
    
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });
    
        return redirect('posts');
        ;
    }

}





