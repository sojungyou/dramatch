guest用紹介画面

@extends('layouts.main')
@section('content')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">


  <div class="p-content-detail_head">
    <div class="p-content-detail_inner">
    <div class="p-content-detail_body">
      <div class="p-content-detail_left">
      <img class="c-content_jacket" src="{{ $drama->image_path }}" alt="">
      </div>
    </div>
    
    <div class="p-content-detail_main">
      <div class="p-content-detail_title">
        <h2>{{ $drama->title }}</h2>
          <p class="p-content-detail_original">{{ $drama->subtitle }}</p>
      </div>
      <div class="p-content-detail_other-info">
        <h3 class="p-content-detail_other-info-title">公開日:{{ $drama->releaseDate }}</h3>
        <h3 class="p-content-detail_other-info-title">制作国:{{ $drama->country }}</h3>
      </div>
      <div class="p-content-detail_genre">
        <h3 class="p-content-detail_genre-title">ジャンル:{{ $drama->genre }}</h3>
      </div>
      <div class="p-content-detail_synopsis">
        <h3 class="p-content-detail_synopsis-term">あらすじ</h3>
        <p class="p-content-detail_synopsis-desc">{{ $drama->story }}</p>
      </div>
      <div class="p-content-detail_people-cast">
      <h3 class="p-content-detail_people-list-term">出演者 {{ $drama->cast }}</h3>
      </div>
    </div>
  
</div>
</div>

</div>


レビュー作成ボタン会委員登録画面につながる



@endsection

<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/XffH4JQEbVo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->