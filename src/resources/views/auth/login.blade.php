<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-container">
        <h1 class="logo">PiGLy</h1>
        <h2>ログイン</h2>

        <form action="/login" method="post">
            @csrf

            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input class="input" type="email" id="email" name="email" class="text" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                @error('email')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" class="text" placeholder="パスワードを入力">
                @error('password')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <button type="submit" class="submit-button">ログイン</button>
            </div>

            <p class="login__link">
                <a href="/register/step1">アカウント作成はこちら</a>
            </p>
        </form>
    </div>
</body>

</html>