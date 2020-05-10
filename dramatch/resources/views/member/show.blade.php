@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $drama->title }}</title>
  
  <!-- Bootstrap core CSS -->
  <!-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
  <!-- Custom styles for this template -->
  <!-- <link href="{{ asset('vendor/css/blog-home.css') }}" rel="stylesheet "> -->
  <link href="{{ asset('css/content.css') }}" rel="stylesheet">
</head>
<div class="container">
  <div class="row">
    <div class="col">
    <div class="p-content-detail_head">
    <div class="p-content-detail_inner">
    <div class="p-content-detail_body">
      <div class="p-content-detail_left">
      <img class="c-content_jacket" src="{{ $drama->image_path }}" alt="">
      <a href="{{ action('Member\PostController@create', ['id' => $id]) }}" class="btn btn-outline-danger btn-lg mt-5">レビュー作成</a> 
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

        @if (Auth::user()->is_favorite($drama->id))
          <a class="favorite" href="{{ action('FavoriteController@destroy') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>
          <p class="p-content-detail_original">いいね獲得！</p>
        @else
          <a class="favorite" href="{{ action('FavoriteController@store') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>

        @endif
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
    </div>
    
   

</div>
</div>

    <div class="col-6 mx-auto">
      <div class="container mt-4">
        <div class="header_title">
          <p>「{{ $drama->title }}」に投稿された感想・評価</p>
        </div>
        @foreach ($drama->posts as $post )  
            <div class="card mb-4">
              
              <div class="card-header">
                <div class="text-left">
                  <p>{{ $post->title }} </p>
                </div>
                      <div class="spoiler">
    
                        @if ($post->spoilers == 1)
                          <p>ネタバレ!</p>
                        @endif
                      </div>
                
                <div class="text-right">
                  <div class="text-date"> 
                    <p>{{ $post->user->name }}の感想 
                    {{ $post->created_at->format('Y.m.d') }}</p>
                  </div>
                  <a class="btn btn-outline-danger m-0" href="{{ action('Member\PostController@edit',['id' => $post->id]) }}" role="button">編集</a>
                  
                  <form style="display: inline-block;" method="DELETE" action="{{ action('Member\PostController@destroy', ['post' => $post]) }}">
                    @method('DELETE')
                    @csrf
                    <input type= "hidden" value="{{ $post->id }}" name="id">
                    <button class="btn btn-outline-danger m-0" >削除</button>
                </div>
              </div>
                    <div class="card-body">
                      <p class="card-text">{{ $post->body }}</p>
                    </div>
                  </form>
                  
                  <!-- 折り畳み展開ポインタ -->
              <div onclick="obj=document.getElementById('open_{{ $post->id }}').style; obj.display=(obj.display=='none')?'block':'none';">
              <a style="cursor:pointer;">▼ コメント</a>
                </div>
                

                
                  <div id="open_{{ $post->id }}" style="display:none;clear:both;">




                                
                    <section>
                      @foreach($post->comments as $comment)
                      <div class="border-top p-4">
                        <p class="mt-2">{{ $comment->body }} </p>
                      </div>
                      @endforeach 
                    </section>
                    <div class="form-group">
                      <form method="GET" action="{{ action('Member\CommentsController@store') }}">
                        {{ csrf_field() }}
                        <input name="post_id" type="hidden" value="{{ $post -> id }}">
                        <textarea id="body" class="form-control" rows="1" name="body"> </textarea>
                        <div class="text-right">
                          <button type="submit" class="btn btn-outline-danger m-1 btn-sm">コメントをする</button>
                        </div>
                      </form>
                    </div>                
                  </div>
                </div>
              </div>
              @endforeach  
              </div>         
      </div>
    </div>  

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



</html>

@endsection