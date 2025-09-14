@extends('layouts.app')
@section('title', 'ログイン')

@section('content')
<div class="page-bg">
  <div class="container">
    <div class="card">
      <h1 class="brand">PiGLy</h1>
      <p class="sub">ログイン</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- メールアドレス -->
        <div class="field">
          <label for="email">メールアドレス</label>
          <input
            type="email"
            name="email"
            id="email"
            class="form-input"
            value="{{ old('email') }}"
            placeholder="メールアドレスを入力"
          >
          @if ($errors->has('email'))
            @foreach ($errors->get('email') as $message)
              <p class="error">{{ $message }}</p>
            @endforeach
          @endif
        </div>

        <!-- パスワード -->
        <div class="field">
          <label for="password">パスワード</label>
          <input
            type="password"
            name="password"
            id="password"
            class="form-input"
            placeholder="パスワードを入力"
          >
          @if ($errors->has('password'))
            @foreach ($errors->get('password') as $message)
              <p class="error">{{ $message }}</p>
            @endforeach
          @endif
        </div>

        <div class="actions">
          <button type="submit" class="btn">ログイン</button>
        </div>
      </form>

      <a href="{{ route('register') }}" class="link-underline">アカウント作成はこちら</a>
    </div>
  </div>
</div>
@endsection