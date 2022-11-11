@extends('layouts.login')

@section('content')
<div class="edit-profile-box flex">
  <div class="user-icon">
    <img src="{{ asset('storage/icons/' . Auth::user()->images) }}">
  </div>

  <form action="/edit-profile" method="post" class="edit-profile" enctype="multipart/form-data">
    @csrf
    <table class="edit-profile-table">
      <tr>
        <th class="pro-label">UserName</th>
        <td><input name="username" class="pro-input" value="{{ Auth::user()->username }}"></td>
      </tr>
      <tr>
        <th class="pro-label">MailAddress</th>
        <td><input name="mail" class="pro-input" value="{{ Auth::user()->mail }}"></td>
      </tr>
      <tr>
        <th class="pro-label">Password</th>
        <td class="pro-input">{{ $password }}</td>
      </tr>
      <tr>
        <th class="pro-label">new Password</th>
        <td><input name="password" name="password" class="pro-input"></td>
      </tr>
      <tr>
        <th class="pro-label">Bio</th>
        <td>
          <textarea name="bio" class="pro-input bio" cols="40" rows="5" maxlength="200">{{ Auth::user()->bio }}</textarea>
        </td>
      </tr>
      <tr>
        <th class="pro-label">Icon Image</th>
        <td class="pro-icon">
          <input type="file" name="images" class="pro-input" placeholder="ファイルを選択">
        </td>
      </tr>
    </table>
    <input type="submit" class="btn update-btn" value="更新">
  </form>
</div>
@endsection
