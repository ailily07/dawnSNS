@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
    <h2>新規ユーザー登録</h2>

    <div class="form-group">
        {{ Form::label('UserName') }}<br>
        {{ Form::text('username', null, ['class' => 'input', 'placeholder' => 'dawntown']) }}<br>
        @if ($errors->has('username'))
            <div class="alert alert-danger">
                <p>{{ $errors->first('username') }}</p>
            </div>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('MailAddress') }}<br>
        {{ Form::email('mail', null, ['class' => 'input', 'placeholder' => 'dawn@mail.com']) }}<br>
        @if ($errors->has('mail'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all('mail') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('Password') }}<br>
        {{ Form::password('password', ['class' => 'input', 'placeholder' => '4～12文字で入力']) }}<br>
        @if ($errors->has('password'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all('password') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="form-group">
        {{ Form::label('Password confirm') }}<br>
        {{ Form::password('password_confirmation', ['class' => 'input', 'placeholder' => '4～12文字で入力']) }}<br>
        @if ($errors->has('password_confirmation'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all('password') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="form-group btn register">
        {{ Form::submit('REGISTER') }}
    </div>

    <!-- 戻るボタン -->
    <p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
