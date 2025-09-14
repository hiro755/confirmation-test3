<?php

namespace App\Http\Controllers;

use App\Models\User; // ← これが必要
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register-step1');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect('/register/step2'); // 初期体重登録へ
    }
}
