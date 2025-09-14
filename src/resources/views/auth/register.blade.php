<!DOCTYPE html>
<html>
<head>
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録ページ</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>名前:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>メールアドレス:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>パスワード:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>パスワード（確認）:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>
