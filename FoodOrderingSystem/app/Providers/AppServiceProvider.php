<?php

namespace App\Providers;

// use GuzzleHttp\Psr7\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

use function PHPUnit\Framework\callback;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define(ability: "delete-category", callback: function ($user): Response{
            if($user->role == "manager"){
                return Response::allow();
            }
            else{
                return Response::deny(message:"Only manager can delete");
            }
        });
    }
}
