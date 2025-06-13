<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="header__logo">PiGLy</h1>
        <div class="header__buttons">
            <a href="{{ url('weight_logs/goal_setting') }}" class="button">目標体重設定</a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="button">ログアウト</button>
            </form>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>

</html>