<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <main>
    <div class="container">
        <h2>ログイン</h2>

        <form  class="form" method="POST" action="{{ route('login.custom') }}">
            @csrf

            <div class="form-group">
                <label class="form-group__label" for="email">メールアドレス</label>
                <input class="login-form__input" type="email" name="email" id="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" required>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-group__label" for="password">パスワード</label>
                <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力" required>
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button class="form__button-submit" type="submit">ログイン</button>
        </form>

        <p><a href="{{ route('register.step1') }}">アカウント作成はこちら</a></p>
    </div>
    </main>
</body>
</html>    

