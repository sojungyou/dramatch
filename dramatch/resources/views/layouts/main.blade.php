<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href="{{ asset('css/album.css') }}" rel="stylesheet">
<link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

</head>


<header>
<title>Dramatch|ドラマレビューサイト</title>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ action('Guest\DramaController@index') }}">Dramatch</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          @auth
            <a class="nav-link" href="{{ url('/drama') }}">ホーム
              <span class="sr-only">(current)</span>
            </a>
          <li class="nav-item">
          @else
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
          </li>
          <li class="nav-item">
          @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">新規登録</a>     
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ action('Guest\GuestController@intro') }}">Dramatchの楽しみ方</a>     
          </li>
          </li>
        </ul>
          @endif
        @endauth
      </div>
    </div>
    @endif
  </nav>
  
  
  <!-- 検索機能 -->
  <div class="col">
  <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="ドラマ検索" name="search">
</div>
<!--end of col-->
<div class="col-auto">
  <button class="btn btn-lg btn-success" type="submit">Search</button>
</div>
</header>
        


<div>
    @yield('content')
    </div>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    
  </div>
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>