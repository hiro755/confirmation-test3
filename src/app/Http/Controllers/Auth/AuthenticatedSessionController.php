<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyController;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LogoutResponse;

class AuthenticatedSessionController extends FortifyController
{
    public function store(LoginRequest $request)
    {
        return parent::store($request);
    }

    public function destroy(Request $request): LogoutResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Fortify が期待する LogoutResponse を返す
        return app(LogoutResponse::class);
    }
}