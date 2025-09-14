<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;


class DummyDataSeeder extends Seeder
{
public function run()
{
    // 既に同じemailのユーザーが存在していたら作成しないようにする
    $user = \App\Models\User::firstOrCreate(
        ['email' => 'test@example.com'], // 条件
        [ // 初回だけ作られるデータ
            'name' => 'テストユーザー',
            'password' => bcrypt('password'),
        ]
    );

    // weight_logs 35件
    \App\Models\WeightLog::factory()->count(35)->create([
        'user_id' => $user->id,
    ]);

    // weight_target 1件
    \App\Models\WeightTarget::create([
        'user_id' => $user->id,
        'target_weight' => 60,
    ]);
}
}
