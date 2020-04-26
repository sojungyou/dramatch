<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dramatch|ドラマレビューサイト</title>
  

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('vendor/css/heroic-features.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="">Dramatch</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          @auth
            <a class="nav-link" href="{{ url('/dramas') }}">ホーム
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
          </li>
        </ul>
          @endif
        @endauth
      </div>
    </div>
    @endif
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">海外ドラマレビューサイト</h1>
      <p class="lead">新規登録をすると気になる海外ドラマのレビューが見れます！</p>
    </header>
</div>

    <!-- Page Features -->
    <div>
     @yield('content')
    </div>
    <!-- /.row -->
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

</body>

</html>
