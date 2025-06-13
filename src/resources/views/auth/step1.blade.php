<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録 - STEP1</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-container">
        <h1 class="logo">PiGLy</h1>
        <h2>新規会員登録</h2>
        <p class="step-text">STEP1 アカウント情報の登録</p>

        <form method="post" action="/register/step1">
            @csrf

            <div class="form__group">
                <label for="name">お名前</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力">
                @error('name')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                @error('email')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="password">パスワード</label>
                <input class="input" type="password" name="password" placeholder="パスワードを入力">
                @error('password')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <button type="submit" class="submit-button">次に進む</button>
            </div>

            <p class="login__link"><a href="/login">ログインはこちら</a></p>
        </form>
    </div>
</body>

</html>