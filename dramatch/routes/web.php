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


//ゲスト

// Dramatchの楽しみ方
route::get('drama/intro', 'Guest\GuestController@intro');
// メイン画面
route::get('drama', 'Guest\DramaController@add');
// 検索機能
route::get('drama/index', 'Guest\DramaController@index');


//いいね機能

Route::group(['middleware'=>'auth'],function(){
  
    Route::get('favorite','FavoriteController@store')->name('favorites.favorite');
    Route::get('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
});



Route::resource('dramas/posts', 'PostController');
Route::resource('comments','CommentsController', ['only' => ['store','edit','update','destory']]);
route::resource('dramas','DramasController', ['only' => ['index','show']]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




// Route::get('/posts', 'PostController@index');
// Route::get('/', function () {
//     return view('welcome');
// });