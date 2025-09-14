<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AppAuthenticatedSessionController;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Http\Responses\LogoutResponse as CustomLogoutResponse;

// 🔽 これを追加！
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class,
            AppAuthenticatedSessionController::class
        );

        $this->app->bind(
            \Laravel\Fortify\Http\Requests\LoginRequest::class,
            \App\Http\Requests\LoginRequest::class
        );

        $this->app->bind(
            LogoutResponse::class,
            CustomLogoutResponse::class
        );
    }

    public function boot(): void
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register-step1');
        });

        // 🔽 Rate Limiter の設定
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(100)->by($request->email . $request->ip());
        });
    }
}