@extends('layouts.app')

@section('content')
<div class="form-wrapper">
  <div class="form-card">
    <h2 class="form-title">Weight Log</h2>

    <form action="{{ route('weight_logs.update', ['weight_log' => $log->id]) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- 日付 -->
      <div class="form-group">
        <label>日付</label>
        <input type="date" name="date" value="{{ old('date', $log->date) }}">
        @error('date') <p class="error">{{ $message }}</p> @enderror
      </div>

      <!-- 体重 -->
      <div class="form-group unit-group">
        <label>体重</label>
        <div class="input-with-unit">
          <input type="text" name="weight" value="{{ old('weight', $log->weight) }}">
          <span class="unit">kg</span>
        </div>
        @error('weight') <p class="error">{{ $message }}</p> @enderror
      </div>

      <!-- カロリー -->
      <div class="form-group unit-group">
        <label>摂取カロリー</label>
        <div class="input-with-unit">
          <input type="text" name="calories" value="{{ old('calories', $log->calories) }}">
          <span class="unit">cal</span>
        </div>
        @error('calories') <p class="error">{{ $message }}</p> @enderror
      </div>

      <!-- 運動時間 -->
      <div class="form-group">
        <label>運動時間</label>
        <input type="time" name="exercise_time" value="{{ old('exercise_time', $log->exercise_time) }}" step="1">
        @error('exercise_time') <p class="error">{{ $message }}</p> @enderror
      </div>

      <!-- 運動内容 -->
      <div class="form-group">
        <label>運動内容</label>
        <textarea name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content', $log->exercise_content) }}</textarea>
        @error('exercise_content') <p class="error">{{ $message }}</p> @enderror
      </div>

       <!-- ボタン行 -->
  <div class="button-row">
      <div class="btn-center-wrapper">
          <a href="{{ route('weight_logs.index') }}" class="btn btn-back">戻る</a>
          <button type="submit" class="btn btn-update">更新</button>
      </div>
  </div>
</form>

      <!-- ゴミ箱（右端） -->
      <div class="delete-wrapper">
  <form action="{{ route('weight_logs.destroy', $log->id) }}" method="POST" onsubmit="return confirm('削除しますか？')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-delete">🗑️</button>
  </form>
</div>

</div>
@endsection