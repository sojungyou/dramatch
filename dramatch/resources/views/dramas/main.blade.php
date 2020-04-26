@extends('dramas.layout')
@section('content')
<div class="row text-center">
@foreach($dramas as $drama)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ $drama->image_path }}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{ $drama->title }}</h4>
            <p class="card-text">{{ $drama->story }}</p>
          </div>
          <div class="card-footer">
            <a href="/dramas/{{ $drama->id }}" class="btn btn-primary">もっと見る</a>
          </div>
        </div>
      </div>
      @endforeach     
  </div>

@endsection