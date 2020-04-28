@extends('layouts.main')

@section('content')
<div class="container">
    <div class='border p-4'>
      <h1>投稿の編集</h1>
      <form method="POST" action="{{ route('posts.update',['post' => $post]) }}">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="title">タイトル</label>
    <input type="title" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>

  <div class="form-group">
    <label for="body">本文</label>
    <textarea id="body" class="form-control" rows="5" name="body">{{ $post->body }}</textarea>
  </div>

  <a class="btn btn-default" href ="{{ route('posts.show',['post' => $post]) }}">キャンセル</a>
  <button type="submit" class="btn btn-info"> 更新する </button>
  </form>
  

  @endsection