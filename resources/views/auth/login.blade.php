@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

  <h2>DAWNのSNSへようこそ</h2>

  <div class="form-group">
    {{ Form::label('MailAddress') }}<br>
    {{ Form::email('mail',null,['class' => 'input']) }}<br>
  </div>

  <div class="form-group">
    {{ Form::label('Password') }}<br>
    {{ Form::password('password',['class' => 'input']) }}<br>
  </div>

  <div class="form-group btn login">
    {{ Form::submit('LOGIN') }}
  </div>

  <!-- 新規登録画面へ飛ぶ -->
  <p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
