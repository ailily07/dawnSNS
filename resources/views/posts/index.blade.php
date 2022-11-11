@extends('layouts.login')

@section('content')
  <div class="top-content">
    <div class="tweet-post-box flex">
      <div class="user-icon">
        <a href="/show/{{ Auth::id() }}">
          <img src="{{ asset('storage/icons/' . Auth::user()->images) }}">
        </a>
      </div>
      <form action="/post" method="post" class="tweet-post flex">
        @csrf
        <textarea placeholder="何をつぶやこうか・・・？" name="post" class="post-box" cols="40" rows="4" maxlength="150"></textarea>
        <input type="image" src="images/post.png" alt="投稿ボタン" class="btn post-btn">
      </form>
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
            @if ($post->user_id === Auth::id())
              <div class="edit-delete hidden flex">
                <button data-toggle="{{ $post->id }}" class="btn edit-btn">
                  <img src="images/edit.png">
                </button>
                <form action="/delete" method="post" class="btn delete-btn">
                  @csrf
                  @method('delete')
                  <input type="hidden" value="{{ $post->id }}" name="delete">
                  <a onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
                    <input type="image" src="images/trash.png" class="trash">
                    <input type="image" src="images/trash_h.png" class="trash-h">
                  </a>
                </form>
              </div>
            @endif
          </div>
        </div><!-- tweet-box -->
        <!-- モーダルの記述 -->
        <div id="{{ $post->id }}" class="edit-modal">
          <div class="modal-wrapper">
            <form action="/edit" method="post">
              @csrf
              <input type="hidden" value="{{ $post->id }}" name="edit">
              <textarea cols="40" rows="4" maxlength="150" name="editPost">{{ $post->posts }}</textarea>
              <input type="image" src="images/edit.png" class="btn">
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- bottom-content -->

@endsection
