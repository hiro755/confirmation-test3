<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog; // weight_logs テーブル用
use App\Models\WeightTarget; // weight_target テーブル用
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    // Step2 のフォーム表示
    public function showForm()
    {
        return view('auth.register-step2');
    }

    // Step2 のフォーム送信処理
    public function store(Request $request)
    {
        $request->validate([
            'current_weight' => 'required|numeric|max:9999|regex:/^\d+(\.\d{1})?$/',
            'target_weight'  => 'required|numeric|max:9999|regex:/^\d+(\.\d{1})?$/',
        ], [
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.numeric'  => '4桁までの数字で入力してください',
            'current_weight.regex'    => '小数点は1桁で入力してください',
            'target_weight.required'  => '目標の体重を入力してください',
            'target_weight.numeric'   => '4桁までの数字で入力してください',
            'target_weight.regex'     => '小数点は1桁で入力してください',
        ]);

        $userId = Auth::id();

        // 現在の体重を weight_logs に保存
        WeightLog::create([
            'user_id' => $userId,
            'date'    => now()->toDateString(),
            'weight'  => $request->current_weight,
        ]);

        // 目標体重を weight_target に保存
        WeightTarget::updateOrCreate(
            ['user_id' => $userId],
            ['target_weight' => $request->target_weight]
        );

        return redirect('/weight_logs')->with('success', 'アカウントを作成しました！');
    }

    public function index()
    {
        // 適切な処理（例: 一覧画面表示）
        return view('weights.index'); // 例: weights/index.blade.php を表示
    }
}

