<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//*** ログアウト中のページ ***//

//ログインページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
//ログイン機能
Route::post('/login', 'Auth\LoginController@login');

//ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');

//新規登録ページ
Route::get('/register', 'Auth\RegisterController@register');
//新規登録機能
Route::post('/register', 'Auth\RegisterController@register');

//登録完了ページ
Route::get('/added', 'Auth\RegisterController@added');


//*** ログイン中のページ ***//

//トップページ
Route::get('/top','PostsController@index');

//投稿機能
Route::post('/post', 'PostsController@post');

//投稿編集機能
Route::post('/edit', 'PostsController@edit');

//投稿削除機能
Route::delete('/delete', 'PostsController@delete');

//プロフィール編集ページ
Route::get('/edit-profile','UsersController@profile');
//プロフィール編集機能
Route::post('/edit-profile','UsersController@profile');

//フォロー・フォロワーのページ
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

//ユーザー検索ページ
Route::get('/search','UsersController@search');
//ユーザー検索機能
Route::post('/search', 'UsersController@search');

//他の人のプロフィールページ
Route::get('/show/{id}','PostsController@show');

//フォローする・はずす機能
Route::delete('/un-follow', 'FollowsController@unFollow');
Route::post('/follow', 'FollowsController@follow');
