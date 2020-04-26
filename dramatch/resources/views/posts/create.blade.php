@extends('posts.layout')

@section('content')
  <div class="container mt-5">
    <div class="border p-4">
      <h1 class="h5 mb-4">レビュー</h1>
      <form method="POST" action="{{ route('posts.store') }}">
  {{ csrf_field() }}

  
  <div class="form-group mb-4">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group mb-4">
    <label for="title">dramaid</label></label>
    <input type="text" class="form-control" id="drama_id" name="drama_id">
  </div>
  <div class="form-group">
    <label for="body">本文</label>
    <textarea id="body" class="form-control" rows="5"name="body">       </textarea>
  </div>
  
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">ネタバレ</label>
  </div>
  
  <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
<!--   
  <input type ="hidden" name="drama_id" value=" ">  -->
  <button type="submit" class="btn btn-primary">投稿</button>
</form>
</div>
@endsection
