@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 
  <title>{{$drama->title}} - ドラマレビューサイト</title>
  
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
   <link href="{{ asset('vendor/css/blog-home.css') }}" rel="stylesheet ">
</head>


  <!-- Page Content -->
  <div class="container ml-1">

    <div class="row">
      <div class="col-md-8 mt-5">
        <h1 class="my-4">
          <small></small>
        </h1>
      <div class="mb-4">

      <!-- Blog Entries Column -->
      
      <a href="{{ action('Member\PostController@create', ['id' => $id]) }}" class="btn btn-primary">レビュー作成</a> 
      

     
        </div>
        <!-- Blog Post -->
        <div class="card mb-8">
          <div class="card-body">
            <h2 class="card-title">{{ $drama->title }}</h2>
            <img class="card-img-top" src="{{ $drama->image_path }}" alt="">
            <p class="card-text">{{ $drama->story }}</p>
            

              @if (Auth::user()->is_favorite($drama->id))

              <a class="favorite" href="{{ action('FavoriteController@destroy') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>

              @else
              <a class="favorite" href="{{ action('FavoriteController@store') }}?id={{ $drama->id }}"><i class="fas fa-thumbs-up"></i> {{ $drama->favorite_users->count() }}</a>

              @endif


          </div>
        </div>

        <!-- Blog Post -->
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
        





        <!-- Pagination -->

      </div>
      
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</>

</html>

@endsection