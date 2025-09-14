@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <h2 class="form-title center-title">目標体重設定</h2>
        <form method="POST" action="{{ route('target.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
    <div class="input-with-unit-wrapper">
        <input id="target_weight" name="target_weight" type="number" step="0.1" value="{{ old('target_weight', $target) }}">
        <span class="unit">kg</span>
    </div>

    @error('target_weight')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

            <div class="button-row">
                <!-- 戻る：灰色ボタン -->
                <a href="{{ route('weight_logs.index') }}" class="back-button">戻る</a>

                <!-- 更新：グラデーション -->
                <button type="submit" class="btn btn-update">更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection