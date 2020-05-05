<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facade\Auth;
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
        return redirect()->route('member.show', ['id' => $post->drama_id]);
    }
   
}

