@extends('layouts.login')

@section('content')
  <div class="top-content">
    <div class="follows-wrapper">
      <h2>Follower list</h2>
      <div class="follows-list flex">
        @foreach($follows as $follow)
          <!-- 繰り返し処理 -->
          @if ($follow->follow_id === Auth::id())
            <div class="user-icon">
              <a href="/show/{{ $follow->followerUser->id }}">
                <img src="{{ asset('storage/icons/' . $follow->followerUser->images) }}">
              </a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div><!-- top-content -->

  <div class="bottom-content">
    <div class="tweet-list">
      @foreach ($posts as $post)
        <!-- 繰り返し処理 -->
        <div class="tweet-list-box flex">
          <div class="user-icon">
            <a href="/show/{{ $post->user->id }}">
              <img src="{{ asset('storage/icons/' . $post->user->images) }}">
            </a>
          </div>
          <div class="tweet-content">
            <div class="flex tweet-top">
              <p class="username">
                {{ $post->user->username }}
              </p>
              <p class="timestamp">
                {{ $post->created_at }}
              </p>
            </div>
            <p class="tweet">{{ $post->posts }}</p>
          </div>
        </div><!-- tweet-box -->
      @endforeach
    </div>
  </div><!-- bottom-content -->
@endsection
