<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //ログイン認証
    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function index(){
        return view('posts.index');
    }


    //
    public function profile(){
    }


    //
    public function followerList(){
    }

}
