<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録 - STEP2</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-container">
        <h1 class="logo">PiGLy</h1>
        <h2>新規会員登録</h2>
        <p class="step-text">STEP2 体重データの入力</p>

        <form method="post" action="/register/step2">
            @csrf

            <div class="form__group">
                <label for="current_weight">現在の体重</label>
                <input type="text" name="current_weight" value="{{ old('current_weight') }}" placeholder="現在の体重を入力">
                @error('current_weight')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="target_weight">目標の体重</label>
                <input type="text" name="target_weight" value="{{ old('target_weight') }}" placeholder="目標の体重を入力">
                @error('target_weight')
                <div class="error__message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <button type="submit" class="submit-button">アカウント作成</button>
            </div>
        </form>
    </div>
</body>

</html>