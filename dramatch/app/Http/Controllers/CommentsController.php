<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Drama;
class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $comment = new Comment;
        $form = $request->all();
        $comment->fill($form);
        $comment->save();
        $post = Post::find($request->post_id);
        return redirect()->route('dramas.show', ['drama' => $post->drama_id]);
    }
    
    
    public function edit($post_id)
    {
        $comment = Comment::find($post_id);
    
        return view('posts.comment_edit', [
            'comment' => $comment,
        ]);
    }
    public function update($post_id, Request $request)
    {
        $comment = Comment::find($post_id);
        $form = $request->all();
        $comment->fill($form)->save();
    
        return redirect()->route('posts.show', ['posts' => $post]);
    }
    
    public function destroy($post_id)
    {
        $comments = Comment::find($post_id);
        \DB::transaction(function () use ($post) {
            $comments->comments()->delete();
            $comments->delete();
        });
    
        
        return redirect('posts');
        
    }
}
