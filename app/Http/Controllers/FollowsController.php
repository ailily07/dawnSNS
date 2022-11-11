<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;
use App\Post;

class FollowsController extends Controller
{
    //ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    //フォローリストへ
    public function followList(Post $post, Follow $follow){
        $follows = $follow->get();
        $follow_id = $follow->where('follower_id', Auth::id())
                        ->pluck('follow_id');
        $posts = $post->where('user_id', Auth::id())
                        ->orWhereIn('user_id', $follow_id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('follows.followList', [
            'follows' => $follows,
            'posts' => $posts,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }

    //フォロワーリストへ
    public function followerList(Post $post, Follow $follow){
        $follows = $follow->get();
        $follower_id = $follow->where('follow_id', Auth::id())
                                ->pluck('follower_id');
        $posts = $post->WhereIn('user_id', $follower_id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('follows.followerList', [
            'posts' => $posts,
            'follows' => $follows,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }

    //フォローをはずす
    public function unFollow(Request $request){
        $unFollow = Follow::where('follower_id', Auth::id())->where('follow_id', $request->unFollow);

        $unFollow->delete();

        return back();
    }
    //フォローする
    public function follow(Request $request){
        $follow = new Follow;
        $follow->follow_id = $request->follow;
        $follow->follower_id = Auth::id();

        $follow->save();

        return back();
    }
}
