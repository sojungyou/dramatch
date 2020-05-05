@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    ログインに成功しました！
                </div>
                <a class="card-header" href="{{ url('member/dramas') }}">ホーム画面に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
