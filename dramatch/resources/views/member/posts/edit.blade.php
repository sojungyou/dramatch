@extends('layouts.main')

@section('content')
<title>編集画面</title>
<div class="container col-5">
    <div class='border p-4'>
      <h1>投稿の編集</h1>
      <form method="POST" action="{{ action('Member\PostController@update',['post' => $post]) }}">
  
  {{ csrf_field() }}
  
  <div class="form-group">
    <label for="title">タイトル</label>
    <input type="title" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>

  <div class="form-group">
    <label for="body">本文</label>
    <textarea id="body" class="form-control" rows="5" name="body">{{ $post->body }}</textarea>
  </div>
  <input type= "hidden" value="{{ $post->id }}" name="id">
  
  <div class="edit-button">

    <button type="submit" class="btn btn-danger m-0 " > 更新する </button>
  </div>
  </form>
  
</div>
</div>

  @endsection