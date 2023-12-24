<?php

namespace App\Providers;

use App\Models\Receta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('layouts.navigation-user', function ($view) {
            if (Auth::check()) {
                $view->with('recetas', Receta::where('user_id', Auth::id())->get());
            } else {
                $view->with('recetas', collect()); // O puedes optar por no pasar la variable en absoluto
            }
        });
    }
}
