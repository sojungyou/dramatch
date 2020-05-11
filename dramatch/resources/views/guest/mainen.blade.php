<!-- メイン画面英語版 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
</head>


<header>
  <title>Dramatch|Drama review site</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/dramas') }}">Dramatch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <!-- ログインしている時 -->
            @auth
            <li>
              <a class="nav-link" href="{{ url('member/dramas') }}">Home
              <span class="sr-only">(current)</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ action('Member\DramasController@index') }}">Search</a>
            </li>  
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
              </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> logout </a>
                  <form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
                </div>
              </li>
            <li class="nav-item">
            <!-- ログインしていない時 -->
            @else
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">Register</a>     
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dramas/') }}"><img src="https://i.gyazo.com/c6d11b806690fdb0ca4c1ae49f3eb878.png" width="30"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dramas/kr') }}"><img src="https://i.gyazo.com/2323b0bcc975960e2f25fc488aa3b638.png" width="35"></a>    
            </li>
          </li>
        </ul>
          @endif
        @endauth
      </div>
    </div>
    @endif
  </nav>
</header>

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="d-block w-100" src="https://i.gyazo.com/d541f82ec972feb8f504c0c952cc2efc.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>WELCOME TO DRAMATCH!</h1>
              <p>Dramatch provides information about a variety of dramas, allows users to view our member's reviews and, if you become a member yourself, will allow you to post your own review on our site!</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="https://i.gyazo.com/fd3c977c8f17c73e0ba6e68669165fec.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Let's search for a drama!</h1>
              <p>You can search from new releases to classic masterpieces to find the drama that is right for you！Would you like to take a look？</p>
              <p><a class="btn btn-lg btn-primary" href="{{ action('Guest\DramasController@index') }}" role="button">Search Drama</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="https://i.gyazo.com/0e20213ce515616a5d500473650e2335.jpg" alt="Third slide">
      <div class="container">
          <div class="carousel-caption text-right">
            <h1>Become a member! Unlock more functions for Dramatch!</h1>
              <p>Please feel free to become a member. You will be able to view all reviews for every drama, post your own reviews, like other member's posts as well as comment!</p>
              <p><a class="btn btn-lg btn-primary" href="{{ url('/register') }}" role="button">Register</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- ドラマ一覧 -->
  <div class="album py-5 bg-light">
    <div class="container ">
      <div class="row">
        @foreach($dramas as $drama)
        <div class="col-md-4">
          <div class="img-wrap">
            <a href="/dramas/{{ $drama->id }}">
            <img src="{{ $drama->image_path }}">
            </a>
          <div class="card-text">{{ $drama->subtitle }} </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</main>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

