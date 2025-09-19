<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weight.css') }}">
    @yield('css')
</head>
<body>
    <header class="weight-header">
        <div class="weight-header__inner">
            <h1 class="weight-header__title">PiGLy</h1>
            @yield('link')
            
            <nav class="weight-header__nav">
                <a href="{{ route('weight_logs.create') }}" class="weight-header__link">データ追加</a>
                <a href="{{ route('goals.edit') }}" class="weight-header__link">目標体重設定</a>
                <a href="{{ route('logout') }}" class="weight-header__link">ログアウト</a>
            </nav>
        </div>
    </header>

    <div class="weight-main">
        @yield('content')
    </div>
</body>

</html>
