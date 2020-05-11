
@extends('layouts.main')
@section('content')

<title>Dramatch|ドラマレビューサイト</title>
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
            <h1>ようこそ！DRAMATCHへ！</h1>
              <p>ドラマッチは気になるドラマの作品情報をみたり、レビューがみれるサイトです！会員になると直接レビューを投稿することもできます！</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="https://i.gyazo.com/fd3c977c8f17c73e0ba6e68669165fec.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>作品を検索してみよう！</h1>
            <p>DRAMATCHでは今話題の作品から長く愛されている名作まで様々なドラマの情報を見ることができます！今気になる作品を検索してみませんか？</p>
            <p><a class="btn btn-lg btn-danger" href="{{ action('Guest\DramasController@index') }}" role="button">作品を探す</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="https://i.gyazo.com/0e20213ce515616a5d500473650e2335.jpg" alt="Third slide">
      <div class="container">
          <div class="carousel-caption text-right">
              <h1>会員になるとさらに色んなことができる！</h1>
                <p>会員登録をするとレビューの閲覧、レビュー投稿さらにコメントを残すことができます！ Dramatchのメンバーになってみませんか？</p>
                <p><a class="btn btn-lg btn-danger" href="{{ url('/register') }}" role="button">会員登録する</a></p>
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
            <div class="card-text">{{ $drama->title }} {{ $drama->subtitle }} </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</main>



