<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightLogRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWeightLogRequest;

class WeightLogController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // 目標体重・最新体重・差分
        $target      = WeightTarget::where('user_id', $userId)->value('target_weight');
        $targetId    = WeightTarget::where('user_id', $userId)->value('id');   // ★ 追加：編集リンク用のID
        $latestWeight= WeightLog::where('user_id', $userId)->orderByDesc('date')->value('weight');
        $diff        = (isset($target, $latestWeight)) ? ($target - $latestWeight) : null;

        // 検索
        $from = $request->query('from');
        $to   = $request->query('to');

        $query = WeightLog::where('user_id', $userId)->orderByDesc('date');
        if ($from) $query->whereDate('date', '>=', $from);
        if ($to)   $query->whereDate('date', '<=', $to);

        $logs = $query->paginate(8)->withQueryString();

        $isSearching = $from || $to;
        $count = $logs->total();

        return view('weight_logs.index', compact(
            'target','targetId','latestWeight','diff','logs','from','to','isSearching','count'
        ));
    }

public function create()
{
    $logs = WeightLog::latest()->paginate(10); // 一覧データを取得
    return view('weight_logs.create', compact('logs'));
}

public function store(StoreWeightLogRequest $request)
{
    // バリデーション済みデータは $request に入ってる
    $data = $request->validated();

    // user_id を追加（ログインユーザーのID）
    $data['user_id'] = Auth::id();

    // 登録処理
    WeightLog::create($data);

    return redirect()->back()->with('success', '登録完了');
}

public function update(WeightLogRequest $request, WeightLog $weightLog)
{
    $weightLog->update($request->validated());
    return redirect()->route('weight_logs.index')->with('success', '更新しました');
}

public function edit(WeightLog $weightLog)
{
    // 必要に応じて認可チェック
    // $this->authorize('update', $weightLog);

    return view('weight_logs.edit', ['log' => $weightLog]);
}

public function destroy($id)
{
    $log = WeightLog::findOrFail($id);
    $log->delete();

    return redirect()->route('weight_logs.index')->with('success', '削除しました');
}
}