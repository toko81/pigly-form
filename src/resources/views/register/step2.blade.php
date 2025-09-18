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
        <h4 class="register-form__heading content__sub">STEP2 体重データの入力</h4>
        <div class="register-form__inner">
            <form class="register-form__form" action="{{ route('register.step2.store') }}" method="post">
                @csrf
                <div class="register-form__group">
                    <label class="register-form__label" for="current_weight">現在の体重</label>
                    <input class="register-form__input" type="number" name="current_weight" id="current_weight" placeholder="現在の体重を入力" required>
                    <p class="register-form__weight">kg</p>
                    <p class="register-form__error-message">
                        @error('name')
                        {{ $message }}
                        @enderror
                        
                    </p>
                </div>
                <div class="register-form__group">
                    <label class="register-form__label" for="target_weight">目標の体重</label>
                    <input class="register-form__input" type="number" name="target_weight" id="target_weight" placeholder="目標の体重を入力" required>
                    <p class="register-form__weight">kg</p>
                    <p class="register-form__error-message">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">アカウント作成</button>
            </form>
        </div>
    </div>   
</body>
</html>