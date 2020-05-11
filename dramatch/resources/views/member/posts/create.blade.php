@extends('layouts.main')
@section('content')

<title>投稿画面</title>
  <div class="container col-5 mt-5">
    <div class="border p-4">
      <div class="review_review">
        <h4 class="review mb-4">レビュー</h4>
      </div>
      <form method="GET" action="{{ action('Member\PostController@store') }}">
      {{ csrf_field() }}
      @if (count($errors) > 0)
        <ul>
          @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
          @endforeach
        </ul>
      @endif
      <div class="form-group mb-4">
        <label for="title">タイトル</label>
          <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group mb-4">
        <input type="hidden" class="form-control" id="drama_id" name="drama_id" value="{{ $drama_id }}">
      </div>
      <div class="form-group">
        <label for="body">本文</label>
          <textarea id="body" class="form-control" rows="5"name="body"></textarea>
      </div>
      <div class="form-group mb-4">
        <div class="checkbox">
          <p>レビューがドラマの内容のネタバレにあたる場合はチェックしてください。</p>
            <label>
              <input type="checkbox" name="spoilers" value ="1" class="checkbox-input">
                <span class="checkbox-parts">ネタバレ！</span>
            </label> </br>
            <label>
              <input type="checkbox" name="spoilers" value ="2" class="checkbox-input">
                <span class="checkbox-parts">ネタバレなし</span>
            </label>
        </div>
      </div>
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <button type="submit" class="btn_3 btn-danger">投稿する</button>
    </div>
      </form>
  </div>
@endsection
