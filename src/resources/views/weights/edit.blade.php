@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-container">
    <h2 class="edit-title">体重情報の編集</h2>

    <form method="POST" action="{{ url('/weight_logs/' . $weightLog->id . '/update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" name="date" id="date" value="{{ old('date', $weightLog->date) }}">
            @error('date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="weight">体重 (kg)</label>
            <input type="text" name="weight" id="weight" value="{{ old('weight', $weightLog->weight) }}">
            @error('weight')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="calories">摂取カロリー (kcal)</label>
            <input type="text" name="calories" id="calories" value="{{ old('calories', $weightLog->calories) }}">
            @error('calories')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exercise_time">運動時間</label>
            <input type="time" name="exercise_time" id="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
            @error('exercise_time')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exercise_content">運動内容</label>
            <textarea name="exercise_content" id="exercise_content" rows="4">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
            @error('exercise_content')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="button-group">
            <a href="{{ url('/weight_logs') }}" class="back__button">戻る</a>

            <button type="submit" class="update__button">更新</button>
        </div>
    </form>

    <form method="POST" action="{{ url('/weight_logs/' . $weightLog->id . '/delete') }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete__button">削除</button>
    </form>
</div>
@endsection