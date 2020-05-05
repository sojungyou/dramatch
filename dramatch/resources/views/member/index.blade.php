@extends('layouts.main')



@section('content')
<div class="main-container">
  <div class="row-top">
    <h2>ドラマを検索してください</h2>
  </div>

    <div class="col">
      <form action="{{ action('Member\DramasController@index') }}" method="get">
        <input class="form-control" type="text" placeholder="タイトル検索" name="cond_title" value="{{ $cond_title }}">
  </div>
    <div class="col-auto">
      <button class="btn btn-lg btn-success" type="submit">Search</button>
    </div>
    {{ csrf_field() }}
      </form>
</div>
  
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach($dramas as $drama)
          <div class="col-md-4">
          <div class="card mb-4 col shadow-sm">
          <a href="/dramas/{{ $drama->id }}">
            <img class="card-img-top" src="{{ $drama->image_path }}" alt="">
          </a>
          <div class="card-body">
              <p class="card-text">{{ $drama->title }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>

@endsection