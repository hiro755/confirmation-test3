<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use App\Actions\Fortify\RegisterViewResponse as CustomRegisterViewResponse;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    $this->app->bind(RegisterViewResponse::class, CustomRegisterViewResponse::class);
}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
{
    Paginator::useBootstrap();
}
}
