@extends('layouts.weight')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css')}}">
@endsection

@section('link')
<form action="/goal_setting" method="post">
  @csrf
  <input class="header__link" type="submit" value="目標体重設定">
</form>
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="ログアウト">
</form>
@endsection

@section('content')
<div class="weight__inner">
    <form class="weight-form" action="/register/step2" method="get">
        @csrf
        <div class="weight-summary">
            <p>目標体重: <strong>{{ $goalWeight }}kg</strong></p>
            <p>目標まで: <strong>{{ $weightDifference }}kg</strong></p>
            <p>最新体重: <strong>{{ $latestWeight }}kg</strong></p>
        </div>
    </form>
    <div class="search-form"> 
        <form class="search-form" action="{{ route('weight_logs.search') }}" method="GET" >
            @csrf
            <label for="date" class="weight-search-form__label">日付で検索:</label>
            <input type="date" name="date" id="date" value="{{ request('date') }}" class="weight-search-form__input">
            <button type="submit" class="weight-search-form__btn">検索</button>
            <nav class="weight-header__nav">
                <a href="{{ route('weight_logs.create') }}" class="weight-header__link">データ追加</a>
        </form>
    </div>

        <table class="weight-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }}kg</td>
                    <td>{{ $log->calories }}cal</td>
                    <td>{{ $log->exercise_time }}</td>
                    <td>
                        <a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-icon">✏️🖋</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $weightLogs->links() }}
        </div>
    </form>    
</div>
@endsection
