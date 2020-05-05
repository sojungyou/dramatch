@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 
  <title>{{ $drama->title }} - ドラマレビューサイト</title>
  
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
   <link href="{{ asset('vendor/css/blog-home.css') }}" rel="stylesheet ">
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
      <a href="{{ action('Member\PostController@create', ['id' => $id]) }}" class="btn btn-primary">レビュー作成</a> 
      @if (Auth::user()->is_favorite($drama->id))

<a class="favorite" href="{{ action('FavoriteController@destroy') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>

@else
<a class="favorite" href="{{ action('FavoriteController@store') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>

@endif
  
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
    </div>
   

</div>
</div>

    <div class="col">
    
    <div class="container mt-4">
        @foreach ($drama->posts as $post )  
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                
                <div class="card-body">
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                </div>
                <div class="mb-4 text-right">
                  <a class="btn btn-primary" href="{{ action('Member\PostController@edit',['id' => $post->id]) }}">
                      編集する
                    </a>
                <form style="display: inline-block;" method="DELETE" action="{{ action('Member\PostController@destroy', ['post' => $post]) }}">
                  @method('DELETE')
                  @csrf
                    <input type= "hidden" value="{{ $post->id }}" name="id">
                    <button class="btn btn-danger" type="submit">削除する</button>
                </form>
                <div class="card-footer">
                      <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                      </span>
                      
                </div>
                </div>
            <section>
              <h2 class="h5 mb-4"> コメント</h2>
                  @foreach($post->comments as $comment)
                  <div class="border-top p-4">
                    <p class="mt-2">
                      {{ $comment->body }} 
                    </p>
                  </div>
                  @endforeach 
                
            </section>
                    
            
                <div class="form-group">
                  <form method="GET" action="{{ action('Member\CommentsController@store') }}">
                    {{ csrf_field() }}
                      <input name="post_id" type="hidden" value="{{ $post -> id }}">
                        <textarea id="body" class="form-control" rows="1" name="body"> </textarea>
                            <button type="submit" class="btn btn-primary">コメントをする</button>
                  </form>
                      <!-- <a href="/dramas/{{ $drama->id }}" class="btn btn-primary">
                            戻る</a> -->
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