<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//メンバーになったらできる機能
Route::group(['prefix' => 'member','middleware'=>'auth'],function(){ 
  
  // ドラマ検索
  route::get('dramas/index', 'Member\DramasController@index');
  // レビュー投稿
  route::get('dramas/create', 'Member\PostController@create');
  // レビュー保存
  route::get('dramas/store', 'Member\PostController@store');
  // レビュー削除
  route::get('dramas/destory', 'Member\PostController@destroy');
  // 各ドラマのレビュー画面メイン
  route::get('dramas/{id}', 'Member\DramasController@show')->name('member.show');
  // メイン画面
  route::get('dramas', 'Member\DramasController@add');
  // レビュー編集
  route::get('posts/{id}/edit', 'Member\PostController@edit');
  route::post('posts/update', 'Member\PostController@update');
  // コメント機能
  route::get('comments/store', 'Member\CommentsController@store');
  //いいね機能
  Route::get('favorite','FavoriteController@store')->name('favorites.favorite');
  Route::get('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
});


  //ゲストができる機能

  // メイン画面
  route::get('dramas', 'Guest\DramasController@add');
  // メイン画面英韓
  route::get('dramas/en', 'Guest\DramasController@adden');
  route::get('dramas/kr', 'Guest\DramasController@addkr');


  // 検索機能
  route::get('dramas/index', 'Guest\DramasController@index');
  // 各ドラマのレビュー詳細
  route::get('dramas/{id}', 'Guest\DramasController@show');
  
  
  Auth::routes();
  
  Route::get('/', 'Guest\DramasController@add');

  Route::get('/home', 'HomeController@index')->name('home');
  
  
  
  
