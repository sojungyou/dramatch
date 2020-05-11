@extends('layouts.main')
@section('content')

<title>検索画面</title>

<div class="main-container">
  <div class="row-top">
    <div class="col-sm">
      <form style="display: inline-block;"  action="{{ action('Guest\DramasController@index') }}" method="get">
        <input  class="form-control" type="text" size ="60" placeholder="タイトルを入力してください" name="cond_title" value="{{ $cond_title }}">
    </div>
    <div class="col-sm pt-4 ">
      <button class="btn btn-outline-danger btn-lg " type="submit">検索</button>   
    </div>
  </div>
    {{ csrf_field() }}
      </form>
</div>
<!-- ドラマ一覧   -->
<div class="album py-5 bg-light">
  <div class="container ">
    <div class="row">
      @foreach($dramas as $drama)
      <div class="col-md-4">
        <div class="img-wrap">
          <a href="/dramas/{{ $drama->id }}"> <img src="{{ $drama->image_path }}"></a>
          <div class="card-text">{{ $drama->title }} {{ $drama->subtitle }} </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <p><a class="btn btn-outline-danger btn-lg" href="{{ url('/dramas') }}" role="button">戻る</a></p>
    </p>
  </div>
</footer>
@endsection
