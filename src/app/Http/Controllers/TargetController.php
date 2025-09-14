<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateTargetWeightRequest;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    // 目標体重設定画面
    public function edit()
    {
        $target = WeightTarget::where('user_id', Auth::id())->value('target_weight');
        return view('targets.edit', compact('target'));
    }

    // 更新処理
    public function update(UpdateTargetWeightRequest $request)
    {
        $validated = $request->validated();
        $userId = Auth::id();

        // 該当ユーザーの目標体重が存在する場合は更新、なければ作成
        $target = WeightTarget::firstOrNew(['user_id' => $userId]);
        $target->target_weight = $validated['target_weight'];
        $target->save();

        return redirect()->route('weight_logs.index')->with('status', '目標体重を更新しました');
    }
}
