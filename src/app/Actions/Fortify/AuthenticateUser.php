<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class AuthenticateUser
{
    public function __invoke(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            return app(LoginResponse::class);
        }

        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。',
        ]);
    }
}