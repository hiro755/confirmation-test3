@extends('layouts.app')
@section('title', '新規会員登録 STEP2')

@push('styles')
<style>
  .page-bg {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(#fde2ea, #f7c7d8) !important;
  }

  .card {
    width: 360px;
    background: #fff;
    border-radius: 14px;
    padding: 28px 24px;
    box-shadow: 0 18px 40px rgba(0, 0, 0, .08);
  }

  .brand {
    text-align: center;
    font-size: 32px;
    font-family: 'Times New Roman', serif;
    color: #ec6aa0;
    margin-bottom: 4px;
  }

  .sub {
    text-align: center;
    color: #7c7c7c;
    font-size: 12px;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .field {
    margin-bottom: 18px;
  }

  .field label {
    display: block;
    font-size: 12px;
    color: #666;
    margin-bottom: 6px;
  }

  .kg-wrap {
    position: relative;
  }

  .form-input {
    width: 100% !important;
    display: block !important;
    box-sizing: border-box;
    padding: 10px 36px 10px 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    transition: border-color .2s, box-shadow .2s;
  }

  .form-input:focus {
    border-color: #f4a0bd;
    box-shadow: 0 0 0 3px rgba(236, 106, 160, .15);
  }

  .kg-wrap .kg {
    position: absolute;
    right: 10px;
    top: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    color: #bdbdbd;
    font-size: 12px;
  }

  .error {
    margin-top: 6px;
    font-size: 11px;
    color: #e45a87;
  }

  .actions {
    text-align: center;
    margin-top: 16px;
  }

  .btn {
    width: 180px;
    border: none;
    border-radius: 999px;
    padding: 10px 16px;
    background: linear-gradient(90deg, #f2a6c2, #ee85ad);
    color: #fff;
    cursor: pointer;
  }

  .btn:hover {
    opacity: 0.92;
  }
</style>
@endpush

@section('content')
<div class="page-bg">
  <div class="card">
    <h1 class="brand">PiGLy</h1>
    <p class="sub">新規会員登録<br>STEP2 体重データの入力</p>

    <form action="{{ route('register.step2') }}" method="POST">
      @csrf

      <div class="field">
        <label>現在の体重</label>
        <div class="kg-wrap">
          <input class="form-input" name="current_weight" type="number" step="0.1" value="{{ old('current_weight') }}">
          <span class="kg">kg</span>
        </div>
        @foreach ($errors->get('current_weight') as $message)
          <p class="error">{{ $message }}</p>
        @endforeach
      </div>

      <div class="field">
        <label>目標の体重</label>
        <div class="kg-wrap">
          <input class="form-input" name="target_weight" type="number" step="0.1" value="{{ old('target_weight') }}">
          <span class="kg">kg</span>
        </div>
        @foreach ($errors->get('target_weight') as $message)
          <p class="error">{{ $message }}</p>
        @endforeach
      </div>

      <div class="actions">
        <button type="submit" class="btn">アカウント作成</button>
      </div>
    </form>
  </div>
</div>
@endsection