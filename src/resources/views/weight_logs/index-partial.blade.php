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
        <td>{{ $log->calorie }}cal</td>
        <td>{{ $log->exercise }}</td>
        <td class="pgl-td-action">
          <a href="{{ route('weight_logs.edit',$log) }}" class="pgl-icon-btn" aria-label="edit">✎</a>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" class="pgl-empty">先に記録はありません。</td></tr>
      @endforelse
    </tbody>
  </table>

  {{-- ページネーション --}}
  <div class="pgl-pagination">
    {{ $logs->links() }}
  </div>
</div>