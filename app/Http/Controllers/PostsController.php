<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;
use App\Post;

class PostsController extends Controller
{
    //ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    //topページの表示
    public function index(Post $post, Follow $follow){
        $follow_id = $follow->where('follower_id', Auth::id())
                        ->pluck('follow_id');
        $posts = $post->where('user_id', Auth::id())
                        ->orWhereIn('user_id', $follow_id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('posts.index', [
            'posts' => $posts,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }

    //投稿機能
    public function post(Request $request){
        $post = new Post;
        $post->posts = $request->post;
        $post->user_id = Auth::id();

        $post->save();

        return redirect('/top');
    }

    //編集機能
    public function edit(Request $request){
        $post = Post::find($request->edit);
        $post->posts = $request->editPost;

        $post->save();

        return back();
    }

    //削除機能
    public function delete(Request $request){
        $delete = Post::where('id', $request->delete);

        $delete->delete();

        return back();
        }


    //他のユーザーのプロフィールページへ
    public function show($id, Follow $follow){
        $show_user = User::find($id);
        $posts = Post::where('user_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        $follow_users = $follow->where('follower_id', Auth::id())->get();
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('posts.profile', [
            'show_user' => $show_user,
            'id' => $id,
            'posts' => $posts,
            'follow_users' => $follow_users,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
}

}
