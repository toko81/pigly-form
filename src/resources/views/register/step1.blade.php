<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
</head>
<body>
    @section('link')
    <a class="header__link" href="/login">login</a>
    @endsection

    @include('components.form')
    <div class="register-form">
        <h4 class="register-form__heading content__sub">STEP1 アカウント情報の登録</h4>
        <div class="register-form__inner">
            <form class="register-form__form" action="{{ route('register.step1.store') }}" method="post">
                @csrf
                <div class="register-form__group">
                    <label class="register-form__label" for="name">お名前</label>
                    <input class="register-form__input" type="text" name="name" id="name" placeholder="名前を入力">
                    <p class="register-form__error-message">
                        @error('name')
                        {{ $message }}
                        @enderror
                        
                    </p>
                </div>
                <div class="register-form__group">
                    <label class="register-form__label" for="email">メールアドレス</label>
                    <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレスを入力">
                    <p class="register-form__error-message">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__group">
                    <label class="register-form__label" for="password">パスワード</label>
                    <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                    <p class="register-form__error-message">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="register-form__btn-inner">
                    <input class="register-form__btn btn" type="submit" value="次に進む">
                    <input class="register-form__back-btn" type="submit" value="ログインはこちら" name="back">
                </div>
            </form>
        </div>
    </div>   
</body>
</html>