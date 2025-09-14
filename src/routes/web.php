<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\WeightTargetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 💬 お問い合わせ関連
Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);

// 📝 会員登録ステップ
Route::get('/register/step1', [RegisterController::class, 'showForm'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/register/step2', [WeightController::class, 'showForm'])->name('register.step2');
    Route::post('/register/step2', [WeightController::class, 'store']);
    
    Route::get('/weights', [WeightController::class, 'index'])->name('weights.index');

    Route::resource('weight_logs', WeightLogController::class);
    Route::resource('weight_target', WeightTargetController::class)->only(['create', 'store', 'edit', 'update']);
    Route::get('/target/edit', [TargetController::class, 'edit'])->name('target.edit');
    Route::put('/target', [TargetController::class, 'update'])->name('target.update');
});