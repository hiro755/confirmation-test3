@extends('layouts.app')

@section('content')

<div class="pgl-wrapper">
  <div class="pgl-header">
    <div class="pgl-logo">PiGLy</div>
    <div class="pgl-actions">
      <a href="{{ route('target.edit') }}" class="pgl-btn pgl-btn-ghost">目標体重設定</a>
      <form method="POST" action="/logout">@csrf
        <button class="pgl-btn pgl-btn-ghost">ログアウト</button>
      </form>
    </div>
  </div>

  {{-- 3カード --}}
  <div class="pgl-stats">
    <div class="pgl-card pgl-stat">
      <div class="pgl-stat-label">目標体重</div>
      <div class="pgl-stat-value">{{ $target ?? '-' }}<span> kg</span></div>
    </div>
    <div class="pgl-card pgl-stat">
      <div class="pgl-stat-label">目標まで</div>
      <div class="pgl-stat-value">{{ $diff ?? '-' }}<span> kg</span></div>
    </div>
    <div class="pgl-card pgl-stat">
      <div class="pgl-stat-label">最新体重</div>
      <div class="pgl-stat-value">{{ $latest ?? '-' }}<span> kg</span></div>
    </div>
  </div>

  {{-- 検索バー --}}
  <div class="pgl-toolbar-wrapper">
    <div class="pgl-toolbar-left">
      <form method="GET" class="pgl-toolbar">
  <div class="search-row">
    <input type="date" name="from" value="{{ request('from') }}" class="pgl-input">
    <span class="date-separator">〜</span>
    <input type="date" name="to" value="{{ request('to') }}" class="pgl-input">

    <!-- ボタンだけを別のdivで囲んで、横並びさせる -->
    <div class="search-buttons">
      <button type="submit" class="pgl-btn pgl-btn-black">検索</button>
      @if(request('from') || request('to'))
        <a href="{{ route('weight_logs.index') }}" class="pgl-btn pgl-btn-ghost">リセット</a>
      @endif
    </div>
  </div>
</form>
    </div>

    <div class="pgl-toolbar-right">
      <a href="{{ route('weight_logs.create') }}" class="pgl-btn pgl-btn-grad">データ追加</a>
    </div>
  </div>

  {{-- テーブル --}}
  <div class="pgl-card pgl-table-card">
    <table class="pgl-table">
      <thead>
        <tr>
          <th>日付</th>
          <th>体重</th>
          <th>食事摂取カロリー</th>
          <th>運動時間</th>
          <th class="pgl-th-action"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($logs as $log)
        <tr>
          <td>{{ $log->date }}</td>
          <td>{{ number_format($log->weight,1) }}kg</td>
          <td>{{ $log->calories }}cal</td>
<td>{{ $log->exercise_time }}</td>
          <td class="pgl-td-action">
            <a href="{{ route('weight_logs.edit', $log) }}" class="pgl-icon-btn" aria-label="edit">✎</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="pgl-empty">先に記録はありません。</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    {{-- ページネーション --}}
    <div class="pgl-pagination">
      {{ $logs->links() }}
    </div>
  </div>
</div>

@endsection