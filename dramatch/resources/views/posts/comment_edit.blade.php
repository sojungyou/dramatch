@extends('posts.layout')

@section('content')
<div class="container">
    <div class='border p-4'>
      <h1>コメントの編集</h1>
      <form method="POST" action="{{ route('comments.update',['comment' => $comment]) }}">
  {{ csrf_field() }}
  @method('PUT')
  

  <div class="form-group">
    <label for="body">本文</label>
    <textarea id="body" class="form-control" rows="5" name="body">{{ $comment->body }}</textarea>
  </div>

  <button type="submit" class="btn btn-info"> 更新する </button>
  </form>
  

  @endsection