@extends('layouts.app')
@section('content')

@if(Route::currentRouteName() === 'weight_logs.create')
  <div class="weight-logs-background">
    @include('weight_logs.index-partial')
  </div>
@endif

<div class="weight-log-form-wrapper">
    <div class="form-container">
        <h2>Weight Logを追加</h2>
        <form action="{{ route('weight_logs.store') }}" method="POST">
            @csrf

            <!-- 日付 -->
            <div class="form-group">
                <label for="date">日付 <span class="required">必須</span></label>
                <input type="date" name="date" value="{{ old('date') }}">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 体重 -->
            <div class="form-group">
                <label for="weight">体重 <span class="required">必須</span></label>
                <div class="unit-input">
                    <input type="number" name="weight" placeholder="50.0" value="{{ old('weight') }}">
                    <span class="unit">kg</span>
                </div>
                @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 摂取カロリー -->
            <div class="form-group">
                <label for="calories">摂取カロリー <span class="required">必須</span></label>
                <div class="unit-input">
                    <input type="number" name="calories" placeholder="1200" value="{{ old('calories') }}">
                    <span class="unit">cal</span>
                </div>
                @error('calories')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 運動時間 -->
            <div class="form-group">
                <label for="exercise_time">運動時間 <span class="required">必須</span></label>
                <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
                @error('exercise_time')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 運動内容（任意） -->
            <div class="form-group">
                <label for="exercise_content">運動内容</label>
                <textarea name="exercise_content" placeholder="運動内容を記述">{{ old('exercise_content') }}</textarea>
                @error('exercise_content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- ボタン -->
            <div class="btn-wrapper">
                <a href="{{ route('weight_logs.index') }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-pink">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection