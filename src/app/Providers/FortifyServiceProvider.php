<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AppAuthenticatedSessionController;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Http\Responses\LogoutResponse as CustomLogoutResponse;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Fortify のコントローラを自作に差し替え
        $this->app->bind(
            \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class,
            AppAuthenticatedSessionController::class
        );

        // Fortify の LoginRequest を自作に差し替え
        $this->app->bind(
            \Laravel\Fortify\Http\Requests\LoginRequest::class,
            \App\Http\Requests\LoginRequest::class
        );

        // Fortify の LogoutResponse を自作に差し替え ← これを追加！
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
    }
}

       