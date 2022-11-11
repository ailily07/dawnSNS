@extends('layouts.login')

@section('content')
  <div class="top-content">
    <div class="search-form-box  flex">
      <form action="/search" method="post" class="search-form flex">
        @csrf
        <input type="search" class="search-box" name="search" value="{{ request('search') }}" placeholder="ユーザー名">
        <input type="image" src="images/search_icon.png" class="btn search-btn">
      </form>
      <div class="search-word">
        検索ワード：{{ request('search') }}
      </div>
    </div>
  </div><!-- top-content -->

  <div class="bottom-content">
    <div class="search-user-list">
      @foreach ($users as $user)
        <!-- 繰り返し処理 -->
        <div class="flex search-user">
          <div class="user-icon">
            <a href="/show/{{ $user->id }}">
              <img src="{{ asset('storage/icons/' . $user->images) }}">
            </a>
          </div>
          <p class="username">
            {{ $user->username }}
          </p>
          @if ($follow_users->contains('follow_id', $user->id))
            <form action="/un-follow" method="post" class="un-follow-btn">
              @csrf
              @method('delete')
              <input type="hidden" value="{{ $user->id }}" name="unFollow">
              <input type="submit" value="フォローをはずす" class="btn">
            </form>
          @else
            <form action="/follow" method="post" class="follow-btn">
              @csrf
              <input type="hidden" value="{{ $user->id }}" name="follow">
              <input type="submit" value="フォローする" class="btn">
            </form>
          @endif
        </div>
      @endforeach
    </div><!-- user-list -->
  </div><!-- bottom-content -->
@endsection
