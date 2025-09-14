<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規会員登録</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="page-bg"></div> <!-- 背景レイヤーだけ -->

  <div class="container">
    <div class="card">
      <h1>PiGLy</h1>
      <h2>新規会員登録</h2>
      <p>STEP1 アカウント情報の登録</p>

      <form method="POST" action="{{ route('register.step1') }}">
        @csrf

        <div class="form-group">
          <label for="name">お名前</label>
          <input type="text" name="name" id="name" placeholder="名前を入力" value="{{ old('name') }}">
          @error('name')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" name="email" id="email" placeholder="メールアドレスを入力" value="{{ old('email') }}">
          @error('email')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" name="password" id="password" placeholder="パスワードを入力">
          @error('password')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit">次に進む</button>
      </form>

      <a href="{{ url('/login') }}">ログインはこちら</a>
    </div>
  </div>

</body>
</html>