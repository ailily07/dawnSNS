<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //DBを使用する
    protected $fillable = ['follow_id', 'follower_id'];

    //リレーション
    public function followUser(){
        return $this->belongsTo('App\User', 'follow_id', 'id');
    }
    //リレーション
    public function followerUser(){
        return $this->belongsTo('App\User', 'follower_id', 'id');
    }

    //フォロー数を数える
    public function getFollowCount($login_user_id){
        return $this->where('follower_id', $login_user_id)->count();
    }

    //フォロワー数を数える
    public function getFollowerCount($login_user_id){
        return $this->where('follow_id', $login_user_id)->count();
    }

    //フォローする
    const UPDATED_AT = null;
}
