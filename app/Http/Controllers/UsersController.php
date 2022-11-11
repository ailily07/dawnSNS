<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    //自分のプロフィール編集ページ
    public function profile(Follow $follow, Request $request){
        //POST送信でデータが送られてきた場合
        if(!empty($_POST)){
            //DB更新
            Auth::user()->username = $request->username;
            Auth::user()->mail = $request->mail;
            if(isset($request->password)){
                Auth::user()->password = Hash::make($request->password);
            }
            Auth::user()->bio = $request->bio;
            if(isset($request->images)){
                $iconName = $request->file('images')->getClientOriginalName();
                $request->file('images')->storeAs('icons', $iconName, 'public');
                Auth::user()->images = $iconName;
            }

            Auth::user()->save();

            return redirect('/top');
        }

        $password = str_repeat('●', session()->get('passwordCount'));
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('users.profile', [
            'password' => $password,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }

    //ユーザー検索ページ
    public function search(Follow $follow, Request $request){
        $query = User::query();

            //POST送信でsearchが送られてきた場合
            if($request->search){
                //あいまい検索する
                $query->where('username', 'like', "%$request->search%");
            }

        //$users変数に代入
        $users = $query->where('id', '!=', Auth::id())->get();

        $follow_users = $follow->where('follower_id', Auth::id())->get();
        $follow_count = $follow->getFollowCount(Auth::id());
        $follower_count = $follow->getFollowerCount(Auth::id());

        return view('users.search', [
            'users' => $users,
            'follow_users' => $follow_users,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count,
        ]);
    }
}
