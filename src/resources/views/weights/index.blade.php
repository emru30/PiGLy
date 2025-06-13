@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css') }}">
@endsection

@section('content')
<div class="weight">
    <h2 class="weight__heading">体重管理</h2>

    <div class="weight__summary">
        <div class="summary__item">
            <div class="summary__label">目標体重</div>
            <div class="summary__value">45.0<span class="unit">kg</span></div>
        </div>
        <div class="summary__item">
            <div class="summary__label">目標まで</div>
            <div class="summary__value summary__value--alert">-1.5<span class="unit">kg</span></div>
        </div>
        <div class="summary__item">
            <div class="summary__label">最新体重</div>
            <div class="summary__value">46.5<span class="unit">kg</span></div>
    </div>
</div>

<form class="search-form" method="GET" action="/weights">
    <input type="date" name="start_date" value="{{ request('start_date') }}" class="search-form__input" />
    <span class="search-form__separator">〜</span>
    <input type="date" name="end_date" value="{{ request('end_date') }}" class="search-form__input" />
    <input type="submit" class="search-form__button-search" value="検索" />
    @if(request('start_date') || request('end_date'))
    <a href="/weights" class="search-form__button-reset">リセット</a>
    @endif
    <a href="#modal-add" class="search-form__button-add">データ追加</a>
</form>

@if(request('start_date') && request('end_date'))
<div class="search-form__summary">
    {{ request('start_date') }} 〜 {{ request('end_date') }} の検索結果：{{ $logs->count() }}件
</div>
@endif

<table class="weight__table">
    <thead>
        <tr>
            <th>日付</th>
            <th>体重</th>
            <th>食事摂取カロリー</th>
            <th>運動時間</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->date }}</td>
            <td>{{ $log->weight }} kg</td>
            <td>{{ $log->calories }} kcal</td>
            <td>{{ $log->exercise_time }}</td>
            <td>
                <a href="#modal-edit-{{ $log->id }}" class="edit-button">編集</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $logs->links() }}
</div>

<div class="modal" id="modal-add">
    <a href="#!" class="modal__overlay"></a>
    <div class="modal__inner">
        <div class="modal__content">
            <form method="GET" action="/weights">
                @csrf
                <div class="modal-form__group">
                    <label for="date">日付
                        <span class="required">必須</span>
                    </label>
                    <input type="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                    @error('date')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-form__group">
                    <label for="weight">体重（kg）
                        <span class="required">必須</span>
                    </label>
                    <input type="text" name="weight" value="{{ old('weight') }}">
                    @error('weight')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-form__group">
                    <label for="calories">摂取カロリー（cal）
                        <span class="required">必須</span>
                    </label>
                    <input type="text" name="calories" value="{{ old('calories') }}">
                    @error('calories')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-form__group">
                    <label for="exercise_time">運動時間
                        <span class="required">必須</span>
                    </label>
                    <input type="text" name="exercise_time" value="{{ old('exercise_time') }}">
                    @error('exercise_time')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-form__group">
                    <label for="text">運動内容</label>
                    <textarea name="exercise_content" maxlength="120">{{ old('exercise_content') }}</textarea>
                    @error('exercise_content')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="追加" class="modal-form__button">
            </form>
            <a href="#" class="modal__close">×</a>
        </div>
    </div>
</div>
@endsection