@extends('layouts.main')
@section('content')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">



<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="p-content-detail_head">
    <div class="p-content-detail_inner">
    <div class="p-content-detail_body">
      <div class="p-content-detail_left">
      <img class="c-content_jacket" src="{{ $drama->image_path }}" alt="">
  
      </div>
    </div>

    </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="p-content-detail_main">
      <div class="p-content-detail_title">
        <h2>{{ $drama->title }}</h2>
          <p class="p-content-detail_original">{{ $drama->subtitle }}</p>
      </div>
      <div class="p-content-detail_other-info">
        <h4 class="p-content-detail_other-info-title">公開日</h4>
        <p>{{ $drama->releaseDate }}</p>
        <h4 class="p-content-detail_other-info-title">制作国</h4>
        <p>{{ $drama->country }}</p>
      </div>

      <div class="p-content-detail_genre">
        <h4 class="p-content-detail_genre-title">ジャンル</h4>
        <p>{{ $drama->genre }}</p>
      </div>
      <div class="p-content-detail_synopsis">
        <h4 class="p-content-detail_synopsis-term">あらすじ</h4>
        <p class="p-content-detail_synopsis-desc">{{ $drama->story }}</p>
      </div>
      <div class="p-content-detail_people-cast">
      <h4 class="p-content-detail_people-list-term">出演者</h4> <p>{{ $drama->cast }}</p>
      </div>
      <div class="p-content-detail_drama-video">
      <h4 class="p-content-detail_drana-video-term">予告編</h4> <iframe width="560" height="315" src="{{ $drama->video_path }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <div class="justify-content-center">
    <a href="{{ url('member/dramas') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">レビューを見る</a>
    <a href="{{ url('/dramas') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">戻る</a>
      
    </div>
  </div>

  </div>
    </div>
  
  </div>


    
    


@endsection 

