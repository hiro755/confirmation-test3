<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateTargetWeightRequest;

class TargetController extends Controller
{
    // 目標体重設定画面
    public function edit()
    {
        $target = optional(auth()->user())->target_weight;
        return view('targets.edit', compact('target'));
    }

    // 更新処理
    public function update(UpdateTargetWeightRequest $request)
{
    $validated = $request->validated();

    $user = auth()->user();
    $user->target_weight = $validated['target_weight'];
    $user->save();

    return redirect()->route('weights.index')->with('status', '目標体重を更新しました');
}


}
